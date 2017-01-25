<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />

        <!-- Base Css Files -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/pace/pace.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/prettify/github.css" rel="stylesheet" />
        
        <!-- Extra CSS Libraries Start -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Extra CSS Libraries End -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin-variables.js"></script>

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>
    </head>
    <body class="fixed-left login-page">
        <!-- Modal Start -->
		
	<!-- Modal Logout -->
	<div class="md-modal md-just-me" id="logout-modal">
		<div class="md-content">
			<h3><strong>Logout</strong> Confirmación</h3>
			<div>
				<p class="text-center">Esta seguro de salir del sistema?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">No!</button>
					<a href="login.html" class="btn btn-success md-close">Si, Estoy seguro</a>
				</p>
			</div>
		</div>
	</div><!-- Modal End -->



	<!-- Modal Loading -->
	<div class="md-modal md-just-me" id="modal-ajax-loading">
		<div class="md-content">
			<p class="text-center">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/admin/ajax-loader.gif">
			</p>
			<button class="btn btn-danger md-close v-none">Cerrar</button>
		</div>
	</div><!-- Modal End -->
	<!-- Activate Modal Loading -->
		<button data-modal="modal-ajax-loading" class="btn btn-success btn-block v-none md-trigger" id="md-active-loading">LOGIN</button>
	<!-- End Activate -->
	<!-- Modal Message -->
	<div class="md-modal md-fade-in-scale-up" id="modal-message">
		<div class="md-content">
			<h3></h3>
			<div>
				<div class="message-content"></div>
				<p>
					<button class="btn btn-danger md-close">Cerrar</button>
					<a href="#" class="btn btn-success md-redirect">Ir</a>
				</p>
			</div>
		</div><!-- End div .md-content -->
	</div><!-- End div .md-modal .md-fade-in-scale-up -->
	<!-- Activate Modal Message -->
		<button data-modal="modal-message" class="btn btn-success btn-block v-none md-trigger" id="md-active-message"></button>
	<!-- End Activate -->



	<!-- Begin page -->
	<div class="container">
		<?php echo $content; ?>
	</div>
	<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-detectmobile/detect.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/ios7-switch/ios7.switch.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/fastclick/fastclick.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-blockui/jquery.blockUI.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-bootbox/bootbox.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/nifty-modal/js/classie.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/nifty-modal/js/modalEffects.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/sortable/sortable.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-select2/select2.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/pace/pace.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/jquery-icheck/icheck.min.js"></script>

	<!-- Demo Specific JS Libraries -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/libs/prettify/prettify.js"></script>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/init.js"></script>

	<!-- MY SCRIPT -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin.js"></script>
	</body>
</html>