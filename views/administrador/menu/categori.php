<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor">
    <div class="formulario-contenedor">
    <form  method="POST"  enctype="multipart/form-data">
        <fieldset id="uploadProductForm" enctype="multipart/form-data">
            <h4 style="padding: 0px;">Registro de producto</h4>
            Nombre del producto: <input type="text" name="nombreP" id="descriptionInput"><br>
            Descripción: <input type="text" name="descripcion" id="descriptionInput"><br>
            Precio: <input type="number" name="precio" id="priceInput" step="0.01"><br>
            Cantidad: <input type="number" name="cantidad" id="quantityInput"><br>
            Categoría: 
            <select name="categoria" id="categoryInput">
                <option value="">Seleccione una categoría</option>
                <option value="Alimentos">Alimentos</option>
                <option value="Snacks">Snacks</option>
                <option value="Farmapet">Farmapet</option>
                <option value="juguetes">juguetes</option>
                <option value="accesorios">accesorios</option>
                <!-- Agrega más categorías aquí según necesites -->
            </select>

            <br>
            Imagen: <input type="file" name="imagen" id="imageInput" accept="image/*" required><br>
            <button type="submit">Subir Producto</button>
           
        </fieldset>
    </form>
</div>

    <div class="image-preview" id="imagePreview"></div>

    </div>

<script>
document.getElementById('imageInput').addEventListener('change', function(event) {
    const [file] = event.target.files;
    const previewContainer = document.getElementById('imagePreview');
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Vista previa de la imagen">`;
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.innerHTML = '';
    }
});
</script>

</body>
</html>
