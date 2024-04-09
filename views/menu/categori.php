<main class="products container">
    <h2>Productos</h2>
    <div id="productos-container">
        <div class="product-row row">
            <?php foreach ($productos as $producto): ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="img/<?php echo $producto['imagen']; ?>" alt="Imagen del producto">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $producto['nombreP']; ?></h3>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted"><?php echo $producto['precio']; ?></span>
                                <button class="agregar-carrito" data-id="<?php echo $producto['id']; ?>">Agregar al carrito</button>   

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="btn-2" id="load-more">Cargar más</div>
</main>

