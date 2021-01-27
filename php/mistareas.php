<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tareas</title>
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
		form {margin-bottom: 50px}
	</style>
</head>
<body>
     <?php include 'navbar1.php'?>
  
<!-- ***************Inicio del sitio******************* -->

  <!-- CONEXION CON LA BASE DE DATOS PARA TRAER LA INFORMACION DE LOS SERVICIOS -->
    <?php
      $con = $_SESSION["idusuario"];
      include '../scripts/database.php';
      $conexion = new Database();
      $conexion->conectarBD();
      $consulta="SELECT t.folio, c.nombre as cliente, u.nombre as usuario, s.nombre as servicio, t.nota, t.estado, t.registrado, t.fecha FROM tareas as t INNER JOIN clientes as c ON c.id = t.cliente INNER JOIN usuarios as u ON t.usuario = u.id INNER JOIN servicios as s ON t.servicio = s.cve WHERE t.asignado = $con";
      $tareas = $conexion->seleccionar($consulta);
      $card = 0;
     ?>
<!-- ***************Inicio del sitio******************* -->
	<div class="container fondo" id="cat">
    <h2>Mis tareas</h2>
    <table class="table table-hover table-responsive-sm">
      <thead class="bg-primary">
        <th scope="col">Folio</th>
        <th scope="col">Nombre del cliente</th>
        <th scope="col">Servicio</th>
        <th scope="col">Fecha Reg</th>
        <th scope="col">Fecha Est</th>
        <th scope="col">Estado</th>
        <th scope="col">Opciones</th>
      </thead>
      <tbody>
        <?php foreach($tareas as $tarea): ?>
          <tr>
            <th> <?php echo $tarea->folio; ?> </th>
            <td> <?php echo $tarea->cliente; ?> </td>
            <td> <?php echo $tarea->servicio; ?> </td>
            <td> <?php echo $tarea->registrado; ?> </td>
            <td> <?php echo $tarea->fecha; ?> </td>
            <?php switch ($tarea->estado) {
              case 1:
                $color = 'warning';
                $texto = 'Pendiente';
                break;
              case 2:
                $color = 'danger';
                $texto = 'Urgente';
                break;
              case 3:
                $color = 'success';
                $texto = 'Revisado';
                break;
            } ?>
            <td> <span class="badge badge-<?php echo $color;?>"><?php echo $texto;?></span> </td>
            <td style="display: inline-flex;">
              <a href="tarea.php?tarea=<?php echo $tarea->folio; ?>" class="btn btn-info" role="button" aria-pressed="true" style="margin-right: 3px;" ><i class="fas fa-eye"></i></i></a>
            </td>
            <td style="display: inline-flex;">
              <a href="tarea.php?tarea=<?php echo $tarea->folio; ?>" class="btn btn-success" role="button" aria-pressed="true" style="margin-right: 3px;"><i class="far fa-check-circle"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php $conexion->desconectarBD(); ?>
  </div>


  <footer class="foot" style="background-color: #000; color: #fff; height: 30px; margin-bottom: 0px">
    <div class="container">
      <div class="row">
        <div class="col-md-12 center">
          <h5 style="text-align: center">Christian de la Rosa Cuevas < / ></h5>
        </div>
      </div>
    </div>
  </footer>
<!-- ***************Termino contenido del sitio******************** -->
   <!-- Enlazes a Jquery -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>