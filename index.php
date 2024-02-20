<?php
require_once "models/users/db1.php";
require_once "models/users/db.php";
    if (!isset($_REQUEST['c'])) {
        require_once "controller/Menu.php";
        $controller = new menu;
        $controller->main();
    } else {
        $controller = $_REQUEST['c'];
        require_once "controller/" . $controller . ".php";
        $controller = new $controller;
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
        call_user_func(array($controller, $action));
    }
?>