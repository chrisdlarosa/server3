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
     <?php include '../php/navbar1.php'?>
  
<!-- ***************Inicio del sitio****************************** -->
    <div class="container">
      <?php
        include 'database.php';
        $db=new Database();
        $db->conectarBD();
        extract($_POST);
        $nombre = strtoupper($nombre);
        $descripcion = strtoupper($descripcion);
        $cadena="UPDATE servicios SET nombre='$nombre',descripcion='$descripcion' WHERE cve='$cve'";
        $db->ejecutaSQL($cadena);
        ?>
        <div class="alert alert-success">Servicio actualizado exitosamente!</div>
        <?php 
        header("refresh:3; ../php/verUsuarios.php");
     ?>
    </div>


<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>