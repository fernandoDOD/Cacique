<?php

class ProfileController extends Controller
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
                    'view',
                    'update'
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
    public function actionView()
    {
        $this->writeScripts();

        $user = $this->loadModel(Yii::app()->user->getState('_user'));
        
        $this->render('view',array(
            'user'=>$user,
        ));
    }

    public function actionUpdate(){
        $this->writeScripts();

        $model = $this->loadModel(Yii::app()->user->getState('_user'));

        if(isset($_POST['Users'])){
            $errors = false;
            $model->name = $_POST['Users']['name'];
            if($_FILES['image']['size'] > 0){
                $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                $uploadLogo = MyMethods::uploadImage($_FILES['image'], 256, 'users/');

                if(!$uploadLogo['status']){
                    $model->addError('image', $uploadLogo['message']);
                    $errors = true;
                }
                else{
                    $model->image = $uploadLogo['imageName'];
                }
            }

            if(!$errors && $model->save()){
                Yii::app()->user->setState('_name',$model->name);
                Yii::app()->user->setState('_image',$model->image);
            }
        }
        if(isset($_POST['Password'])){
            if(trim($_POST['Password']['current']) == "" || trim($_POST['Password']['new']) == "" || trim($_POST['Password']['repeat']) == "")
                $model->addError('password', 'Debe completar todos los campos.');
            else{
                if(crypt($_POST['Password']['current'], $model->password) != $model->password)
                    $model->addError('password', 'La contraseña actual no es correcta.');
                else{
                    if(trim($_POST['Password']['new']) != trim($_POST['Password']['repeat']))
                        $model->addError('password', 'Las nuevas contraseñas no coinciden.');
                    else{
                        $model->password = MyMethods::crypt_blowfish(trim($_POST['Password']['new']));
                        $model->save();
                    }
                }
            }
        }
        
        $this->render('update',array(
            'model'=>$model
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CategoriesNews the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Users::model()->findByAttributes(array('id_user'=>$id), array('condition'=>'t.status != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CategoriesNews $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='categories-news-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}