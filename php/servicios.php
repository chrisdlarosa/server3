<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>
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
  
<!-- ***************Inicio del sitio****************************** -->
    <?php 
    include '../scripts/database.php';
    $conexion = new Database();
    $conexion->conectarBD();
    $consulta="SELECT*FROM servicios";
    $servicios = $conexion->seleccionar($consulta);
     ?>
  <div class="container fondo" id="cat">
    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-10 col-12"><h2>Servicios</h2></div>
      <div class="col-md-2 col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo" data-whatever="@fat">Agregar servicio</button>
      </div>
    </div>
    <table class="table table-hover table-responsive-sm">
      <thead class="bg-primary">
        <th scope="col">cve</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Opciones</th>
      </thead>
      <tbody>
        <?php foreach($servicios as $servicio): ?>
          <tr>
            <th> <?php echo $servicio->cve; ?> </th>
            <td> <?php echo $servicio->nombre; ?> </td>
            <td> <?php echo $servicio->descripcion; ?> </td>
            <td style="display: inline-flex;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $servicio->cve; ?>" data-whatever="@fat">Editar  <i class="fas fa-pen"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php $conexion->desconectarBD(); ?>
  </div>

  <footer class="container footer">
    
  </footer>



  <!-- ***********************MODAL de AGREGAR SERVICIOS****************************-->
  <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo servicio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../scripts/addservicio.php" method="post" id="nuevos">
            <div class="form-group">
              <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del servicio" maxlength="22" value="" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="descripcion" aria-describedby="emailHelp" placeholder="Descripcion" maxlength="44" value="" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="nuevos">Registrar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- ***********************MODALES de SERVICIOS********************************-->

  <?php foreach($servicios as $servicio): ?>
  <div class="modal fade" id="modal<?php echo $servicio->cve; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar servicio #<?php echo $servicio->cve; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../scripts/upservicio.php" method="post" id="form<?php echo $servicio->cve; ?>">
            <div class="form-group">
              <input type="hidden" class="form-control" id="" name="cve" aria-describedby="emailHelp" placeholder="Cve" maxlength="22" value="<?php echo $servicio->cve; ?>" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del servicio" maxlength="22" value="<?php echo $servicio->nombre; ?>" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" name="descripcion" aria-describedby="emailHelp" placeholder="Descripcion" maxlength="44" value="<?php echo $servicio->descripcion; ?>" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="form<?php echo $servicio->cve; ?>">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>