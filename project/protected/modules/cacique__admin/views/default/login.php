<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>
<div class="full-content-center">
	<p class="text-center"><a href="#"><img class="logo-company" src="<?php echo Yii::app()->request->baseUrl; ?>/images/admin/logo.png" alt="Logo" style=" width: 160px;"></a></p>
	<div class="login-wrap animated flipInX">
		<div class="login-block">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/users/default.png" class="img-circle not-logged-avatar">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>false,
				'clientOptions'=>array(
					'validateOnSubmit'=>false,
				),
				'htmlOptions'=>array(
					'role'=>"form",
				)
			)); ?>
				<div class="form-group login-input">
					<i class="fa fa-user overlay"></i>
					<?php echo $form->emailField($model,'username', array("class"=>'form-control text-input', "placeholder"=>'Usuario', "autocomplete"=>"off")); ?>
				</div>
				<div class="form-group login-input">
					<i class="fa fa-key overlay"></i>
					<?php echo $form->passwordField($model,'password', array("class"=>'form-control text-input', "placeholder"=>'Password')); ?>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<button type="submit" class="btn btn-success btn-block">LOGIN</button>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>