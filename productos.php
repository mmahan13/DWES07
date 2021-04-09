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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="fcesta.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body class="pagproductos">
<div id="contenedor">
  <div id="encabezado">
    <h1>Listado de productos</h1>
  </div>
  <div id="cesta">
  <h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
   <hr/>
  <div id="prueba"></div>
    <button type='button' name='vaciar' onclick="vaciarCesta()">Vaciar Cesta</button>
    <form id='comprar' action='cesta.php' method='post'>
      <input type='submit' name='comprar' value='Comprar'/>
    </form>
  </div>
  <div id="productos">
    <?php 
        $productos = DB::obtieneProductos();
        foreach ($productos as $i => $p) {
            echo "<p>";
            echo "<button onclick='addProduct(".$i.")'>Añadir</button>";
            echo " <spam id='codigo_".$i."'>".$p->getcodigo()."</spam> ";
            echo $p->getnombrecorto() . ": ";
            echo $p->getPVP() . " euros.";
            echo "</p>";
       }      
    ?>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>'/>
    </form>        
  </div>
</div>
</body>
</html>


