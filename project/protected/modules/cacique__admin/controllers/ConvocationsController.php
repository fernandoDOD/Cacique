<?php

class ConvocationsController extends Controller
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
                    'create',
                    'view',
                    'update',
                    'estado',
                    'delete_new'
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
        $scriptsAdd = array(
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/css/dataTables.bootstrap'
            ),
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/jquery.dataTables.min'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/dataTables.bootstrap'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min'
            )
        );
        $this->addScripts($scriptsAdd);
        $this->writeScripts();

        $convocations = Convocatorias::model()->findAll(array('condition'=>'t.estado != 2', 'order'=>'t.id DESC'));

        $this->render('admin',array(
            'convocations'=>$convocations,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=new Convocatorias;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Convocatorias']))
        {
            $errors = false;
            $model->attributes=$_POST['Convocatorias'];

            $model->post__url = MyMethods::normalizarUrl(strip_tags($model->titulo));
            $existUrl = Convocatorias::model()->findAllByAttributes(array('post__url'=>$model->post__url));
            if(count($existUrl) > 0)
                $model->post__url = (count($existUrl) + 1).'_'.$model->post__url;

            $model->clearErrors();

            if($model->validate(null, false)){
                date_default_timezone_set('America/Bogota');

               if(!(MyMethods::isValidDate($_POST['Convocatorias']['fecha'], 'd/m/Y'))){
                    $model->fecha = "";
                    $model->fecha_fin = "";
                    $model->addError('fecha', 'El campo fecha no es una fecha valida!!!');
                    $model->addError('fecha_fin', 'El campo fecha no es una fecha valida!!!');
                    $errors = true;
                }
                else{
                    $fecha = @date_create(str_replace("/","-",trim($_POST['Convocatorias']['fecha'])), new DateTimeZone('Europe/London'));
                    $fecha_fin = @date_create(str_replace("/","-",trim($_POST['Convocatorias']['fecha'])), new DateTimeZone('Europe/London'));
                    $model->fecha = date_format($fecha, 'Y/m/d');
                    $model->fecha_fin = date_format($fecha_fin, 'Y/m/d');
                }

                if(($_FILES['image']['size'] > 0)){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['image'], 900, 'convocations/');

                    if(!$uploadLogo['status']){
                        $model->addError('imagen', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->imagen = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'convocations/', $model->imagen, 400, 400);
                    }
                }

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->writeScripts();

        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
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
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Convocatorias']))
        {
            $errors = false;
            $model->attributes=$_POST['Convocatorias'];
             $model->post__url = MyMethods::normalizarUrl(strip_tags($model->titulo));
            $existUrl = Convocatorias::model()->findAllByAttributes(array('post__url'=>$model->post__url), array('condition'=>'t.id != '.$model->id));
            if(count($existUrl) > 0)
                $model->post__url = (count($existUrl) + 1).'_'.$model->post__url;
            $model->clearErrors();

            if($model->validate(null, false)){
                date_default_timezone_set('America/Bogota');

                if(!(MyMethods::isValidDate($_POST['Convocatorias']['fecha'], 'd/m/Y'))){
                    $model->fecha = "";
                    $model->fecha_fin = "";
                    $model->addError('fecha', 'El campo fecha no es una fecha valida!!!');
                    $model->addError('fecha_fin', 'El campo fecha no es una fecha valida!!!');
                    $errors = true;
                }
                else{
                    $fecha = @date_create(str_replace("/","-",trim($_POST['Convocatorias']['fecha'])), new DateTimeZone('Europe/London'));
                    $fecha_fin = @date_create(str_replace("/","-",trim($_POST['Convocatorias']['fecha_fin'])), new DateTimeZone('Europe/London'));
                    $model->fecha = date_format($fecha, 'Y/m/d');
                    $model->fecha_fin = date_format($fecha_fin, 'Y/m/d');
                }

                if(($_FILES['image']['size'] > 0)){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    $currentImage = $model->imagen;
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['image'], 800, 'convocations/');

                    if(!$uploadLogo['status']){
                        $model->addError('imagen', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->imagen = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'convocations/', $model->imagen, 400, 400);

                        if($currentImage != ""){
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/convocations/".$currentImage);
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/convocations/400x400/".$currentImage);
                        }
                    }
                }

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionEstado($id){
        $convocations = $this->loadModel($id);
        if($convocations->estado == 1)
            $convocations->estado = 0;
        else if($convocations->estado == 0)
            $convocations->estado = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $convocations->save();
        $this->redirect(array('admin'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_new($id)
    {
        $convocations = $this->loadModel($id);

        $convocations->estado = 2;
        $convocations->save();

        $this->redirect(array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Eventos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Convocatorias::model()->findByAttributes(array('id'=>$id), array('condition'=>'t.estado != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Eventos $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='Eventos-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}