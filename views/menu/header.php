<!DOCTYPE html>
<html>
<head>
<title>menu-p</title>
<meta charset="UTF-8">
<link rel ="stylesheet" href="asset/css/registro.css" type="text/css">
<style>
</style>
</head>
<body>

    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">logo </a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img  src="imagenes/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav  class="navbar">
                <ul>
                    <li><a href="#">inicio</a></li>
                    <li><a href="#">servicios</a></li>
                    <li><a href="#">productos</a></li>
                    <li><a href="#">contacto</a></li>
                    <li><a href="?c=Inicio&a=validar" >inicio secion</a></li>
                    <li><a href="?c=Roles&a=createRol" >registrar</a></li>
                    
                </ul>
                <div class="botons">

                    

                    

                </div>
            </nav>
            
            <div>
                <ul>
                    <li class="submenu">
                        <img id="img-carrito" src="img/car.svg" alt="car">
                        <div id="carrito">
                            <table id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>imagen</th>
                                        <th>nombre</th>
                                        <th>precio</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="#" id="vaciar-carrito" class="btn-3">vaciar carrito</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header-content container">
            <div class="header-txt">
                <span> bienvenido a nuestra tienda</span>
                <h1>ofertas especiales</h1>
                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nisi libero, impedit tempora doloremque fuga quam porro aspernatur quasi perferendis consequuntur sunt, maxime rem laborum eligendi sint culpa adipisci repellendus?</p>
                <div class="botons">
                    <a href="#" class="btn-1">informacion</a>
                    <a href="#" class="btn-1">leer mas</a>
                </div>
            </div>
            <div id="drag-container">
                <div id="spin-container">
                    <!--img del carrusel -->
                    <img src="img/prd1.jpeg" alt="">
                    <img src="img/prd2.jpeg" alt="">
                    <img src="img/prd3.jpeg" alt="">
                    <img src="img/prd4.jpeg" alt="">
                    <img src="img/prd5.jpeg" alt="">
                    <img src="img/prd6.jpeg" alt="">
                    <p> ofertas especiales</p>
                </div>
                <div id="ground"></div>
            </div>
        </div>
    </header>