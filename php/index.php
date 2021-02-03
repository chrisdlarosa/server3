<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
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
     <?php include 'navbar1.php'?>


     <?php
     $con = $_SESSION["idusuario"];
     include '../scripts/database.php';
     $conexion = new Database();
     $conexion->conectarBD();
     $consulta="SELECT t.folio, c.nombre as cliente, u.nombre as usuario, s.nombre as servicio, t.nota, t.estado, t.registrado, t.fecha FROM tareas as t INNER JOIN clientes as c ON c.id = t.cliente INNER JOIN usuarios as u ON t.usuario = u.id INNER JOIN servicios as s ON t.servicio = s.cve WHERE t.asignado = $con AND t.estado = 1";
     $tarpe = $conexion->seleccionar($consulta);
     ?>

  
<!-- ***************Inicio del sitio****************************** -->
    <div class="container fondo" id="cat">
        <div class="row">
            <div class="col-md-10 col-12"><h3>Pendientes</h3></div>
            <div class="col-md-2 col-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="list-group">
                <?php foreach($tarpe as $tar): ?>
                  <a href="tarea.php?tarea=<?php echo $tar->folio; ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?php echo $tar->servicio; ?></h5>
                      <small><?php echo $tar->registrado; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $tar->nota; ?></p>
                    <small><?php echo $tar->usuario; ?></small>
                  </a>
                 <?php endforeach; ?> 
                </div>
            </div>
        </div>  
    </div>
<?php $conexion->desconectarBD(); ?>
<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>