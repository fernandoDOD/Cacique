<?php $video = GeneralValue::model()->findByPk(7); ?>
<section class="content-page">
    <div class="row start-xs limiter__container title-ficict title-responsive">
      <h3>FICICT</h3>
    </div>
    <div class="black-bk no-margin"></div>
    <div class="frame-content limiter__container">
      <iframe width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo $video->value; ?>?wmode=transparent&amp;controls=0&amp;showinfo=0&amp;theme=light&amp;modestbranding=1" allowfullscreen="allowfullscreen" frameborder="0" controls="0"></iframe>
    </div>
    <div class="row center-xs between-xs top-xs content-ficict limiter__container">
      <div class="col-sm-12 col-md-6"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/afiches-2016.jpg"/></div>
      <div class="col-sm-12 col-md-6 row start-xs">
        <?php echo $contenido->contenido; ?>
        <strong class="col-xs-12">INSCRÍBETE ACÁ</strong>
        <div class="row start-xs limiter__container title-inscriptions"><a href="<?php echo $this->createUrl('/formulario'); ?>">
            <h3>INSCRIPCIONES 2016</h3></a></div>
        <p class="col-xs-12">O Solicítalo al correo </br></p><strong class="col-xs-12">ficictfestivaldecine@gmail.com</strong>
      </div>
    </div>
    <div class="row start-xs limiter__container title-ficict title-responsive">
      <h3>HISTORIA</h3>
    </div>
    <div class="content-history limiter__container">
      <?php echo $historia->contenido; ?>
    </div>
    <div class="row center-xs middle-xs title-fest-before limiter__container">
      <h3>FESTIVALES ANTERIORES</h3>
    </div>
    <div class="black-bk">
      <div class="limiter__container row center-xs middle-xs">

         <div class="col-sm-12 col-md-6 fest-content">
           <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/afiches-2015.jpg"/>
            <h4>2015</h4>

            <a href="">VER GANADORES</a>
            <a rel="fancybox-thumb" href="<?php echo Yii::app()->request->baseUrl; ?>/images/afiches-2015.jpg" class="fancybox-thumb">GALERÍA</a>

           <?php foreach ($slideUno->images as $key => $imagen) { ?>
              <a rel="fancybox-thumb" href="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $slideUno->id_gallery ?>/<?php echo $imagen->name ?>" class="fancybox-thumb"></a>
           <?php } ?>
         </div>

        <div class="col-sm-12 col-md-6 fest-content" style="margin-top: -50px;">
           <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/afiches-2014.jpg"/>
            <h4>2014</h4>

            <a href="">VER GANADORES</a>
            <a rel="fancybox-thumb" href="<?php echo Yii::app()->request->baseUrl; ?>/images/afiches-2014.jpg" class="fancybox-thumb">GALERÍA</a>

           <?php foreach ($slideDos->images as $key => $imagen) { ?>
              <a rel="fancybox-thumb" href="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $slideDos->id_gallery ?>/<?php echo $imagen->name ?>" class="fancybox-thumb"></a>
           <?php } ?>
         </div>
         
      </div>
    </div>
  </section>	
<?php $this->renderPartial('//layouts/_donations'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>