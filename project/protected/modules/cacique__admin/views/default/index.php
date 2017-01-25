<!-- Page Heading Start -->
<div class="page-heading">
    <h1>Administración Web Cacique Tundama</h1>
</div>
<!-- Page Heading End-->

<div class="row">
    <div class="col-md-12">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><i class="icon-picture-2"></i> <strong>Slide</strong> Principal</h2>
				<div class="additional-btn">
					<a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
				</div>
			</div>
			<div class="widget-content" style="background: rgba(0,0,0,0.6);">
				<div class="statistic-chart">	
					<div class="row stacked">
						<div class="col-sm-12">
							<div class="toolbar">
								<div class="pull-right">
									<label class="left">Galeria</label>
									<div class="btn-group">
										<select class="form-control" id="Slide_Principal">
											<?php foreach ($galleries as $key => $gallery) { ?>
												<option value="<?php echo $gallery->id_gallery; ?>" <?php echo ($currentGallery->id_gallery == $gallery->id_gallery)?'selected="selected"':''; ?>><?php echo $gallery->name; ?></option>
											<?php } ?>
										</select>
									</div>
									<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary btn-xs general-value-set" data-element-val="#Slide_Principal" data-value-bd="8" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							<div class="morris-chart principal-slide" style="height: 500px;">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner js-container-ajax" role="listbox">
										<?php foreach ($currentGallery->images as $key => $image) { ?>
											<div class="item <?php echo ($key==0)?'active':''; ?>">
						                        <div class="my-item-slide" style="background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/galleries/<?php echo $currentGallery->id_gallery ?>/<?php echo $image->name; ?>)"></div>
						                    </div>
										<?php } ?>
									</div>
									<script type="text/javascript">
			                            loadAjax = {
			                                "url":"<?php echo $this->createUrl('galleries/loadGalleryFull'); ?>",
			                                "filter":null,
			                                "container":".js-container-ajax",
			                                "page":0,
			                                "load":false
			                            }
			                        </script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><i class="icon-share-2"></i> <strong>Datos</strong> Contacto</h2>
				<div class="additional-btn">
					<a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
				</div>
			</div>
			<div class="widget-content padding">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="contactUno">Email Contacto Uno</label>
						<div class="input-group">
							<input type="text" class="form-control" id="contactUno" value="<?php echo $emailContact->value; ?>" placeholder="Enter Email">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#contactUno" data-value-bd="1" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="contactDos">Email Contacto Dos</label>
						<div class="input-group">
							<input type="text" class="form-control" id="contactDos" value="<?php echo $emailContactDos->value; ?>" placeholder="Enter Email">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#contactDos" data-value-bd="2" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Phone_url">Teléfono Contacto</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Phone_url" value="<?php echo $phoneContact->value; ?>" placeholder="Enter Number Phone">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#Phone_url" data-value-bd="6" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Video_url">Video Página FICICT</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Video_url" value="<?php echo $video->value; ?>" placeholder="Enter ID Video Youtube">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#Video_url" data-value-bd="7" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="widget">
			<div class="widget-header transparent">
				<h2><i class="icon-share-2"></i> <strong>Redes</strong> Sociales</h2>
				<div class="additional-btn">
					<a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
				</div>
			</div>
			<div class="widget-content padding">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Facebook_url">Facebook</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Facebook_url" value="<?php echo $facebook->value; ?>" placeholder="Enter Facebook Page">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#Facebook_url" data-value-bd="3" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Twitter_url">Twitter</label>
						<div class="input-group">
							<input type="text" class="form-control" id="Twitter_url" value="<?php echo $twitter->value; ?>" placeholder="Enter Twitter Page">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#Twitter_url" data-value-bd="4" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Twitter_url">YouTube</label>
						<div class="input-group">
							<input type="text" class="form-control" id="YouTube_url" value="<?php echo $youtube->value; ?>" placeholder="Enter YouTube Page">
							<span class="input-group-btn">
								<a href="<?php echo $this->createUrl('generalvalue/set'); ?>" class="btn btn-primary general-value-set" data-element-val="#YouTube_url" data-value-bd="5" data-toggle="tooltip" title="Establecer"><i class="icon-check-1"></i></a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>