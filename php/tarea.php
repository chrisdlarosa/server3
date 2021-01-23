<?php
if (empty($_GET['id'])){
  header("refresh:0; verUsuarios.php");
}
$tarea = $_GET['id'];
include '../scripts/database.php';
$conexion=new Database();
$conexion->conectarBD();
$cadena = "SELECT*FROM clientes WHERE id = '$cliente'";
$infocli = $conexion->seleccionar2($cadena);

if ($infocli==0){
  header("refresh:0; clientes.php"); 
}

$id = $infocli['id'];
$folio = $infocli['folio'];
$nombre = $infocli['nombre'];
$razonsocial = $infocli['razonsocial'];
$rfc = $infocli['rfc'];
$registrado = $infocli['registrado'];

$cadena2 = "SELECT cc.id, concat(cc.nombre,' ',cc.apellidos) as nombrec, cc.telefono, cc.correo, cc.registrado, cc.cliente FROM contactos AS cc INNER JOIN clientes as c ON c.id = cc.cliente WHERE cc.cliente=$id ORDER BY cc.cliente DESC";
$contactos = $conexion->seleccionar($cadena2);

$cadena3 = "SELECT dir.calle, dir.numero, dir.colonia, dir.cliente FROM direcciones as dir INNER JOIN clientes as c ON c.id = dir.cliente WHERE dir.cliente=$id ORDER BY dir.cliente";
$direcciones = $conexion->seleccionar($cadena3);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $nombre; ?></title>
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
		form {margin-bottom: 50px; margin-top: -20px}
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
  <div class="container fondo">
    <form action="../php/upcliente.php" method="get" class="form col-md-6 col-11">
      <h2><?php echo $nombre; ?> </h2>
      <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" maxlength="33" value="<?php echo $id; ?>" required>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="folio" aria-describedby="emailHelp" placeholder="Folio" maxlength="11" value="<?php echo $folio; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="razonsocial" aria-describedby="emailHelp" placeholder="Razon Social" maxlength="33" value="<?php echo $razonsocial; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="rfc" aria-describedby="emailHelp" placeholder="RFC" maxlength="55" value="<?php echo $rfc; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="" name="date" aria-describedby="emailHelp" placeholder="Fecha de registro" maxlength="44" value="<?php echo $registrado; ?>" required disabled>
      </div>
        <button type="submit" class="btn btn-lg btn-warning" style="width: 100%; margin-top: 10px;">Modificar datos de cliente</button>
    </form>
  </div>

  <!-- **************************** CONTACTO  ****************************** -->
  <div class="container fondo">
    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-10 col-12"><h3>Contactos</h3></div>
      <div class="col-md-2 col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acontacto" data-whatever="@fat" style="width: 100%">Agregar contacto</button>
      </div>
    </div>
    <table class="table table-striped table-responsive-sm">
      <thead class="bg-info">
        <th scope="col">Nombre</th>
        <th scope="col">telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">cliente</th>
      </thead>
      <tbody>
        <?php foreach($contactos as $contacto): ?>
          <tr>
            <td> <?php echo $contacto->nombrec; ?> </td>
            <td> <?php echo $contacto->telefono; ?> </td>
            <td> <?php echo $contacto->correo; ?> </td>
            <td> <?php echo $contacto->cliente; ?> </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- **************************** Direcciones  ****************************** -->
  <div class="container fondo">
    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-10 col-12"><h3>Direcciones</h3></div>
      <div class="col-md-2 col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adireccion" data-whatever="@fat" style="width: 100%">Agregar direccion</button>
      </div>
    </div>
    <table class="table table-striped table-responsive-sm">
      <thead class="bg-info">
        <th scope="col">Calle</th>
        <th scope="col">No</th>
        <th scope="col">Colonia</th>
        <th scope="col">cliente</th>
      </thead>
      <tbody>
        <?php foreach($direcciones as $direccion): ?>
          <tr>
            <td> <?php echo $direccion->calle; ?> </td>
            <td> <?php echo $direccion->numero; ?> </td>
            <td> <?php echo $direccion->colonia; ?> </td>
            <td> <?php echo $direccion->cliente; ?> </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>





<!-- **************************MODAL de DIRECCIONES************************** -->

  <div class="modal fade" id="adireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar direccion nueva a<?php echo $nombre; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../scripts/agregandodireccion.php" method="post" id="direccion">
            <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" value="<?php echo $id; ?>" required>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="calle" aria-describedby="emailHelp" placeholder="Calle" maxlength="44" value="" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="numero" aria-describedby="emailHelp" placeholder="Numero" maxlength="8" value="" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="colonia" aria-describedby="emailHelp" placeholder="Colonia" maxlength="44" value="" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="direccion">Registrar</button>
        </div>
      </div>
    </div>
  </div>



<!-- **************************MODAL de Contactos************************** -->

  <div class="modal fade" id="acontacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar contacto nuevo a<?php echo $nombre; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../scripts/agregandocontacto.php" method="post" id="contacto">
            <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" value="<?php echo $id; ?>" required>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del contacto" maxlength="33" value="" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="apellidop" aria-describedby="emailHelp" placeholder="Apellido paterno" maxlength="22" value="" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="apellidom" aria-describedby="emailHelp" placeholder="Apellido materno" maxlength="22" value="" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="telefono" aria-describedby="emailHelp" placeholder="Telefono" maxlength="11" value="" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="" name="correo" aria-describedby="emailHelp" placeholder="Correo Electronico" maxlength="44" value="" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="contacto">Registrar</button>
        </div>
      </div>
    </div>
  </div>


<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>