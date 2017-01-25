<?php

class GalleriesController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='/layouts/main';

    public $sizes = array(
        '100x100',
        '250x250'
    );

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array(
                    'loadGallery',
                    'loadGalleryFull',
                    'admin',
                    'create',
                    'update',
                    'uploadImages',
                    'delete_image',
                    'delete_gallery'
                ),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Retorna mediante ajax las imagenes de una galeria
     */
    public function actionLoadGallery(){
        if(Yii::app()->getRequest()->getIsAjaxRequest()){
            $gallery = Galleries::model()->findByPk($_GET['filter']);
            $html = "";

            foreach ($gallery->images as $key => $image) {
                $html .= '<div class="my-image-gallery">'.
                    '<div style="background-image: url('.Yii::app()->request->baseUrl.'/images/galleries/'.$gallery->id_gallery.'/100x100/'.$image->name.')"></div>'.
                    '</div>';
            }

            echo CJSON::encode(array(
                'html'=>$html,
                'page'=>0
            ));
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    /**
     * Retorna mediante ajax las imagenes full de una galeria
     */
    public function actionLoadGalleryFull(){
        if(Yii::app()->getRequest()->getIsAjaxRequest()){
            $gallery = Galleries::model()->findByPk($_GET['filter']);
            $html = "";

            foreach ($gallery->images as $key => $image) {
                $html .= '<div class="item '.(($key==0)?'active':'').'">'.
                    '<div class="my-item-slide" style="background-image: url('.Yii::app()->request->baseUrl.'/images/galleries/'.$gallery->id_gallery.'/'.$image->name.')"></div>'.
                    '</div>';
            }

            echo CJSON::encode(array(
                'html'=>$html,
                'page'=>0
            ));
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $this->writeScripts();

        $galleriesDelete = Galleries::model()->findAllByAttributes(array('save'=>0));
        foreach ($galleriesDelete as $key => $gallery) {
            $gallery->delete();
        }

        $galleries = Galleries::model()->findAllByAttributes(array('save'=>1), array('condition'=>'t.status != 2', 'order'=>'t.name ASC'));

        $this->render('admin',array(
            'galleries'=>$galleries,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        if(isset($_GET['new'])){
            $model=new Galleries;
            $model->name = 'Galeria No '.(count(Galleries::model()->findAllByAttributes(array('save'=>1))) + 1);
            $model->save();

            $this->redirect(array('update','id'=>$model->id_gallery));
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $scriptsAdd = array(
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/dropzone/css/dropzone'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/dropzone/dropzone.min'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Galleries']))
        {
            $model->name=$_POST['Galleries']['name'];
            if(count($model->images) >= 1){
                $model->save = 1;
                if($model->save())
                    $this->redirect(array('admin'));
            }
            else
                $model->addError('save', 'Aun no ha cargado imagenes a la galeria.');
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Carga de imagenes mediante Ajax
     */
    public function actionUploadImages($id){
        $gallery = $this->loadModel($id);

        if(Yii::app()->request->isAjaxRequest && isset($_FILES['file'])){
            $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
            $path = 'galleries/'.$id.'/';
            if(!file_exists($server.$path)){
                mkdir($server.$path);
                foreach ($this->sizes as $key => $size) {
                    mkdir($server.$path.$size.'/');
                }
            }

            $uploadImage = MyMethods::uploadImage($_FILES['file'], 5000, $path);

            if($uploadImage['status']){
                $image = new Images;
                $image->gallery = $id;
                $image->name = $uploadImage['imageName'];

                MyMethods::resizeImage($server.$path, $image->name, 250, 250);
                MyMethods::resizeImage($server.$path, $image->name, 100, 100);

                $image->save();
            }
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    public function actionDelete_image($id){
        $image = Images::model()->findByPk($id);

        if(count($image->gallery0->images) > 1){
            $image->status = 2;

            if($image->save()){
                @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/galleries/".$image->gallery0->id_gallery."/".$image->name);
                foreach ($this->sizes as $key => $size) {
                    @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/galleries/".$image->gallery0->id_gallery."/".$size."/".$image->name);
                }
                
                $image->delete();
            }
            
            $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_gallery($id)
    {
        $gallery = $this->loadModel($id);
        $galleriesUtil = GeneralValue::model()->findAllByAttributes(array('relation'=>'Galleries', 'value'=>$id, 'status'=>'1'));

        if(count($gallery->stores) == 0 && count($gallery->news) == 0 && count($galleriesUtil) == 0){
            $gallery->status = 2;
            if($gallery->save()){
                foreach ($gallery->images as $key => $image) {
                    @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/galleries/".$gallery->id_gallery."/".$image->name);
                    
                    foreach ($this->sizes as $key => $size) {
                        @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/galleries/".$gallery->id_gallery."/".$size."/".$image->name);
                    }
                    
                    $image->delete();
                }

                foreach ($this->sizes as $key => $size) {
                    @rmdir($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/galleries/".$gallery->id_gallery."/".$size);
                }
                @rmdir($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/galleries/".$gallery->id_gallery);

                $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Galleries the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Galleries::model()->findByAttributes(array('id_gallery'=>$id), array('condition'=>'t.status != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Galleries $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='galleries-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}