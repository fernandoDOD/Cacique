<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'notica-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'role'=>'form',
        'enctype'=>"multipart/form-data",
    )
)); ?>
	<div class="row">
		<?php if($form->errorSummary($model) != ""){ ?>
			<div class="col-sm-12">
	            <div class="alert alert-danger">
	                <?php echo $form->errorSummary($model); ?>
	            </div>
	        </div>
        <?php } ?>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Noticia</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo $form->labelEx($model,'titulo'); ?>
		        				<?php echo $form->textField($model,'titulo',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Titulo','required'=>true)); ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo $form->labelEx($model,'Video'); ?>
		        				<div>
		        					<?php echo $form->checkBox($model,'es_video',array('class'=>'ios-switch ios-switch-success ios-switch-sm')); ?>
		        				</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'Link de YouTube'); ?>
		        				<?php echo $form->textField($model,'link',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Link de YOUTUBE')); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="imag-before-upload" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/admin/gray.jpg); max-width: 600px;height: 400px;">
									<?php if(!$model->isNewRecord && $model->imagen != ""){ ?>
										<div class="img" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/galeria/<?php echo $model->imagen; ?>)"></div>
									<?php } ?>
								</div>
								<input type="file" accept="image/*" class="btn btn-default js-show-before" name="image" data-before=".imag-before-upload" title="<?php echo ($model->isNewRecord)?'Agregar Imagen':'Cambiar Imagen' ?>">
								<p class="help-block"><strong>Nota: </strong> Dimensiones maximas recomendadas de 800x600. Peso maximo 600Kb.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('gallery/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>