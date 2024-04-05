
<!-- products.php -->
<main class="products container">
    <h2>Productos</h2>
    <div id="productos-container">
        <div class="row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="img/<?php echo $producto['imagen']; ?>" alt="Imagen del producto">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $producto['nombreP']; ?></h3>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted"><?php echo $producto['precio']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Realizar solicitud AJAX para obtener productos
            $.ajax({
                url: 'models/users/producto.php', // Archivo PHP que obtiene los productos
                type: 'GET',
                success: function(data) {
                    // Manipular los datos recibidos para mostrar los productos en la interfaz
                    var productos = JSON.parse(data);
                    var productosContainer = $('#productos-container .row');
                    productosContainer.empty(); // Limpiar el contenedor
                    productos.forEach(function(producto) {
                        var cardHtml = `
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="${producto.imagen}" alt="Imagen del producto">
                                    <div class="card-body">
                                        <h3 class="card-title">${producto.nombreP}</h3>
                                        <p class="card-text">${producto.descripcion}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">${producto.precio}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        productosContainer.append(cardHtml);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener productos:', error);
                }
            });
        });
    </script>

    <div class="btn-2" id="load-more">Cargar más</div>
</main>
