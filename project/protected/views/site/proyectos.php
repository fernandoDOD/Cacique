<section class="content-page">
<div class="row start-xs limiter__container title-proyect title-responsive">
  <h3>PROYECTOS</h3>
</div>
<div class="row between-xs content-about limiter__container">
  <?php echo $contenido->contenido; ?>

  <div class="row middle-xs col-sm-12 col-md-5 section-title title-green-1">
    <h5 class="col-xs-6">FICICT</h5>
    <a href="<?php echo $this->createUrl('/ficict'); ?>" class="col-xs-6 end-xs">ver +</a>
  </div>
  <div class="row middle-xs col-sm-12 col-md-5 section-title title-green-2">
    <h5 class="col-xs-6">FSACCT</h5>
    <a href="<?php echo $this->createUrl('/fsacct'); ?>" class="col-xs-6 end-xs">ver +</a>
  </div>
</div>
</section>
<?php $this->renderPartial('//layouts/_donations'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>