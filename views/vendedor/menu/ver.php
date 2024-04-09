<style>
  /* Regla de tamaño para las imágenes */
  .product-image {
    max-width: 60px; /* Reducimos el ancho máximo */
    height: auto; /* Ajustamos la altura automáticamente */
  }
</style>

<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
    <li>
      <a href="?c=Roles&a=createProductA"><i class=""></i> &nbsp; NUEVO PRODUCTO</a>
    </li>
    <li>
      <a class="?c=Roles&a=verProductA" href=""><i class=""></i> &nbsp; LISTA DE PRODUCTOS</a>
    </li>
    <li>
      <a href=""><i class=""></i> &nbsp; BUSCAR PRODUCTO</a>
    </li>
  </ul>
</div>

<div class="container-fluid">
  <div class="table-responsive">
    <table class="table table-sm text-center">
      <thead class="bg-info text-white"> <!-- Cambiamos el color de fondo a celeste -->
        <tr class="roboto-medium">
          <th>Código</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Categoría</th>
          <th>Imagen</th>
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
					<td><?php echo $users->getnombreP(); ?></td>
					<td><?php echo $users->getdescripcion(); ?></td>
					<td><?php echo $users->getprecio(); ?></td>
					<td><?php echo $users->getcantidad(); ?></td>
					<td><?php echo $users->getcategoria(); ?></td>
					<td><img src="img/<?php echo $users->getImagen(); ?>" alt="Imagen de producto" class="product-image"></td>
					<td>
                    <a href="?c=User&a=editProducto&idProducto=<?php echo $users->getId(); ?>" class="btn btn-success">
              <i class="fas fa-sync-alt"></i> Actualizar
          </a>

</td>
<td>
    <form method="post" action="?c=User&a=deleteProducto&idRol=">
        <input type="hidden" name="id" value="<?php echo $users->getId(); ?>">
        <button type="submit" class="btn btn-danger">Eliminar Producto</button>
    </form>
</td>

				</tr>
			<?php endforeach; 
		} else {
			echo '<tr><td colspan="9">No hay productos disponibles.</td></tr>';
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
