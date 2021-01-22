<?php
if (empty($_GET['id'])){
  header("refresh:0; verUsuarios.php");
}
$id = $_GET['id'];
include '../scripts/database.php';
$cliente=new Database();
$cliente->conectarBD();
$cadena = "SELECT*FROM clientes WHERE id = '$id'";
$cli = $cliente->seleccionar2($cadena);

if ($cli==0){
  header("refresh:0; verUsuarios.php"); 
}
$id = $cli['id'];
$folio = $cli['folio'];
$nombre = $cli['nombre'];
$razonsocial = $cli['razonsocial'];
$rfc = $cli['rfc'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizando</title>
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
		form {margin-bottom: 50px; margin-top: -30px}
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
    <div class="container">
    <form action="../scripts/actualizandocliente.php" method="post" class="form col-md-6 col-11">
      <h2>Modificar cliente #<?php echo $folio; ?> </h2>
      <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" maxlength="33" value="<?php echo $id; ?>" required>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="folio" aria-describedby="emailHelp" placeholder="Folio" maxlength="11" value="<?php echo $folio; ?>" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del cliente" maxlength="111" value="<?php echo $nombre; ?>" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="razonsocial" aria-describedby="emailHelp" placeholder="Razon Social" maxlength="155" value="<?php echo $razonsocial; ?>" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="rfc" aria-describedby="emailHelp" placeholder="RFC" maxlength="44" value="<?php echo $rfc; ?>" required>
      </div>
        <a href="cliente.php?id=<?php echo $id; ?>" class="btn btn-lg btn-danger" role="button" aria-pressed="true" style="width: 44%; margin-top: 10px;">Cancelar</a>
        <button type="submit" class="btn btn-lg btn-warning" style="width: 54%; margin-top: 10px;">Actualizar cliente</button>
    </form>
  </div>


<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>