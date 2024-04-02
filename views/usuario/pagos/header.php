<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Pago Simulado</title>
    <link rel="stylesheet" href="../../../asset/css/pagos.css" type="text/css">
</head>
<body>
    <h1>Simulador de Pagos</h1>
    <form id="formulario-pago">
        <label for="producto">Producto:</label>
        <select id="producto" name="producto">
            <option value="producto1">Producto 1 ($10)</option>
            <option value="producto2">Producto 2 ($20)</option>
            <option value="producto3">Producto 3 ($30)</option>
        </select>
        <label for="numero-celular">Número de Celular:</label>
        <input type="text" id="numero-celular" name="numero-celular" required>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="1" min="1" required>
        <button type="submit">Pagar</button>
    </form>
    <div id="resultado"></div>





<script>// controlador.js

document.getElementById("formulario-pago").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario

    const productoSeleccionado = document.getElementById("producto").value;
    const numeroCelular = document.getElementById("numero-celular").value;
    const cantidad = parseInt(document.getElementById("cantidad").value);

    // Calcular el monto total en función del producto seleccionado y la cantidad
    let montoTotal = 0;
    switch(productoSeleccionado) {
        case "producto1":
            montoTotal = 10 * cantidad;
            break;
        case "producto2":
            montoTotal = 20 * cantidad;
            break;
        case "producto3":
            montoTotal = 30 * cantidad;
            break;
        default:
            montoTotal = 0;
    }

    // Lógica para realizar el pago
    realizarPago(numeroCelular, montoTotal);
});

function realizarPago(numeroCelular, monto) {
    // Simulación de pago, aquí iría la lógica de tu aplicación para procesar el pago
    const resultado = `Se ha realizado un pago de ${monto} a ${numeroCelular}.`;

    // Llamada a la función de actualización de la vista
    actualizarVista(resultado);
    mostrarMensajeCompraExitosa(); // Mostrar mensaje de compra exitosa
}

function actualizarVista(resultado) {
    // Actualiza la vista con el resultado del pago
    document.getElementById("resultado").innerText = resultado;
}

function mostrarMensajeCompraExitosa() {
    // Muestra un mensaje de compra exitosa
    const mensaje = "¡Compra realizada con éxito!";
    alert(mensaje); // Puedes cambiar esto por un mensaje en la página si lo prefieres
}

</script>

</body>
</html>
