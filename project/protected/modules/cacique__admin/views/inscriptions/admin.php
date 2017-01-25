<div class="page-heading">
    <h1>Proyectos inscritos</h1>
</div>

<div class="row">
    <div class="col-md-12">
		<div class="widget">
			<div class="widget-content">
				<div class="widget-header transparent">
					<div class="additional-btn">
						<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
					</div>
				</div>
				<br>
				<div class="table-responsive">
					<form class='form-horizontal' role='form'>
						<table class="table table-striped table-bordered js-data-table" cellspacing="0" width="100%">
					        <thead>
					          <tr align="center">
    									<th>#</th>
    									<th>Ver</th>
    									<th>Nombre</th>
                      <th>Email</th>
                      <th>Teléfono</th>
                      <th>Tipo</th>
                      <th>Categoría</th>
                      <th>Ciudad</th>
                      <th>Departamento</th>
    									<th>País</th>
								    </tr>
					        </thead>

					        <tfoot>
					            <tr>
                        <th>#</th>
                        <th>Ver</th>
      									<th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Tipo</th>
                        <th>Categoría</th>
                        <th>Ciudad</th>
                        <th>Departamento</th>
      									<th>País</th>
					            </tr>
					        </tfoot>

					        <tbody>
					            <?php
					            	foreach ($proyectos as $key => $proyecto) { ?>
										<tr>
											<td style="text-align:center;"><?php echo $key+1; ?></td>
											<td style="width:60px;">
												<div class="btn-group btn-group-xs">
													<a href="<?php echo $this->createUrl('inscriptions/'.$proyecto->id); ?>" data-toggle="tooltip" title="Ver" class="btn btn-default"><i class="fa fa-external-link"></i></a>
												</div>
											</td>
											<td><?php echo $proyecto->nombre; ?></td>
                      <td><?php echo $proyecto->email; ?></td>
                      <td><?php echo $proyecto->telefono; ?></td>
                      <td><?php echo $proyecto->tipo; ?></td>
                      <td><?php echo $proyecto->categoria; ?></td>
                      <td><?php echo $proyecto->ciudad; ?></td>
                      <td><?php echo $proyecto->departamento; ?></td>
											<td><?php echo $proyecto->pais; ?></td>
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
