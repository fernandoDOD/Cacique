<div class="page-heading">
    <h1><strong>Banco</strong> Imagenes</h1>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="widget transparent animated fadeInDown">
			<div class="row">
				<div class="data-table-toolbar">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<div class="toolbar-btn-action">
								<a class="btn btn-success" href="<?php echo $this->createUrl('imagesbank/add'); ?>"><i class="fa fa-plus-circle"></i> Add more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="gallery-wrap">
				<?php foreach ($images as $key => $image) { ?>
					<div class="column">
						<div class="inner">
							<a data-msj="¿Esta seguro de querer eliminar la Imagen? Despues no podra recuperarla. Verifique que la imagen no se este mostrando en alguna parte del sitio." href="<?php echo $this->createUrl('imagesbank/delete_image/'.$image->id_image); ?>" data-toggle="tooltip" title="Eliminar" class="js-confirm my-botton-delete">X</a>
							<a class="zooming" href="<?php echo Yii::app()->request->baseUrl; ?>/images/bank/<?php echo $image->image; ?>" title="<?php echo Yii::app()->request->baseUrl; ?>/images/bank/<?php echo $image->image; ?>">
								<div class="img-wrap" style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/bank/250x250/<?php echo $image->image; ?>) center; background-size: cover;">
									
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>