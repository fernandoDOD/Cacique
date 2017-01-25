<section class="content-page">
  <div class="row start-xs limiter__container title-contact">
    <h3>CONTACTO</h3>
  </div>
  <div class="row start-xs limiter__container title-contact"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/contact.svg" alt="icono-contacto" class="to-svg"/>
    <p>
      info@caciquetundama.com </br>
      315 3592837
    </p>
  </div>
  <div class="row center-xs middle-xs">
    <div class="col-xs-8 message-contact limiter__container">
      <h4>DÉJANOS TU COMENTARIO</h4>
    </div>
    <div class="black-bk">
      <div class="row center-xs limiter__container form-contact">
        <form class="col-xs-9 row end-xs limiter__container">
          <textarea placeholder="Aquí va tu comentario" class="col-xs-12"></textarea>
          <button class="col-xs-2">ENVIAR</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?php $this->renderPartial('//layouts/_footer'); ?>