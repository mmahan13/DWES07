<?php
    require_once('include/DB.php');
    require_once('include/CestaCompra.php');

    // Recuperamos la información de la sesión
    session_start();

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) 
        die("Error - debe <a href='login.php'>identificarse</a>.<br />");

    // Recuperamos la cesta de la compra
    $cesta = CestaCompra::carga_cesta();


    // Comprobamos si se quiere añadir un producto a la cesta
    if (isset($_POST['cod'])) {
    $cesta->nuevo_articulo($_POST['cod']);
    $cesta->guarda_cesta();  
    return $cesta->muestra();
    }

    if (isset($_POST['vaciar'])) {
        unset($_SESSION['cesta']);
        $cesta = new CestaCompra();
        return $cesta->muestra();
    }

?>