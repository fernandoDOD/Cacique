<div class="page-heading">
    <h1>Administración de Personas</h1>
</div>

<div class="row">
    <div class="col-md-12">
		<div class="wid_teamget">
			<div class="wid_teamget-content">
				<div class="wid_teamget-header transparent">
					<div class="additional-btn">
						<a href="#" class="hid_teamden reload"><i class="icon-ccw-1"></i></a>
					</div>
				</div>
				<div class="data-table-toolbar">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<div class="toolbar-btn-action">
								<a class="btn btn-success" href="<?php echo $this->createUrl('team/create'); ?>"><i class="fa fa-plus-circle"></i> Add team</a>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="table-responsive">
					<form class='form-horizontal' role='form'>
						<table class="table table-striped table-bordered js-data-table" cellspacing="0" wid_teamth="100%">
					        <thead>
					            <tr align="center">
									<th>#</th>
									<th>Acciones</th>
									<th></th>
									<th>Nombre</th>
									<th>Cargo</th>
									<th>Estado</th>
								</tr>
					        </thead>
					 
					        <tfoot>
					            <tr>
					                <th>#</th>
									<th>Acciones</th>
									<th></th>
									<th>Nombre</th>
									<th>Cargo</th>
									<th>Estado</th>
								</tr>
					        </tfoot>
					 
					        <tbody>
					            <?php
					            	foreach ($equipos as $key => $equipo) { ?>
										<tr>
											<td style="text-align:center;"><?php echo $key+1; ?></td>
											<td style="width:120px;">
												<div class="btn-group btn-group-xs">
													<a href="<?php echo $this->createUrl('team/'.$equipo->id); ?>" data-toggle="tooltip" title="Ver" class="btn btn-default"><i class="fa fa-external-link"></i></a>
													<a href="<?php echo $this->createUrl('team/update/'.$equipo->id); ?>" data-toggle="tooltip" title="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>
													<?php if($equipo->estado == 1){ ?>
														<a href="<?php echo $this->createUrl('team/estado')."/".$equipo->id; ?>" data-toggle="tooltip" title="Ocultar" class="btn btn-default"><i class="fa fa-minus-circle"></i></a>
													<?php } else{ ?>
														<a href="<?php echo $this->createUrl('team/estado')."/".$equipo->id; ?>" data-toggle="tooltip" title="Mostrar" class="btn btn-default"><i class="fa fa-check"></i></a>
													<?php } ?>
													<a data-msj='¿Esta seguro de querer eliminar la entrada "<?php echo $equipo->nombre; ?>"? Despues no podra recuperarla, recuerde que otra opción es dejarla oculta.' href="<?php echo $this->createUrl('team/delete_equipo')."/".$equipo->id; ?>" data-toggle="tooltip" title="Eliminar" class="js-confirm btn btn-default"><i class="fa fa-power-off"></i></a>
												</div>
											</td>
											<td><div class="img-circl img-table-rep" style="background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo ($equipo->imagen != '')?('team/400x300/'.$equipo->imagen):'admin/gray.jpg'; ?>)"></div></td>
											<td><?php echo $equipo->nombre; ?></td>
											<td><?php echo $equipo->cargo; ?></td>
											<td><span class="label label-<?php echo($equipo->estado == 1)?"success":"warning" ?>"><?php echo ($equipo->estado == 1)?'Activo':'Oculto'; ?></span></td>
										</tr>
									<?php }
								?>
					        </tbody>
					    </table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>