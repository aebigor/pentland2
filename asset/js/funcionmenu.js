let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 8;

loadMoreBtn.onclick = () => {
    let boxes = [...document.querySelectorAll('.box-container .box')];
    for(var i = currentItem; i < currentItem +4; i++) {
        boxes[i].style.display = 'inline-block';
    }
    currentItem += 4;
    if(currentItem >= boxes.length){
        loadMoreBtn,style.display = 'none';
    }
}

//carrito
const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1');
const lista = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

cargarEventListeners();

function cargarEventListeners() {
    elementos1.addEventListener('click', comprarElemento);
    carrito.addEventListener('click',eliminarElemento);
    vaciarCarritoBtn.addEventListener('click',vaciarCarrito);
}
function comprarElemento (e) {
    e.preventDefault();
    if(e.target.classList.contains('agregar-carrito')) {
        const elemento = e.target.parentElement.parentElement;
        leerDatosElemento(elemento);
    }

}
function leerDatosElemento(elemento) {
    const imagenElemento = elemento.querySelector('img');
    const imagenSrc = obtenerFuenteImagen(imagenElemento);

    const infoElemento = {
        imagen: imagenSrc,
        titulo: elemento.querySelector('h3').textContent,
        precio: elemento.querySelector('.precio').textContent,
        id: elemento.querySelector('a').getAttribute('data-id')
    };

    insertarCarrito(infoElemento);
}

function obtenerFuenteImagen(imagenElemento) {
    let imagenSrc = '';

    // Verifica si hay un atributo 'data-src', si no, toma 'src'
    if (imagenElemento.hasAttribute('data-src')) {
        imagenSrc = imagenElemento.getAttribute('data-src');
    } else {
        imagenSrc = imagenElemento.src;
    }

    // Verifica el formato de la imagen
    const formato = obtenerFormatoImagen(imagenSrc);

    // Si el formato no es compatible, proporciona una imagen predeterminada
    if (!esFormatoCompatible(formato)) {
        imagenSrc = 'img/prd1.jpg'; // Cambia 'img/prd1.jpg' por la ruta de la imagen predeterminada que desees utilizar
    }

    return imagenSrc;
}

function obtenerFormatoImagen(url) {
    // Extrae la extensión del archivo de la URL
    const extension = url.split('.').pop().toLowerCase();

    // Devuelve la extensión
    return extension;
}

function esFormatoCompatible(formato) {
    // Lista de formatos compatibles
    const formatosCompatibles = ['jpg', 'jpeg', 'png', 'avif', 'svg'];

    // Verifica si el formato está en la lista de formatos compatibles
    return formatosCompatibles.includes(formato);
}

function insertarCarrito(elemento) { 
    const row = document.createElement('tr');
    row.innerHTML= `
        <td>
            <img src="${elemento.imagen}" width="100" height="150" >
        </td>
        <td>
            ${elemento.titulo}
        </td>
        <td>
            ${elemento.precio}
        </td>
        <td>
            <a href="#" class="borrar" data-id="${elemento.id}" >X</a>
        </td>
    `;
    lista.appendChild(row);
}


function eliminarElemento(e) {
    e.preventDefault();
    let elemento,
        elementoId;

    if(e.target.classList.contains('borrar')) {
        e.target.parentElement.parentElement.remove();
        elemento = e.target.parentElement.parentElement;
        elementoId = elemento.querySelector('a').getAttribute('data-id');
    }
}

function vaciarCarrito() {
    while(lista.firstChild){
        lista.removeChild(lista.firstChild);
    }
    return false;
}