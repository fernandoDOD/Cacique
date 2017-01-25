<section class="content-page">
<div class="row start-xs limiter__container title-about title-responsive">
  <h3>QUIÉNES SOMOS</h3>
</div>
<div class="content-about limiter__container">
  <?php echo $contenido->contenido; ?>
</div>

<div class="section-team limiter__container row center-xs">
  <div id="items__svg" class="col-xs-12"><img id="svg__team" src="<?php echo Yii::app()->request->baseUrl; ?>/images/about.svg" alt="team" class="to-svg"/></div>
  <div id="items__team" class="col-xs-12">
    <div class="before"></div>
    <?php foreach ($equipo as $key => $item) { ?>
      <div class="profile col-xs-12 col-md-10 row middle-xs">
        <div class="col-xs-12 col-sm-5 col-md-4"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/team/400x300/<?php echo $item->imagen;  ?>" alt="<?php echo $item->nombre ?>"/></div>
        <div class="col-xs-12 col-sm-7 col-md-8 row">
          <h3 class="col-xs-12"><?php echo $item->nombre ?></h3>
          <h4 class="col-xs-8"> <?php echo $item->cargo ?></h4>
          <?php echo $item->contenido ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</section>
<?php $this->renderPartial('//layouts/_donations'); ?>
<?php $this->renderPartial('//layouts/_footer'); ?>