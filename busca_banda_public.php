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
        <h4 class="title">Bandas encontradas</h4>
    </header>

    <div class="header">
        
    </div>
    <div class="col-md-12 pull-center">
        <div class="card">
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Bandas</th>
                        <th>Resenhas cadastradas</th>
                    </thead>
                    <tbody>
                    <?php
                        $banda_busca = $_GET['banda_busca'];
                        $query_busca = "select * from artista where nome like \"%$banda_busca%\"";
                        $run_busca = mysqli_query($con, $query_busca);
                        while($record=mysqli_fetch_array($run_busca)){
                            $id = $record['id'];
                            $artista = $record['nome'];
                            $busca_resenhas = "select a.nome as nome_artista from post p, artista a, discos d where p.id_disco = d.id and d.id_artista = a.id and a.nome = '$artista'";
                            $run_resenha = mysqli_query($con, $busca_resenhas);
                            $numero_resenha = mysqli_num_rows($run_resenha);
                            echo "<tr onclick=\"window.location='artista_public.php?id_artista=$id';\">
                                    <td>$artista</td>
                                    <td>$numero_resenha</td>
                                </tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include("commons/footer.php")
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
