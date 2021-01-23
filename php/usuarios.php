<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
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
    $consulta="SELECT*FROM usuarios";
    $usuarios = $conexion->seleccionar($consulta);
     ?>
  <div class="container fondo" id="cat">
    <h2>Usuarios</h2>
    <table class="table table-hover table-responsive-sm">
      <thead class="bg-primary">
        <th scope="col">Folio</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Tipo</th>
        <th scope="col"></th>
      </thead>
      <tbody>
        <?php foreach($usuarios as $usuario): ?>
          <tr>
            <th> <?php echo $usuario->folio; ?> </th>
            <td> <?php echo $usuario->nombre ." ". $usuario->apellidos; ?> </td>
            <th> <?php echo $usuario->correo; ?> </th>
            <td> <?php echo $usuario->telefono; ?> </td>
            <td> <?php echo $usuario->tipo; ?> </td>
            <td style="display: inline-flex;">
              <a href="upusuario.php?id=<?php echo $usuario->id; ?>" class="btn btn-info" role="button" aria-pressed="true" style="margin-right: 3px;" ><i class="fas fa-pen"></i></a>
              <a href="upassword.php?id=<?php echo $usuario->id; ?>" class="btn btn-warning" role="button" aria-pressed="true"><i class="fas fa-lock"></i></a>
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