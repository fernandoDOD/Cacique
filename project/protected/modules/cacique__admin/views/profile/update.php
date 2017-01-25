<div class="page-heading">
    <h1>Editar Perfil - <small><?php echo $model->name; ?></small></h1>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><strong>Información</strong> Usuario</h2>
				<div class="additional-btn">
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
				</div>
			</div>
			<div class="widget-content padding">
				<div>
					<?php $form=$this->beginWidget('CActiveForm', array(
					    'id'=>'profile-form',
					    'enableAjaxValidation'=>false,
					    'htmlOptions'=>array(
					        'role'=>'form',
					        'enctype'=>"multipart/form-data",
					    )
					)); ?>

						<div class="form-group">
							<?php echo $form->labelEx($model,'name'); ?>
							<?php echo $form->textField($model,'name',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Nombre','required'=>true)); ?>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($model,'email'); ?>
							<?php echo $form->emailField($model,'email',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Correo electrónico','required'=>true, 'disabled'=>true)); ?>
						</div>
						<div class="form-group">
							<div class="imag-before-upload" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/users/default.png); width: 180px;">
								<div class="img" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/users/<?php echo $model->image; ?>)"></div>
							</div>
							<input type="file" accept="image/*" class="btn btn-default js-show-before" name="image" data-before=".imag-before-upload" title="Cambiar Imagen">
							<p class="help-block"><strong>Nota: </strong> Dimensiones recomendadas de 300x300. Peso maximo 256Kb.</p>
						</div>
						<button type="submit" class="btn btn-default">Guardar</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><strong>Cambiar</strong> Contraseña</h2>
				<div class="additional-btn">
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
				</div>
			</div>
			<div class="widget-content padding">						
				<div>
					<?php $form=$this->beginWidget('CActiveForm', array(
					    'id'=>'password-form',
					    'enableAjaxValidation'=>false,
					    'htmlOptions'=>array(
					        'role'=>'form',
					        'class'=>"form-horizontal",
					    )
					)); ?>

						<?php if($form->errorSummary($model) != ""){ ?>
							<div class="col-sm-12">
					            <div class="alert alert-danger">
					                <?php echo $form->errorSummary($model); ?>
					            </div>
					        </div>
					    <?php } ?>

						<div class="form-group">
							<label for="password_current" class="col-sm-2 control-label">Contraseña Actual</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="Password[current]" id="password_current" placeholder="Actual contraseña">
							</div>
						</div>
						<div class="form-group">
							<label for="password_new" class="col-sm-2 control-label">Nueva Contraseña</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="Password[new]" id="password_new" placeholder="Nueva contraseña">
							</div>
						</div>
						<div class="form-group">
							<label for="password_repeat" class="col-sm-2 control-label">Repetir Contraseña</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="Password[repeat]" id="password_repeat" placeholder="Repetir contraseña">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Cambiar</button>
							</div>
						</div>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>
</div>