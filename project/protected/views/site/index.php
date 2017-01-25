	<script>$('.header-content').addClass('menu-transparent');</script>
  <section class="homepage-hero-module">
    <div class="row center-xs">
      <div id="slider-wrapper">
        <div id="slider">
          <?php foreach ($slide->images as $key => $imagen) { ?>
            
            <section class="row middle-xs center-xs">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $slide->id_gallery ?>/<?php echo $imagen->name ?>" alt=""/>
            </section>

          <?php } ?>

        </div>
        <div id="btn-prev">&#60;</div>
        <div id="btn-next">&#62;</div>
      </div>
    </div>
    <div class="video-container">
      <div class="filter"></div>
      <video autoplay="autoplay" loop="loop" class="fullWidth">
        <source src="<?php echo Yii::app()->request->baseUrl; ?>/images/video/video-index.mp4" type="video/mp4"/>
        <source src="<?php echo Yii::app()->request->baseUrl; ?>/images/video/video-index.webm" type="video/webm"/>
      </video>
      <div class="poster hidden">
      	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/video/video-index.jpg" alt=""/>
      </div>
    </div>
  </section>
  <section class="black-bk">
    <div class="row start-xs limiter__container title-notice">
      <h3>NOTICIAS</h3>
      <h3 class="white-title">NOTICIAS</h3>
    </div>
    <div class="section-notice row limiter__container">
      
      <?php foreach ($noticias as $key => $noticia) {
        
         if ($noticia->tamanio != 1) {  ?>
          <div style="background: url(images/news/<?php echo $noticia->imagen; ?> ) center no-repeat; background-size: cover;" class="item-notice row bottom-xs col-sm-12 col-md-6">
            <div class="hover-notice row center-xs middle-xs">
              <h6 class="col-xs-12"><?php echo $noticia->titulo; ?></h6><a href="<?php echo $this->createUrl('/noticias/'.MyMethods::normalizarUrl($noticia->id.'_'.$noticia->titulo)); ?>">ver +</a>
            </div>
          <h4 class="box"><?php echo $noticia->titulo; ?></h4>
          </div>
       <?php } else{ ?>
           <div style="background: url(images/news/<?php echo $noticia->imagen; ?> ) center no-repeat; background-size: cover;" class="item-notice row bottom-xs col-sm-12">
              <div class="hover-notice row center-xs middle-xs">
                <h6 class="col-xs-12"><?php echo $noticia->titulo; ?></h6><a href="<?php echo $this->createUrl('/noticias/'.MyMethods::normalizarUrl($noticia->id.'_'.$noticia->titulo)); ?>">ver +</a>
              </div>
              <h4 class="box"><?php echo $noticia->titulo; ?></h4>
          </div>

       <?php } ?>
      <?php } ?>

    </div>
    <div class="col-xs-12 row center-xs"><a href="#"><img id="arown-down" src="images/icons/arrow.svg" alt="down" class="to-svg"/></a></div>
  </section>
  <section class="convocations">
    <div class="row start-xs limiter__container title-convocations">
      <h3>CONVOCATORIAS</h3>
      <h3 class="white-title">CONVOCATORIAS</h3>
    </div>
    <div class="section-convocations row limiter__container">
      
      <?php foreach ($convocatorias as $key => $convocatoria) { ?>
        
      <div style="background: url(images/convocations/<?php echo $convocatoria->imagen; ?>) center no-repeat; background-size: cover;" class="col-xs-12 item-convocations">
        <div class="hover-convocations row center-xs middle-xs">
          <h6 class="col-xs-12"><?php echo $convocatoria->titulo; ?></h6><span class="col-xs"></span>
          <p class="col-xs-12"><?php echo $convocatoria->titulo; ?></p><a href="<?php echo $this->createUrl('/convocatorias/'.MyMethods::normalizarUrl($convocatoria->id.'_'.$convocatoria->titulo)); ?>" class="btn-ver btn-green">ver +</a>
        </div>
      </div>

      <?php } ?>
    </div>
  </section>
  <section class="black-bk">
    <div class="row start-xs limiter__container title-gallery">
      <h3>GALERíA</h3>
      <h3 class="white-title">VIDEO</h3>
    </div>
    <div class="grid-pinteres limiter__container">
      
      <?php foreach ($galeria as $key => $item) {

        if ($item->es_video != 1) { ?>
      <div class="grid-item"><a rel="fancybox-thumb" href="images/galeria/<?php echo $item->imagen; ?>" class="fancybox-thumb hover-gallery row center-xs middle-xs">
          <h4 class="col-xs"><?php echo $item->titulo; ?></h4></a><img src="images/galeria/<?php echo $item->imagen; ?>" class="image"/></div>
        <?php } else { ?>
      
      <div class="grid-item"><a rel="fancybox-thumb" href="/galeria/<?php echo $item->link; ?>" class="fancybox-media hover-gallery row center-xs middle-xs">
          <h4 class="col-xs"><?php echo $item->titulo; ?></h4></a><img src="images/galeria/<?php echo $item->imagen; ?>" class="image"/></div>
       <?php }

       } ?>
    </div>
  </section>
<?php $this->renderPartial('//layouts/_donations'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>