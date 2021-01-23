<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
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
      include '../scripts/database.php';
      $conexion = new Database();
      $conexion->conectarBD();
      $consulta="SELECT*FROM servicios";
      $servicios = $conexion->seleccionar($consulta);
      $card = 0;
     ?>
<!-- ***************Inicio del sitio******************* -->
	<div class="container" id="cat">
    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-10 col-12">
        <h2>Servicios</h2>
      </div>
      <div class="col-md-2 col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Servicio</button>
      </div>
    </div>
		<div class="accordion" id="accordionExample">
      <?php foreach($servicios as $servicio): ?>
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $card;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $servicio->nombre; ?>
          </button>
        </h2>
    </div>

    <div id="collapse<?php echo $card;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php echo $servicio->descripcion; 
          $card = $card+1;
        ?>
      </div>
    </div>
  </div>

<?php endforeach; ?>
    </div>
	</div>
<?php $conexion->desconectarBD(); ?>


  <footer class="foot" style="background-color: #000; color: #fff; height: 30px">
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