<?php

class ConvocatoriasController extends Controller
{
	public function actionView($id){
		$id = explode('_', $id);
        $id = $id[0];

        $convocatoria = $this->loadModel($id);
        
        $this->render('view',array(
            'convocatoria'=>$convocatoria,
        ));
	}

	private function loadModel($id)
    {
        $model= Convocatorias::model()->findByAttributes(array('id'=>$id, 'estado'=>1));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}