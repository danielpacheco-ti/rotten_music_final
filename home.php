<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/halloween_apple_worm_-rot-512.png">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rotten Music</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
    p {
          height:40px;
          line-height:20px; /* Height / no. of lines to display */
          overflow:hidden;
      }
    </style>
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
    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0 margin-top-0">Saiba tudo sobre os lançamentos das bandas nacionais</h1>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

              <?php
              $busca_resenha = "SELECT d.nome as nome_disco, p.nota as nota, a.nome as nome_artista, d.capa as foto, p.id as id, p.texto as texto, u.nome as autor FROM discos d, artista a, post p, usuario u WHERE d.id = p.id_disco and a.id = d.id_artista and p.id_usuario = u.id order by id desc limit 4";
              $run_resenha = mysqli_query($con, $busca_resenha);
              while($record=mysqli_fetch_array($run_resenha)){
                  $text_path = $record['texto'];
                  $id_resenha = $record['id'];
                  $artista = $record['nome_artista'];
                  $disco = $record['nome_disco'];
                  $nota = $record['nota'];
                  $autor = $record['autor'];
                  $foto = $record['foto'];
                  echo "<section>
                          <div class='container'>
                            <div class='row align-items-center'>
                              <div class='col-lg-6 order-lg-2'>
                                <div class='p-5'>
                                  <img class='img-fluid rounded-circle' style='width: 100%;  height:auto;' src='cover_pictures/$foto' alt=''>
                                </div>
                              </div>
                              <div class='col-lg-6 order-lg-1'>
                                <div class='p-5'>
                                  <a href='resenha_view_public.php?id_resenha=$id_resenha'>
                                    <h2 class='display-4 post-title'>Resenha: $artista - $disco</h2>
                                  <a>
                                  <p>";
                                    include($text_path);
                                    echo "</p>
                                  <a href='resenha_view_public.php?id_resenha=$id_resenha'>Ler mais</a>
                                  </a>  
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>";
              }?>

    <!-- Footer -->
    <?php
    include("commons/footer.php")
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
