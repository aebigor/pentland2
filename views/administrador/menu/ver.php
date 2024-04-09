<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="?c=Roles&a=createRolUsuarioA"><i class=""></i> &nbsp; NUEVO PRODUCTO</a>
					</li>
					<li>
						<a class="active" href=""><i class=""></i> &nbsp; LISTA DE PRODUCTOS</a>
					</li>
					<li>
						<a href=""><i class=""></i> &nbsp; BUSCAR PRODUCTO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>Código</th>
								<th>Nombre</th>								
								<th>Apellido</th>
								<th>Correo</th>
								
								<th>Rol</th>
								<th>Actualizar</th>
								<th>Eliminar</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							        // Check if $roles is not empty
									if (!empty($User)) {
										foreach ($User as $users) : ?>
											<tr class="text-center">
							        <td><?php echo $users->getId(); ?></td>
												<td><?php echo $users->getnombre(); ?></td>
												<td><?php echo $users->getapellidos(); ?></td>
												<td><?php echo $users->getcorreo(); ?></td>
												<td><?php echo $users->getrol(); ?></td>
												<td>
												    <a href="?c=User&a=editUsuario&idUsuario=<?php echo $users->getId(); ?>" class="btn btn-success">
												        <i class="fas fa-sync-alt"></i> Actualizar
												    </a>

												</td>
												<td>
												    <form method="post" action="?c=User&a=deleteUsuario&idRol=">
												        <input type="hidden" name="id" value="<?php echo $users->getId(); ?>">
												        <button type="submit" class="btn btn-danger">Eliminar Producto</button>
												    </form>
												</td>


										
											</tr>
										<?php endforeach;
									} else {
										echo '<tr><td colspan="7">No hay productos disponibles.</td></tr>';
									}
							?>
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>

		</section>
	</main>