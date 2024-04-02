document.addEventListener('DOMContentLoaded', function() {
    // Escuchar el clic en el botón "Procesar Pago" y llamar a la función correspondiente
    document.getElementById('procesar-pago').addEventListener('click', procesarPago);

    // Escuchar el clic en el botón "Vaciar Carrito" y llamar a la función correspondiente
    document.getElementById('vaciar-carrito').addEventListener('click', vaciarCarrito);

    // Mostrar los productos en el carrito y calcular la suma total al cargar la página
    mostrarProductosEnCarrito();
    calcularSumaTotal();
});

function procesarPago() {
    // Mostrar el formulario de pago simulado
    mostrarFormularioPago();

    // Calcular la suma total del carrito
    calcularSumaTotal();
}

function mostrarFormularioPago() {
    // Aquí puedes mostrar un div oculto que contenga el formulario de pago simulado
    // Por ejemplo:
    document.getElementById('formulario-pago').style.display = 'block';
}

function calcularSumaTotal() {
    // Recuperar los productos del carrito
    const productos = obtenerProductosDelCarrito();

    // Calcular la suma total
    let total = 0;
    productos.forEach(producto => {
        total += producto.precio * producto.cantidad;
    });

    // Mostrar la suma total en el elemento correspondiente
    document.getElementById('total').textContent = total.toFixed(2);
}

function obtenerProductosDelCarrito() {
    // Aquí deberías obtener los productos del carrito desde algún lugar (p.ej. localStorage)
    // En este ejemplo, supondré que los productos están almacenados en localStorage bajo la clave "carrito"
    return JSON.parse(localStorage.getItem('carrito')) || [];
}

function mostrarProductosEnCarrito() {
    // Obtener el elemento donde se mostrarán los productos en el carrito
    const listaCarrito = document.getElementById('lista-carrito');
    listaCarrito.innerHTML = ''; // Limpiar el contenido previo

    // Obtener los productos del carrito
    const productos = obtenerProductosDelCarrito();

    // Mostrar cada producto en el carrito
    productos.forEach(producto => {
        const filaProducto = document.createElement('tr');
        filaProducto.innerHTML = `
            <td><img src="${producto.imagen}" alt="Imagen del producto"></td>
            <td>${producto.nombre}</td>
            <td>$${producto.precio.toFixed(2)}</td>
        `;
        listaCarrito.appendChild(filaProducto);
    });
}

function vaciarCarrito() {
    // Limpiar los productos del carrito (puedes eliminarlos de localStorage u otro método)
    localStorage.removeItem('carrito');

    // Mostrar el carrito vacío
    const listaCarrito = document.getElementById('lista-carrito');
    listaCarrito.innerHTML = '';

    // Calcular y mostrar la suma total nuevamente
    calcularSumaTotal();
}
