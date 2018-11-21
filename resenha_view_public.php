<?php
session_start();
include("includes/db.php");
include("includes/meths.php");


$id_resenha = $_GET['id_resenha'];    
$busca_resenha = "SELECT d.nome as nome_disco, p.nota as nota, a.nome as nome_artista, p.id as id, p.texto as texto, u.nome as autor FROM discos d, artista a, post p, usuario u WHERE d.id = p.id_disco and a.id = d.id_artista and p.id_usuario = u.id and p.id='$id_resenha'";
$run_resenha = mysqli_query($con, $busca_resenha);
while($record=mysqli_fetch_array($run_resenha)){
    $text_path = $record['texto'];
    $artista = $record['nome_artista'];
    $disco = $record['nome_disco'];
    $nota = $record['nota'];
    $autor = $record['autor'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/halloween_apple_worm_-rot-512.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rotten Music</title>

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
  </head>
  
   <body>
    <?php
    include("commons/navbar.php")
    ?>

    <!-- Page Header -->
    <header class="masthead1" style="background-color: #FFFF">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?php echo "$artista - $disco"; ?></h1>
              <h1>Nota: <?php echo "$nota"; ?></h1>
              <h2 class="subheading">Autor: <?php echo "$autor"; ?></h2>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- s-content
    ================================================== -->

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
		        <?php
            include($text_path);
            ?>
          </div>
        </div>
      </div>
    </article>

	<!-- Footer -->
    <?php
    include("commons/footer.php")
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>

</html>
