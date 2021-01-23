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
     <?php include 'navbar1.php'?>
  
<!-- ***************Inicio del sitio****************************** -->
    <?php 
    include '../scripts/database.php';
    $conexion = new Database();
    $conexion->conectarBD();
    $consulta="SELECT*FROM clientes";
    $clientes = $conexion->seleccionar($consulta);;
     ?>
  <div class="container fondo" id="cat">
    <h2>Clientes</h2>
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
              <a href="nuevatarea.php?id=<?php echo $cliente->id; ?>" class="btn btn-success" role="button" aria-pressed="true" style="margin-right: 3px;" ><i class="fas fa-plus"></i></a>
            </td>
            <td style="display: inline-flex;">
              <a href="cliente.php?id=<?php echo $cliente->id; ?>" class="btn btn-info" role="button" aria-pressed="true" style="margin-right: 3px;" ><i class="fas fa-pen"></i></a>
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

<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>