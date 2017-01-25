<section class="content-page">
    <div class="row start-xs limiter__container title-ficict title-responsive">
      <h3 class="title-post"><?php echo $convocatoria->titulo ?></h3>
    </div>
    <div class="row between-xs center-xs content-about limiter__container">
      <div class="col-xs"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/convocations/400x400/<?php echo $convocatoria->imagen?>" alt=""/></div>
      	<?php echo $convocatoria->contenido ?>
    </div>
  </section>
  	<?php $this->renderPartial('//layouts/_donations'); ?>
	<?php $this->renderPartial('//layouts/_footer'); ?>