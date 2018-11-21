<?php
session_start();
include("includes/db.php");
include("includes/meths.php");

$id_artista = $_GET['id_artista'];    
$busca_dados_artista = "select * from artista where id='$id_artista'";
$run_artista = mysqli_query($con, $busca_dados_artista);
while($record=mysqli_fetch_array($run_artista)){
    $nome = $record['nome'];
    $foto = $record['foto'];
    $denuncia = $record['denuncia'];
    $genero = $record['genero'];
    $id_artista = $record['id'];
}

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
        <h4 class="title"><?php echo "$nome"; ?> </h4>
    </header>

    <div class="header">
        
    <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card pull-center">
                                    <div class="header">
                                        <h4 class="title"><center>Resenhas</center></h4>
                                    </div>
                                    <div class="content">
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>Disco</th>
                                                    <th>Autor</th>
                                                    <th>Nota</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $busca_resenhas = "select p.id as id, d.nome as nome_disco, u.nome as autor, p.nota as nota from post p, artista a, discos d, usuario u where p.id_disco = d.id and p.id_usuario = u.id and d.id_artista = a.id and a.id = $id_artista";
                                                    $run_busca = mysqli_query($con, $busca_resenhas);
                                                    while($record=mysqli_fetch_array($run_busca)){
                                                        $nome_disco = $record['nome_disco'];
                                                        $autor = $record['autor'];
                                                        $id = $record['id'];
                                                        $nota = $record['nota'];
                                                        echo "<tr onclick=\"window.location='resenha_view_public.php?id_resenha=$id';\">
                                                                <td>$nome_disco</td>
                                                                <td>$autor</td>
                                                                <td>$nota</td>
                                                            </tr>";
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><center>Denuncias</center></h4>
                                    </div>
                                    <div class="content">
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>Motivo</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $busca_denuncia = "select motivo, id from denuncia where id_artista='$id_artista'";
                                                    $run_busca_denuncia = mysqli_query($con, $busca_denuncia);
                                                    while($record=mysqli_fetch_array($run_busca_denuncia)){
                                                        $motivo = $record['motivo'];
                                                        $id_denuncia = $record['id'];
                                                        echo "<tr onclick=\"window.location='login.php';\">
                                                                <td>$motivo</td>
                                                            </tr>";
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
