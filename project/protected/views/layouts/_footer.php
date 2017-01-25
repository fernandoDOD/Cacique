
<?php $contactUno = GeneralValue::model()->findByPk(1); ?>
<?php $contactDos = GeneralValue::model()->findByPk(2); ?>
<footer class="row center-xs around-xs middle-xs limiter__container">
	<div class="col-lg-3 col-md-4 logo">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo-color-tx-black.svg" alt="logo" class="to-svg"/>
	</div>
	<div class="col-lg-6 col-md-6 contact-footer">
		<p><?php echo $contactUno->value; ?></p>
		<p><?php echo $contactDos->value; ?></p>
	</div>
</footer>