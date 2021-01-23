
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
          <a class="navbar-brand" href="index.php"><i class="fas fa-cubes"><b class="logo">Cube</b></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-home menus"></i> Inicio<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-shopping-cart menus"></i> Ventas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="ventastotales.php">Registros</a>
                  <a class="dropdown-item" href="misVentas.php">Mis Ventas</a>
                  <a class="dropdown-item" href="ventaa.php">Nueva Venta</a>
                  <a class="dropdown-item" href="verClientes.php">Ver Clientes</a>
                  <a class="dropdown-item" href="nuevocliente.php">Agregar Cliente</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-box-open"></i> Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="productos.php">Ver Productos</a>
                  <a class="dropdown-item" href="nuevoProducto.php">Agregar Poductos</a>
                  <a class="dropdown-item" href="categorias.php">Categorías</a>
                  <a class="dropdown-item" href="productosxcategoria.php">Productos por Categoría</a>
                  <a class="dropdown-item" href="productoxfolio.php">Productos por Folio</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-tie"></i> Usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="verUsuarios.php">Ver Usuarios</a>
                  <a class="dropdown-item" href="nuevoVendedeor.php">Agregar Usuario</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-coins"></i> Nómina
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="versalarios.php">Ver Salario</a>
                  <a class="dropdown-item" href="nominageneral.php">Generar Nómina</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-truck-loading"></i> Rutas y Fletes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="verFletes.php">Ver Fletes</a>
                  <a class="dropdown-item" href="nuevoFlete.php">Agregar Flete</a>
                  <a class="dropdown-item" href="verRutas.php">Ver Rutas</a>
                  <a class="dropdown-item" href="nuevaRuta.php">Agregar Ruta</a>
                </div>
              </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        	<i class="fas fa-envelope-open"></i>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="../scripts/close.php">Cerrar Sesión</a></a>
		        </div>
		      </li>
        </ul>
       </div>
     </div>
    </nav>
</body>
</html>