<?php

class NoticiasController extends Controller
{
	public function actionView($id){
		$id = explode('_', $id);
        $id = $id[0];

        $noticia = $this->loadModel($id);
        
        $this->render('view',array(
            'noticia'=>$noticia,
        ));
	}

	private function loadModel($id)
    {
        $model= Noticias::model()->findByAttributes(array('id'=>$id, 'estado'=>1));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}