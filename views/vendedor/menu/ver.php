<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href=""><i class=""></i> &nbsp; NUEVO PRODUCTO</a>
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
								<th>Nombre Rol</th>								
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($roles as $user) : ?>
							<tr class="text-center" >
								<td><?php echo $rol->getRolCode(); ?></td>
								<th><?php echo $rol->getRolName(); ?></th>								
								<td>
									<a href="?c=Roles&a=updateRol&idRol=<?php echo $rol->getRolCode();?>" class="btn btn-sucese">
	  									<i class="fas fa-sync-alt"></i>	
									</a>
								</td>
								<td>
									<a href="?c=Roles&a=deleteRol&idRol=<?php echo $rol->getRolCode(); ?>" name="idRol">
									<button type="submit" class="btn btn-warning">
        							<i class="far fa-trash-alt"></i>
    							</button>
									</a>
								</td>
								
							
							</tr>
						<?php endforeach; ?>							
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