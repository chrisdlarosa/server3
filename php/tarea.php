<?php
if (empty($_GET['tarea'])){
  header("refresh:0; tareas.php");
}
$tarea = $_GET['tarea'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tarea | <?php echo $tarea; ?></title>
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
     <?php include 'navbar1.php'?>

     <?php 
     $con = $_SESSION["idusuario"];
      include '../scripts/database.php';
      $conexion = new Database();
      $conexion->conectarBD();
      $consulta="SELECT t.folio, c.nombre as cliente, concat(u.nombre,' ',u.apellidos) as usuario, s.nombre as servicio, t.nota, t.estado, t.registrado, t.fecha FROM tareas as t INNER JOIN clientes as c ON c.id = t.cliente INNER JOIN usuarios as u ON t.asignado = u.id INNER JOIN servicios as s ON t.servicio = s.cve WHERE t.folio = $tarea";
      $tareainfo = $conexion->seleccionar2($consulta);

      $foliot = $tareainfo['folio'];
      $cliente = $tareainfo['cliente'];
      $asignador = $tareainfo['usuario'];
      $servicio = $tareainfo['servicio'];
      $nota = $tareainfo['nota'];
      $estado = $tareainfo['estado'];
      $registrado = $tareainfo['registrado'];
      $fecha = $tareainfo['fecha'];


      $consulta2="SELECT r.respuesta, r.registrado, concat(u.nombre,' ',u.apellidos) as user FROM respuestas as r INNER JOIN tareas as t ON r.tarea = t.folio INNER JOIN usuarios as u ON u.id = r.usuario WHERE t.folio = $tarea";
      $tarearespuestas = $conexion->seleccionar($consulta2);


     ?>
  
<!-- ***************Inicio del sitio****************************** -->
  <div class="container fondo">
    <div class="row" style="margin-bottom: 20px; margin-top: 50px">
      <div class="col-md-10 col-12"><h2>Tarea #<?php echo $foliot; ?> </h2></div>
      <div class="col-md-2 col-12">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Opciones
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#estado" data-whatever="@fat">Cambiar estado</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#respuesta" data-whatever="@fat">Responder</a>
            <a class="dropdown-item" href="#">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
    <form action="../php/upcliente.php" method="get" class="form col-md-6 col-11">
      <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" maxlength="33" value="<?php echo $foliot; ?>" required>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="cliente" aria-describedby="emailHelp" placeholder="Nombre del cliente" maxlength="111" value="<?php echo $cliente; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="asignador" aria-describedby="emailHelp" placeholder="Asignador" maxlength="90" value="<?php echo $asignador; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="servicio" aria-describedby="emailHelp" placeholder="Servicio" maxlength="22" value="<?php echo $servicio; ?>" required disabled>
      </div>
      <div class="form-group">
        <label for="nota">Nota:</label>
        <textarea class="form-control" id="nota" name="nota" rows="3" maxlength="255" placeholder="Notas de la tarea" disabled><?php echo $nota; ?></textarea>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Fecha de registro</span>
          </div>
          <input type="date" id="fecha" name="registrado" value="<?php echo $registrado; ?>" min="" class="form-control" disabled>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Fecha estimada</span>
          </div>
          <input type="date" id="fecha" name="registrado" value="<?php echo $fecha; ?>" min="" class="form-control" disabled>
      </div>
      <?php switch ($estado) {
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
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Estado </span>
          </div>
          <input type="text" class="form-control" id="" name="estado" aria-describedby="emailHelp" placeholder="Estado" maxlength="22" value="<?php echo $texto; ?>" required disabled>
      </div>
    </form>
  </div>

  <!-- **************************** RESPUESTAS  ****************************** -->
  <div class="container fondo">
    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-10 col-12"><h3>Respuestas</h3></div>
      <div class="col-md-2 col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#respuesta" data-whatever="@fat" style="width: 100%">Agregar respuesta</button>
      </div>
    </div>
    <table class="table table-striped table-responsive-sm">
      <thead class="bg-info">
        <th scope="col">Fecha</th>
        <th scope="col">Usuario</th>
        <th scope="col">Mensaje</th>
      </thead>
      <tbody>
        <?php foreach($tarearespuestas as $resp): ?>
          <tr>
            <td> <?php echo $resp->registrado; ?> </td>
            <td> <?php echo $resp->user; ?> </td>
            <td> <?php echo $resp->respuesta; ?> </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  





<!-- **************************MODAL de RESPUESTAS************************** -->

  <div class="modal fade" id="respuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar respuesta a tarea #<?php echo $foliot; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../scripts/respuesta.php" method="post" id="resp">
            <input type="hidden" class="form-control" id="" name="tarea" aria-describedby="emailHelp" placeholder="" value="<?php echo $foliot; ?>" required>
            <input type="hidden" class="form-control" id="" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" value="<?php echo $con; ?>" required>
            <div class="form-group">
              <label for="nota">Respuesta:</label>
              <textarea class="form-control" id="" name="respuesta" rows="3" maxlength="255" placeholder="Respuesta" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="resp">Registrar</button>
        </div>
      </div>
    </div>
  </div>



<!-- **************************MODAL de ESTADO************************** -->

  <div class="modal fade" id="estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar estado a tarea #<?php echo $foliot; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../scripts/estado.php" method="post" id="est">
            <input type="hidden" class="form-control" id="" name="tarea" aria-describedby="emailHelp" placeholder="" value="<?php echo $foliot; ?>" required>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Estado</span>
              </div>
              <select class="form-control" id="sel1" name="estado">
                  <option value="1">Pendiente</option>
                  <option value="2">Urgente</option>
                  <option value="3">Revisado</option>
            </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="est">Actualizar</button>
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