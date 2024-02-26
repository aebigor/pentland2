
<body>
    <div class="form-register">
        <form method="POST" action="">
            <fieldset>
                <h4 style="padding: 0px;">Inicio de Sesión</h4>
                <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
                <p style="color: red;">Nombre de usuario o contraseña incorrectos.</p>
                <?php endif; ?>
                
                <input class="controls" type="text" name="correo" id="correo" placeholder="Ingrese su correo" required>
                <input class="controls" type="password" name="passCorreo" id="passCorreo" placeholder="Ingrese su contraseña" required>
                <p>Estoy de acuerdo con <a href="#">Términos y Condiciones</a></p>
                <button class="botons" type="submit">Iniciar Sesión</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
