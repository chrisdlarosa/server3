<?php
if (empty($_GET['id'])){
  header("refresh:0; verUsuarios.php");
}
$usuario = $_GET['id'];
include '../scripts/database.php';
$user=new Database();
$user->conectarBD();
$cadena = "SELECT*FROM usuarios WHERE id = '$usuario'";
$users = $user->seleccionar2($cadena);

if ($users==0){
  header("refresh:0; verUsuarios.php"); 
}
$id = $users['id'];
$folio = $users['folio'];
$nombre = $users['nombre'];
$apellidos = $users['apellidos'];
$correo = $users['correo'];

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
    <form action="../scripts/actualizando.php" method="post" class="form col-md-6 col-11">
      <h2>Modificar Usuario #<?php echo $id; ?> </h2>
      <input type="hidden" class="form-control" id="" name="id" aria-describedby="emailHelp" placeholder="" maxlength="33" value="<?php echo $id; ?>" required>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="folio" aria-describedby="emailHelp" placeholder="Folio" maxlength="11" value="<?php echo $folio; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del usuario" maxlength="33" value="<?php echo $nombre; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="apellidos" aria-describedby="emailHelp" placeholder="Apellidos del usuario" maxlength="55" value="<?php echo $apellidos; ?>" required disabled>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="" name="correo" aria-describedby="emailHelp" placeholder="Correo Electronico del usuario" maxlength="44" value="<?php echo $correo; ?>" required disabled>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Contraseña nueva" name="pass" maxlength="22" required>
      </div>
      <a href="usuarios.php" class="btn btn-lg btn-danger" role="button" aria-pressed="true" style="width: 44%; margin-top: 10px;">Cancelar</a>
        <button type="submit" class="btn btn-lg btn-warning" style="width: 54%; margin-top: 10px;">Actualizar contraseña</button>
    </form>
  </div>


<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>