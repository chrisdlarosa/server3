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
  <div class="container" id="cat">
    <?php
    include 'database.php';
    $db=new Database();
    $db->conectarBD();
    extract($_POST);
    $cadena="INSERT INTO tareas (cliente,usuario,asignado,servicio,nota,estado,registrado,fecha) VALUES ($idcliente,$usuario,$usuarioasignado,$servicio,'$nota',1,now(),now())";
    $db->ejecutaSQL($cadena);
    $cadena2 = "SELECT*FROM tareas order by folio DESC LIMIT 1";
    $tareas = $db->seleccionar2($cadena2);
    $tarea = $tareas['folio'];
    $db->desconectarBD();
    ?>
    <div class="alert alert-success">Tarea agregada con exito con el folio <span class="badge badge-success"><?php echo $tarea; ?></span>!</div>
    <?php 
    header("refresh:3; ../php/nuevoclienteJo.php");
     ?>
  </div>

<!-- ***************Termino contenido del sitio******************** -->
<!-- ***************Enlazes a Jquery*********************************************** -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>