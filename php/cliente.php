<?php

if (empty($_GET['folio'])){
  header("refresh:0; usuarios.php");
}
$id = $_GET['id'];
include '../scripts/database.php';
$ventas=new Database();
$ventas->conectarBD();
$cadena = "SELECT v.folio ,concat(u.nombre,' ',u.apellidos) AS vendedor, concat(c.nombre,' ',c.apellidos) AS cliente, v.forma_pago, v.f_reg  FROM usuarios AS u INNER JOIN ventas AS v ON v.vendedor = u.id INNER JOIN clientes AS c ON c.id = v.cliente WHERE v.folio=$folio ORDER BY v.folio DESC";
$venta = $ventas->seleccionar2($cadena);

if ($venta==0){
  header("refresh:0; ventastotales.php");
}
$folio = $venta['folio'];
$vendedor = $venta['vendedor'];
$cliente = $venta['cliente'];
$pago = $venta['forma_pago'];
$fecha = $venta['f_reg'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/svg+xml" href="../favicon/moon-solid.svg" sizes="any">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/maina.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/categorias.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<style>
		form {margin-bottom: 50px; margin-top: -60px}
	</style>
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
      <a class="navbar-brand" href="#"><i class="fas fa-moon logo" id="moon"><b class="logo">Desarrollo</b></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../maina.view.php"><i class="fas fa-home menus"></i> Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-shopping-cart menus"></i> Ventas
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Registros</a>
              <a class="dropdown-item" href="ventaa.php">Nueva Venta</a>
              <a class="dropdown-item" href="#">Consultas</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-address-card"></i> Clientes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Ver Clientes</a>
              <a class="dropdown-item" href="#">Agregar Cliente</a>
              <a class="dropdown-item" href="#">Consultas</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-box-open"></i> Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="productos.php">Ver Productos</a>
              <a class="dropdown-item" href="nuevoProducto.php">Agregar Poductos</a>
              <a class="dropdown-item" href="categorias.php">Categorias</a>
              <a class="dropdown-item" href="productosxcategoria.php">Productos por Categoria</a>
              <a class="dropdown-item" href="#">Consultas</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-tie"></i> Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="verUsuarios.php">Ver Usuarios</a>
              <a class="dropdown-item" href="nuevoVendedeor.php">Agregar Usuarior</a>
              <a class="dropdown-item" href="#">Consultas</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../scripts/close.php">Cerrar Sesion</a></a>
            </div>
          </li>
        </ul>
      </div>
      </div>
  </nav>
  
<!-- ***************Inicio del sitio****************************** -->
    <?php 
    include '../scripts/database.php';
    $conexion = new Database();
    $conexion->conectarBD();
    $consulta="SELECT*FROM clientes";
    $clientes = $conexion->seleccionar($consulta);
     ?>
  <div class="container" id="cat">
    <h2>Usuarios</h2>
    <table class="table table-hover table-responsive-sm">
      <thead class="bg-primary">
        <th scope="col">Folio</th>
        <th scope="col">Nombre del cliente</th>
        <th scope="col">Razon Social</th>
        <th scope="col"></th>
      </thead>
      <tbody>
        <?php foreach($clientes as $cliente): ?>
          <tr>
            <th> <?php echo $cliente->folio; ?> </th>
            <td> <?php echo $cliente->nombre; ?> </td>
            <td> <?php echo $cliente->razonsocial; ?> </td>
            <td style="display: inline-flex;">
              <a href="upusuario.php?id=<?php echo $cliente->id; ?>" class="btn btn-info" role="button" aria-pressed="true" style="margin-right: 3px;" ><i class="fas fa-pen"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php $conexion->desconectarBD(); ?>
  </div>

<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>