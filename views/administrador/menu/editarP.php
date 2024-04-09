
<style>/* CSS para el formulario de edición de productos */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'calibri', sans-serif; /* Aseguramos que se utilice la fuente calibri o una fuente sans-serif por defecto */
}

.container {
    width: 400px;
    background: #243032;
    padding: 30px;
    margin: auto;
    margin-top: 100px;
    border-radius: 4px;
    color: white;
    box-shadow: 7px 13px 37px #0bcbec;
}

.container h2 {
    font-size: 22px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 16px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
input[type="number"],
select,
textarea {
    width: 100%;
    background: #f8f8f8;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #0bcbec;
    font-size: 18px;
}

textarea {
    resize: vertical;
}

input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 18px;
}

.btn-primary {
    display: inline-block;
    width: 100%;
    margin-top: 20px;
    background: #0bcbec;
    border: none;
    padding: 16px;
    color: white;
    font-size: 18px;
    text-decoration: none;
    text-align: center;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: rgb(10, 48, 173);
}

.text-danger {
    color: #ff0000;
}

/* Vista previa de la imagen */
#imagenPreview {
    max-width: 100%;
    margin-top: 10px;
    display: none;
}

</style>

<?php if (isset($Producto)) : ?>
    <div class="container">
        <h2 class="text-center">Editar Producto</h2>
        <form action="?c=User&a=updateProducto" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idProducto" value="<?php echo $Producto->getId(); ?>">
            
            <div class="form-group">
                <label for="nombreProducto">Nombre:</label>
                <input type="text" class="form-control" name="nombreProducto" id="nombreProducto" value="<?php echo $Producto->getnombreP(); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" required><?php echo $Producto->getdescripcion(); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $Producto->getprecio(); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" value="<?php echo $Producto->getcantidad(); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select class="form-control" name="categoria" id="categoria" required>
                    <option value="alimento" <?php echo ($Producto->getcategoria() == "alimento") ? "selected" : ""; ?>>Alimento</option>
                    <option value="snack" <?php echo ($Producto->getcategoria() == "snack") ? "selected" : ""; ?>>Snack</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>
            
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" class="form-control-file" name="imagen" id="imagen">
                <!-- Script para previsualizar la imagen -->
                  <!-- Script para mostrar la vista previa de la imagen -->
                  <script>
    function mostrarVistaPrevia(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imagenPreview').attr('src', e.target.result);
                $('#imagenPreview').show(); // Mostrar la imagen
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Asociar la función de vista previa al cambio en el input de imagen
    $("#imagen").change(function(){
        mostrarVistaPrevia(this);
    });
</script>

    <script>
        document.getElementById('imagen').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagenPreview').src = e.target.result;
                    document.getElementById('imagenPreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagenPreview').style.display = 'none';
            }
        });
    </script>
            </div>

            <!-- Vista previa de la imagen -->
            <div class="form-group">
                <img id="imagenPreview" src="img/<?php echo $Producto->getImagen(); ?>" alt="Vista Previa" style="max-width: 200px; max-height: 200px;">
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
<?php else : ?>
    <p class="text-danger">Producto no encontrado</p>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>