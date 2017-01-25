<!DOCTYPE>
    <html lang="es">
      <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>

        <meta name="application-name" content="Lantel" />
        <meta name="description" content="<?php echo CHtml::encode($this->pageDescription); ?>" />
        <meta name="keywords" content="Lantel, Soluciones tecnologicas, Suministros, Consultoria." />
        <meta name="robots" content="index, follow" />

        <meta name="author" content="Lantel" />

        <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>">
        <meta property="og:image" content="<?php echo Yii::app()->createAbsoluteUrl($this->tagImage); ?>">
        <meta property="og:description" content="<?php echo CHtml::encode($this->pageDescription); ?>">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
          
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/normalize.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/flexboxgrid.min.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-carousel/owl.carousel.min.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-carousel/owl.theme.default.min.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/wow/animate.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.css?v=2.1.5"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7"/>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery.min.js"></script>
     </head>
    <body>
        <?php $this->renderPartial('//layouts/_header'); ?>
	    <section class="content">
	    	<?php echo $content; ?>
	    </section>

		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/pinterest_grid.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/animatescroll.min.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/wow/wow.min.js"></script>
	    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-carousel/owl.carousel.min.js"></script>
	    <script type="text/javascript" src="http://masonry.desandro.com/masonry.pkgd.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEpuO83Ial22H8ncDSJWQTHgpVicag9lo&amp;libraries=places&amp;callback=initAutocomplete" async="async" defer="defer"></script>
    </body>
	</html>