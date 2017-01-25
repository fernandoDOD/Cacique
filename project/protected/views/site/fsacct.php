<section class="content-page">
    <div class="row start-xs limiter__container title-fsacct title-responsive">
      <h3>FSACCT</h3>
    </div>
    <div class="black-bk slide-content"></div>
    <div class="frame-slide limiter__container">
      <div class="row">
        <div class="owl-carousel owl-theme">
        <?php foreach ($slide->images as $key => $imagen) { ?>

          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $slide->id_gallery ?>/<?php echo $imagen->name ?>" alt="imagen-slide" class="img-slide"/></div>

          <?php } ?>
        </div>
      </div>
    </div>
    <div class="text-fsacct limiter__container">
      <?php echo $contenido->contenido; ?>
    </div>
    <div class="black-bk">
      <div class="section-contact__fsacct row center-xs middle-xs limiter__container">
        <h5>CONTACTO</h5>
        <div class="line-green"></div>
        <p class="col-xs-12">Email: fundacionculturalctundama@gmail.com</p>
        <p class="col-xs-12"> <strong>Teléfono   </strong>4567899 - <strong>Dirección  </strong>Calle 5 No 15 - 35</p>
      </div>
    </div></br>
  </section>
	<?php $this->renderPartial('//layouts/_donations'); ?>
	<?php $this->renderPartial('//layouts/_footer'); ?>