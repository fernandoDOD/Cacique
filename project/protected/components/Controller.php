<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	public $scripts = array();
	public $scriptsBase = array(
		array( 'type'=>'css', 'file'=>'assets/admin/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/bootstrap/css/bootstrap.min' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/font-awesome/css/font-awesome.min' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/fontello/css/fontello' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/animate-css/animate.min' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/nifty-modal/css/component' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/magnific-popup/magnific-popup' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/ios7-switch/ios7-switch' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/pace/pace' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/sortable/sortable-theme-bootstrap' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/bootstrap-datepicker/css/datepicker' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/jquery-icheck/skins/all' ),
		array( 'type'=>'css', 'file'=>'assets/admin/libs/prettify/github' ),
	);
	public $scriptsDefault = array(
		array( 'type'=>'css', 'file'=>'assets/admin/css/style' ),
		array( 'type'=>'css', 'file'=>'assets/admin/css/style-responsive' ),
		
		array(
			'type'=>'js',
			'file'=>'js/admin'
		)
	);

	public $showSectionContact = true;

	public $pageTitle = 'Cacique Tundama';
	public $pageDescription = 'La Fundación Artística y Cultural Cacique Tundama (FACCT) es una entidad sin ánimo de lucro dirigida por cineastas, investigadores sociales, músicos, pedagogos y creativos transmedia que orientan sus esfuerzos en la capacidad de abrir espacios de dinamización y fortalecimiento del campo artístico y cultural en el país.';
	public $tagImage = '/images/view-facebook.jpg';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function addScripts($scripts){
		foreach ($scripts as $key => $script) {
			$this->scripts[] = $script;
		}
	}
	public function writeScripts($packScripts=null, $rewrite=true){
		$baseUrl = Yii::app()->request->baseUrl;
		$load = Yii::app()->getClientScript();
		$scripts = ($packScripts == null)?$this->scriptsBase:$packScripts;

		for ($i = 0; $i < count($scripts); $i++) {
			if($scripts[$i]['type'] == 'css')
				$load->registerCssFile($baseUrl.'/'.$scripts[$i]['file'].'.css');
			else if($scripts[$i]['type'] == 'js')
				$load->registerScriptFile($baseUrl.'/'.$scripts[$i]['file'].'.js',CClientScript::POS_END);
		}
		if($rewrite)
			if($packScripts == null){
				$this->writeScripts($this->scripts, false);
				$this->writeScripts($this->scriptsDefault, false);
			}

		$this->deleteDefault();
	}

	private function deleteDefault(){
		$cs = Yii::app()->clientScript;
        $cs->scriptMap=array(
            'jquery-ui.min.js'=>false,
        );
	}
}