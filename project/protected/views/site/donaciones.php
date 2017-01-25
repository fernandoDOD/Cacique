<section class="content-page">
  <div class="row start-xs limiter__container title-donations">
    <h3>DONACIONES</h3>
  </div>
  <section class="donations">
    <div class="limiter__container row center-xs middle-xs">
      <div class="col-xs-12 col-lg-6 col-md-10">
        <h4>BENEFICIOS</h4>
        <div class="text-donation"> <?php echo $contenido->contenido; ?></div>
        <div class="email-donations">
          <p>fundacionculturalctundama@gmail.com</p>
        </div>
      </div>
      <div class="col-xs-12 col-lg-5 limiter__container">
        <div class="section-purple row center-xs"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/money-count.svg" alt="" class="to-svg col-xs-12"/>
          <h5 class="col-xs-12">NÚMERO DE CUENTA</h5>
          <h3 class="col-xs-12">26 258 243 829</h3>
          <h6 class="col-xs-12">Ahorros Bancolombia    </h6>
        </div>
      </div>
    </div>
  </section>
</section>
<?php $this->renderPartial('//layouts/_footer'); ?>