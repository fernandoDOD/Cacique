<?php

class ImagesbankController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='/layouts/main';

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
                    'admin',
                    'add',
                    'add_ajax',
                    'delete_image'
                ),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $this->writeScripts();

        $images = ImagesBank::model()->findAllByAttributes(array('status'=>1), array('order'=>'t.id_image DESC'));

        $this->render('admin',array(
            'images'=>$images,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAdd()
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

        $model=new ImagesBank;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ImagesBank']))
        {
            $model->attributes=$_POST['ImagesBank'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_image));
        }

        $this->render('add',array(
            'model'=>$model,
        ));
    }

    /**
     * Carga de imagenes mediante Ajax
     */
    public function actionAdd_ajax(){
        if(Yii::app()->request->isAjaxRequest && isset($_FILES['file'])){
            $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
            $path = 'bank/';

            $uploadImage = MyMethods::uploadImage($_FILES['file'], 2048, $path);

            if($uploadImage['status']){
                $image = new ImagesBank;
                $image->image = $uploadImage['imageName'];

                MyMethods::resizeImage($server.$path, $image->image, 250, 250);

                $image->save();
            }
        }
        else
            throw new CHttpException(404,'The requested page does not exist.');
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_image($id)
    {
        $image = ImagesBank::model()->findByPk($id);

        $image->status = 2;

        if($image->save()){
            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/bank/".$image->image);
            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/bank/250x250/".$image->image);
        }
        
        $this->redirect(array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('ImagesBank');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ImagesBank the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=ImagesBank::model()->findByAttributes(array('id_image'=>$id), array('condition'=>'t.status != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ImagesBank $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='images-bank-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}