<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-content padding">
				<div class="row">
					<div class="col-md-6">
						<?php $form=$this->beginWidget('CActiveForm', array(
				            'id'=>'gallery-form',
				            'enableAjaxValidation'=>false,
				            'htmlOptions'=>array(
				                'role'=>'form',
				            )
				        )); ?>

							<?php if($form->errorSummary($model) != ""){ ?>
                                <div class="alert alert-danger">
                                    <?php echo $form->errorSummary($model); ?>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <?php echo $form->labelEx($model,'name'); ?>
                                <?php echo $form->textField($model,'name',array('class'=>'form-control','maxlength'=>150,'placeholder'=>'Nombre galeria','required'=>true)); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                                <a href="<?php echo $this->createUrl('galleries/admin'); ?>" class="btn btn-danger">Cancelar</a>
                            </div>

				        <?php $this->endWidget(); ?>
					</div>
					<div class="col-md-6">
						<?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'images-form',
                            'action'=> $this->createUrl('galleries/uploadImages/'.$model->id_gallery),
                            'enableAjaxValidation'=>false,
                            'htmlOptions'=>array(
                                'class'=>'dropzone',
                                'enctype'=>"multipart/form-data",
                            )
                        )); ?>
							
                        <?php $this->endWidget(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>