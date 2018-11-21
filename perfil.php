<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil - Rotten Music</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="icon" href="images/icon.png">

	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
 
</head>

<body>	

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom" style="background-color: #473945;">
      <div class="container">
        <a class="navbar-brand" href="Home.html"><h3>ROTTEN<span> music</span></h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			<li class="nav-item">
			<!--Não está fazendo o dropdown-->
			<div class="dropdown show">
				<button class="btn btn-primary" type="button" id="Notificacoes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Notificações 
				<i class="fas fa-bell" size="2"></i>
				</button>
					<div class="dropdown-menu" aria-labelledby="Notificacoes">
						<a class="dropdown-item" href="#">Action</a>
					    <a class="dropdown-item" href="#">Another action</a>
					    <a class="dropdown-item" href="#">Something else here</a>
					</div>
			</div>
			</li>
			<li class="px-md-5"></li>
            <li class="nav-item">
              <a class="nav-link" href="config.php">Configurações</a>
            </li>
            <li class="nav-item">
              <?php
                if(isset($_SESSION['c_email'])){
                  echo('<a class="nav-link" href="logout.php">Logout</a>');
                } else {
                  echo('<a class="nav-link" href="login.php">Login</a>');
                }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
</body>
</html>

