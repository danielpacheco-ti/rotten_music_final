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
    	<meta charset="utf-8" />
    	<link rel="icon" type="image/png" href="img/halloween_apple_worm_-rot-512.png">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<title>Rotten Music - <?php echo "$nome"; ?></title>

    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>


        <!-- Text Editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>
    <body>
        <?php
            include("commons/sidebar.php");
        ?>
        <div class="wrapper">
            <div class="main-panel">
            <?php
            include("commons/navbar_user.php")
            ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Resenhas sobre <?php echo "$nome"; ?> </h4>
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
                                                        echo "<tr onclick=\"window.location='resenhaview.php?id_resenha=$id';\">
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
                             <?php
                            include("commons/card_band.php")
                            ?>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Denuncias sobre <?php echo "$nome"; ?> </h4>
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
                                                        echo "<tr onclick=\"window.location='denuncia_view.php?id_denuncia=$id_denuncia';\">
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
            <?php
                include("commons/footer_user.php")
            ?>
        </div>
    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
</html>