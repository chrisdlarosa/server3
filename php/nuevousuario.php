<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar usuario</title>
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
    <form action="../scripts/adduser.php" method="post" class="form col-md-6 col-11">
      <h2>Agregar usuario nuevo</h2>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="folio" aria-describedby="emailHelp" placeholder="Folio de usaurio" maxlength="11" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del usuario" maxlength="33" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="apellidop" aria-describedby="emailHelp" placeholder="Apellidos paterno" maxlength="22" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="apellidom" aria-describedby="emailHelp" placeholder="Apellido materno" maxlength="22" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="" name="correo" aria-describedby="emailHelp" placeholder="Correo Electronico del usuario" maxlength="55" required>
      </div>
      <div class="form-group">
        <input type="tel" class="form-control" id="" name="telefono" aria-describedby="emailHelp" placeholder="Telefono celular del usuario" maxlength="10" required>
      </div>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Tipo de usuario</span>
          </div>
          <select class="form-control" id="sel1" name="tipo">
              <option value="0">Administrador</option>
              <option value="1">Supervisor</option>
              <option value="2">Usuario</option>
        </select>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Contraseña" name="pass" maxlength="22">
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