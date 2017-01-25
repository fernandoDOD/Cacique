<div class="page-heading">
    <h1><strong>Agregar</strong> Imagenes</h1>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-content padding">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info">
                            Arrastre o de click al recuadro para agregar las imagenes.
                        </div>
					</div>
					<div class="col-md-12">
						<?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'images-form',
                            'action'=> $this->createUrl('imagesbank/add_ajax'),
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