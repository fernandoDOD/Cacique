<?php $fecha = date_format(date_create($model->fecha), 'd-m-Y'); ?>
<?php $fecha_fin = date_format(date_create($model->fecha_fin), 'd-m-Y'); ?>

<div class="profile-banner">
	<div class="my-header-blur" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo ($model->imagen != '')?('convocations/'.$model->imagen):'admin/gray.jpg'; ?>);"></div>
	<div class="col-sm-3 avatar-container">
		<div class="img-circle profile-avatar" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo ($model->imagen != '')?('convocations/400x400/'.$model->imagen):'admin/gray.jpg'; ?>); background-size: cover; height: 200px;"></div>
	</div>
</div>

<div class="row" style="margin-top: 60px;">
	<div class="col-sm-3">
		<!-- Begin user profile -->
		<div class="text-center user-profile-2">
			<h4><?php echo $model->titulo; ?></h4>
		</div><!-- End div .box-info -->
		<!-- Begin user profile -->
	</div><!-- End div .col-sm-3 -->
	<div class="col-sm-9">
		<div class="widget widget-tabbed">
			<!-- Nav tab -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-tags"></i> Noticia</a></li>
			  <li class=""><a href="#article" data-toggle="tab"><i class="fa fa-tags"></i> Contenido</a></li>
			</ul>
			<!-- End nav tab -->

			<!-- Tab panes -->
			<div class="tab-content">
				
				<!-- Tab about -->
				<div class="tab-pane animated fadeInRight active" id="about">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-12">
								<h2><?php echo $model->titulo; ?></h2>
							</div>
							<div class="col-sm-6">
								<p>
									<strong>Fecha Inicio</strong><br>
									<?php echo Yii::app()->dateFormatter->format("d 'de' MMMM 'de' yyyy", $fecha); ?>
								</p>
							</div>
							<div class="col-sm-6">
								<p>
									<strong>Fecha Fin</strong><br>
									<?php echo Yii::app()->dateFormatter->format("d 'de' MMMM 'de' yyyy", $fecha_fin); ?>
								</p>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
				<div class="tab-pane animated fadeInRight" id="article">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-12">
								<?php echo $model->contenido; ?>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
			</div><!-- End div .tab-content -->
		</div><!-- End div .box-info -->
	</div>
</div>