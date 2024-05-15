<?php 

// Conectarse a y seleccionar una base de datos de MySQL llamada mi_empresa
// Nombre de host: 127.0.0.1, nombre de usuario: tu_usuario, contraseña: tu_contraseña, bd: mi_empresa
$mysqli = new mysqli('localhost', 'id19970909_admin', 'trainerportaL1..', 'id19970909_database');

if ($mysqli->connect_errno) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
$mysqli->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
	<link rel="shortcut icon" href="https://www.youtube.com/s/desktop/7edc9c99/img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="">
    <meta name="author" content="">
    <title>Portal Trainer | Evaluación de encargados</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body class="clouds d-flex flex-column h-100 overflow-x-hidden">		

	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
		<div class="container">
			<a class="navbar-brand" href="index.php">Evaluación</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item"><a class="nav-link active" href="#!">Form</a></li>		
				</ul>
				
			</div>
		</div>
	</nav>
	<div class="flex-shrink-0">
  
  