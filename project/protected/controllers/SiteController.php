<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$slide = GeneralValue::model()->findByPk(8);
		$slide = Galleries::model()->findByPk($slide->value);
		$noticias = Noticias::model()->findAllByAttributes(array('estado'=>1));
		$convocatorias = Convocatorias::model()->findAllByAttributes(array('estado'=>1));
		$galeria = Galeria::model()->findAllByAttributes(array('estado'=>1));
		$this->render('index', array(
			'slide'=>$slide,
			'noticias'=>$noticias,
			'convocatorias'=>$convocatorias,
			'galeria'=>$galeria
			));
	}
	public function actionQuienes_somos()
	{
		$equipo = Equipo::model()->findAllByAttributes(array('estado'=>1));
		$contenido = Paginas::model()->findByPk(1);
		$this->render('quienesSomos', array(
			'contenido'=> $contenido,
			'equipo'=> $equipo
			));
	}
	public function actionProyectos()
	{
		$contenido = Paginas::model()->findByPk(2);
		$this->render('proyectos', array(
			'contenido'=> $contenido,
			));
	}
	public function actionFicict()
	{
		$slideUno = GeneralValue::model()->findByPk(11);
		$slideUno = Galleries::model()->findByPk($slideUno->value);
		$slideDos = GeneralValue::model()->findByPk(10);
		$slideDos = Galleries::model()->findByPk($slideDos->value);
		$contenido = Paginas::model()->findByPk(3);
		$historia = Paginas::model()->findByPk(4);
		$this->render('ficict', array(
			'contenido'=> $contenido,
			'historia'=> $historia,
			'slideUno'=> $slideUno,
			'slideDos'=> $slideDos
			));
	}
	public function actionFsacct()
	{
		$slide = GeneralValue::model()->findByPk(9);
		$slide = Galleries::model()->findByPk($slide->value);
		$contenido = Paginas::model()->findByPk(5);
		$this->render('fsacct', array(
			'slide'=>$slide,
			'contenido'=>$contenido
			));
	}
	public function actionDonaciones()
	{
		$contenido = Paginas::model()->findByPk(6);
		$this->render('donaciones', array(
			'contenido'=> $contenido
			));
	}
	public function actionFormulario()
	{
		$this->render('formulario');
	}
	public function actionContacto()
	{
		$this->showSectionContact = false;
		$this->render('contacto');
	}



	public function actionSend_inscription(){
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_POST['InscripcionesProyectos']) && isset($_POST['InscripcionesIntegrantes'])){
				$arrayReturn = array(
					'status'=>false,
					'message'=>'No se pudo realizar el registro. Intente mas tarde.'
				);

				$modelProyecto = new InscripcionesProyectos;
				$modelProyecto->attributes = $_POST['InscripcionesProyectos'];

				if($modelProyecto->validate()){
					$modelProyecto->save();
					$numIntegrantes = count($_POST['InscripcionesIntegrantes']['nombre']);
					for ($i=0; $i < $numIntegrantes; $i++) {
						$modelIntegrante = new InscripcionesIntegrantes;
						$modelIntegrante->nombre = $_POST['InscripcionesIntegrantes']['nombre'][$i];
						$modelIntegrante->tipo_identificacion = $_POST['InscripcionesIntegrantes']['tipo_identificacion'][$i];
						$modelIntegrante->identificacion = $_POST['InscripcionesIntegrantes']['identificacion'][$i];
						$modelIntegrante->proyecto = $modelProyecto->id;

						$modelIntegrante->save();
					}

					$arrayReturn = array(
						'status'=>true,
						'message'=>'El registro se realizo con exito.'
					);
				}

				echo CJSON::encode($arrayReturn);
			}
			else
				throw new CHttpException(404,'The requested page does not exist.');
		}
		else
			throw new CHttpException(404,'The requested page does not exist.');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->layout = 'error';
				$this->render('error', $error);
			}
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}