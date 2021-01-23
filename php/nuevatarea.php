<?php
if (empty($_GET['id'])){
  header("refresh:0; clientes.php");
}
$cliente = $_GET['id'];
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


$consulta3="SELECT*FROM servicios";
$servicios = $conexion->seleccionar($consulta3);

$consul="SELECT*FROM usuarios";
$usuarios = $conexion->seleccionar($consul);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva tarea</title>
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
	<div class="container fondo" id="cat">
    <form action="../scripts/registrando.php" method="post" class="form col-md-6 col-11">
      <h2>Agregar tarea</h2>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="idcliente" aria-describedby="emailHelp" placeholder="Folio de usaurio" maxlength="11" value="<?php echo $id; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="nombrecliente" aria-describedby="emailHelp" placeholder="Razon social del cliente" maxlength="111" value="<?php echo $nombre; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="razonsocial" aria-describedby="emailHelp" placeholder="Folio de usaurio" maxlength="155" value="<?php echo $razonsocial; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="usuario" aria-describedby="emailHelp" placeholder="Usuario que asigna" maxlength="33" required>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Tipo de servicio</span>
          </div>
          <select class="form-control" id="servicio" name="servicio">
            <?php foreach ($servicios as $servicio): ?>
              <option value="<?php echo $servicio->cve; ?>"><?php echo $servicio->nombre; ?></option>
            <?php endforeach; ?>
          </select>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Usuario</span>
          </div>
          <select class="form-control" id="usuarioasignado" name="usuarioasignado">
            <?php foreach ($usuarios as $usuario): ?>
              <option value="<?php echo $usuario->id; ?>"><?php echo $usuario->folio.' - '. $usuario->nombre. ' ' .$usuario->apellidos; ?></option>
            <?php endforeach; ?>
          </select>
      </div>
      <div class="form-group">
        <label for="nota">Nota:</label>
        <textarea class="form-control" id="nota" name="nota" rows="3" maxlength="255" placeholder="Notas de la tarea"></textarea>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Fecha estimada</span>
          </div>
          <input type="date" id="fecha" name="trip-start" value="" min="<?php echo date('Y-m-d\TH-i');?>" class="form-control">
      </div>
        <button type="submit" class="btn btn-lg btn-success" style="width: 100%;">Agregar</button>
    </form> 
  </div>

<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>