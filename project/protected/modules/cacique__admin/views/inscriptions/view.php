<div class="profile-banner">
	<div class="my-header-blur" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/users/default.png);"></div>
</div>

<
<div class="row" style="margin-top: 60px;">
	<div class="col-sm-12">
		<div class="widget widget-tabbed">
			<!-- Nav tab -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-tags"></i> Proyecto</a></li>
				<li class=""><a href="#article" data-toggle="tab"><i class="fa fa-tags"></i> Descripción</a></li>
			  <li class=""><a href="#integrantes" data-toggle="tab"><i class="fa fa-tags"></i> Integrantes</a></li>
			</ul>
			<!-- End nav tab -->

			<!-- Tab panes -->
			<div class="tab-content">

				<!-- Tab about -->
				<div class="tab-pane animated fadeInRight active" id="about">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-6">
								<p>
									<strong>Nombre del proyecto</strong><br>
									<h3><?php echo $model->nombre; ?></h3>
								</p>
								<p>
									<strong>Tipo</strong><br>
									<h5><?php echo $model->tipo; ?></h5>
								</p>
								<p>
									<strong>Categoria</strong><br>
									<h5><?php echo $model->categoria; ?></h5>
								</p>
							</div>
							<div class="col-sm-6">
								<p>
									<strong>Email</strong><br>
									<h5><?php echo $model->email; ?></h5>
								</p>
								<p>
									<strong>Ciudad</strong><br>
									<h5><?php echo $model->ciudad; ?></h5>
								</p>
								<p>
									<strong>Departamento</strong><br>
									<h5><?php echo $model->departamento; ?></h5>
								</p>
								<p>
									<strong>País</strong><br>
									<h5><?php echo $model->pais; ?></h5>
								</p>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
				<div class="tab-pane animated fadeInRight" id="article">
					<div class="user-profile-content">
						<div class="row">
							<div class="col-sm-12">
								<?php echo $model->descripcion; ?>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
				<div class="tab-pane animated fadeInRight" id="integrantes">
					<div class="user-profile-content">
						<div class="row">
								<?php foreach ($model->inscripcionesIntegrantes as $key => $integrante) { ?>
									<div class="col-sm-12">
										<div class="col-sm-4">
											<h3>Nombre</h3>
											<p><?php echo $integrante->nombre; ?></p>
										</div>
										<div class="col-sm-4">
											<h4>Tipo de identificación</h4>
											<p><?php echo $integrante->tipo_identificacion; ?></p>
										</div>
										<div class="col-sm-4">
											<h4>Número</h4>
											<p><?php echo $integrante->identificacion; ?></p>
										</div>
									</div>
								<?php } ?>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
			</div><!-- End div .tab-content -->
		</div><!-- End div .box-info -->
	</div>
</div>
