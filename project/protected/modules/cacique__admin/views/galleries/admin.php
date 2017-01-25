<div class="page-heading">
    <h1>Administración Galerias</h1>
</div>

<div class="row">
	<div class="widget transparent animated fadeInDown">
		<div class="col-md-12" style="margin-bottom: 15px;">
			<div class="data-table-toolbar">
				<div class="row">
					<div class="col-md-8 col-md-offset-4">
						<div class="toolbar-btn-action">
							<a class="btn btn-success" href="<?php echo $this->createUrl('galleries/create?new'); ?>"><i class="fa fa-plus-circle"></i> Add new</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="my-caps-line-content">
		<?php foreach ($galleries as $key => $gallery) {
			$galleriesUtil = GeneralValue::model()->findAllByAttributes(array('relation'=>'Galleries', 'value'=>$gallery->id_gallery, 'status'=>'1'));
		?>
			<div class="col-md-6 my-caps-line">
				<div class="widget">
					<div class="widget-header transparent">
						<h2><?php echo $gallery->name; ?></h2>
						<div class="additional-btn">
							<?php if(count($galleriesUtil) == 0){ ?>
								<a data-msj="¿Esta seguro de querer eliminar la galeria <?php echo $gallery->name; ?>? Despues no podra recuperar sus imagenes." href="<?php echo $this->createUrl('galleries/delete_gallery/'.$gallery->id_gallery); ?>" class="js-confirm"><i class="icon-cancel-circle" data-toggle="tooltip" title="Eliminar"></i></a>
							<?php } ?>
							<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
						</div>
					</div>
					<div class="widget-content padding gallery-wrap my-caps-line-content" style="display: none;">
						<?php foreach ($gallery->images as $key => $image) { ?>
							<div class="col-sm-6 col-md-4 my-caps-line">
								<?php if(count($gallery->images) > 1){ ?>
									<div class="image-delete">
										<a data-msj="¿Esta seguro de querer eliminar la imagen? Despues no podra recuperarla." href="<?php echo $this->createUrl('galleries/delete_image')."/".$image->id_image; ?>" data-toggle="tooltip" title="Eliminar" class="js-confirm btn btn-primary btn-xs"><i class="fa fa-times"></i></a>
									</div>
								<?php } ?>
								<a class="zooming" href="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $image->gallery; ?>/<?php echo $image->name; ?>" title="<?php echo $gallery->name; ?>">
									<div class="img-wrap">
										<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $image->gallery; ?>/250x250/<?php echo $image->name; ?>" alt="<?php echo $gallery->name; ?>" title="<?php echo $gallery->name; ?>" class="mfp-fade">
									</div>
								</a>
							</div>
						<?php } ?>
						<div class="col-sm-12">
							<div class="form-group">
								<a href="<?php echo $this->createUrl('galleries/update/'.$gallery->id_gallery); ?>" class="btn btn-danger">Editar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>