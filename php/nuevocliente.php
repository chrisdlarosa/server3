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
	<div class="container fondo" id="cat">
    <form action="../scripts/addclientes.php" method="post" class="form col-md-6 col-11">
      <h2>Agregar cliente nuevo</h2>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="folio" aria-describedby="emailHelp" placeholder="Folio de cliente" maxlength="11" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="nombre" aria-describedby="emailHelp" placeholder="Nombre del cliente" maxlength="111" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="razonsocial" aria-describedby="emailHelp" placeholder="Razon social del cliente" maxlength="155" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="" name="rfc" aria-describedby="emailHelp" placeholder="RFC" maxlength="22" required>
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