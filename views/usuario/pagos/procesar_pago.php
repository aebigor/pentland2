<form id="formulario-pago">
    <!-- Agregar campos ocultos para los datos del carrito -->
    <input type="hidden" id="producto-carrito" name="producto-carrito" value="">
    <input type="hidden" id="precio-carrito" name="precio-carrito" value="">
    <input type="hidden" id="cantidad-carrito" name="cantidad-carrito" value="">

    <label for="numero-celular">Número de Celular:</label>
    <input type="text" id="numero-celular" name="numero-celular" required>
    <button type="submit">Pagar</button>
</form>
<script>$(document).ready(function(){
    $("#procesar-pago").click(function(){
        var detallesPedido = [];
        $("#lista-carrito tbody tr").each(function(){
            var producto = {
                nombre: $(this).find("td:nth-child(2)").text(),
                precio: parseFloat($(this).find("td:nth-child(3)").text().replace('$', '')), // Eliminar el símbolo de dólar y convertir a número
                cantidad: parseInt($(this).find("td:nth-child(4)").text())
            };
            detallesPedido.push(producto);
        });

        // Actualizar los campos ocultos del formulario de pago con los datos del carrito
        actualizarCamposPago(detallesPedido);
    });
});

function actualizarCamposPago(detallesPedido) {
    // Convertir los datos del carrito a un formato que pueda ser enviado como parámetro
    var productos = [];
    var precios = [];
    var cantidades = [];

    detallesPedido.forEach(function(producto) {
        productos.push(producto.nombre);
        precios.push(producto.precio);
        cantidades.push(producto.cantidad);
    });

    // Actualizar los valores de los campos ocultos del formulario de pago
    $("#producto-carrito").val(productos.join(","));
    $("#precio-carrito").val(precios.join(","));
    $("#cantidad-carrito").val(cantidades.join(","));
}
</script>

</body>
</html>
