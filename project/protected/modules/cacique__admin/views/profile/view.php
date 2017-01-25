<div class="profile-banner">
	<div class="my-header-blur" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/users/<?php echo ($user->image != "")?$user->image:'default.png'; ?>);"></div>
	<div class="col-sm-3 avatar-container">
		<div class="img-circle profile-avatar" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/users/<?php echo ($user->image != "")?$user->image:'default.png'; ?>); background-size: cover; background-color:#FFFFFF; height: 200px;"></div>
	</div>
	<div class="col-sm-12 profile-actions text-right">
		<a href="<?php echo $this->createUrl('profile/update'); ?>" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i> Editar</a>
	</div>
</div>

<div class="row" style="margin-top: 60px;">
	<div class="col-sm-3">
		<!-- Begin user profile -->
		<div class="text-center user-profile-2">
			<h4><?php echo $user->name; ?></h4>
		</div><!-- End div .box-info -->
		<!-- Begin user profile -->
	</div><!-- End div .col-sm-3 -->
	<div class="col-sm-9">
		<div class="widget widget-tabbed">
			<!-- Nav tab -->
			<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-tags"></i> About</a></li>
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
									<strong>Nombre</strong><br>
									<?php echo $user->name; ?>
								</p>
							</div>
							<div class="col-sm-12">
								<br><strong>Correo electrónico</strong><br>
								<?php echo $user->email; ?>
							</div>
						</div>
					</div><!-- End div .user-profile-content -->
				</div><!-- End div .tab-pane -->
				<!-- End Tab about -->
			</div><!-- End div .tab-content -->
		</div><!-- End div .box-info -->
	</div>
</div>