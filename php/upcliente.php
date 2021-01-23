<?php
if (empty($_GET['id'])){
  header("refresh:0; verUsuarios.php");
}
$id = $_GET['id'];
include '../scripts/database.php';
$cliente=new Database();
$cliente->conectarBD();
$cadena = "SELECT*FROM clientes WHERE id = '$id'";
$cli = $cliente->seleccionar2($cadena);

if ($cli==0){
  header("refresh:0; verUsuarios.php"); 
}
$id = $cli['id'];
$folio = $cli['folio'];
$nombre = $cli['nombre'];
$razonsocial = $cli['razonsocial'];
$rfc = $cli['rfc'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizando</title>
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
		form {margin-bottom: 50px; margin-top: -30px}
	</style>
</head>
<body>
     <?php include 'navbar1.php'?>
  
<!-- ***************Inicio del sitio****************************** -->
    <div class="container">
    <form action="../scripts/actualizandocliente.php" method="post" class="form col-md-6 col-11">
      <h2>Modificar cliente #<?php echo $folio; ?> </h2>
      <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" maxlength="33" value="<?php echo $id; ?>" required>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="folio" aria-describedby="emailHelp" placeholder="Folio" maxlength="11" value="<?php echo $folio; ?>" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del cliente" maxlength="111" value="<?php echo $nombre; ?>" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="razonsocial" aria-describedby="emailHelp" placeholder="Razon Social" maxlength="155" value="<?php echo $razonsocial; ?>" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="rfc" aria-describedby="emailHelp" placeholder="RFC" maxlength="44" value="<?php echo $rfc; ?>" required>
      </div>
        <a href="cliente.php?id=<?php echo $id; ?>" class="btn btn-lg btn-danger" role="button" aria-pressed="true" style="width: 44%; margin-top: 10px;">Cancelar</a>
        <button type="submit" class="btn btn-lg btn-warning" style="width: 54%; margin-top: 10px;">Actualizar cliente</button>
    </form>
  </div>


<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>