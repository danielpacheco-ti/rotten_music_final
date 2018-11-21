<?php
session_start();
include("includes/db.php");
include("includes/meths.php");
?>


<!doctype html>
<html lang="pt-br">
    <head>
    	<meta charset="utf-8" />
    	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<title>Rotten Music - Pesquisa</title>

    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

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
            include("commons/sidebar.php")
        ?>
        <div class="wrapper">
            <div class="main-panel">
                <?php
                include("commons/navbar_user.php")
                ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Bandas encontradas:</h4>
                                    </div>
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
                                                    echo "<tr onclick=\"window.location='artista.php?id_artista=$id';\">
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
                    </div>
                </div>
            </div>
            <?php
                include("commons/footer_user.php")
            ?>
        </div>
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
