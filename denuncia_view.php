<?php
session_start();
include("includes/db.php");
include("includes/meths.php");


$id_denuncia = $_GET['id_denuncia'];    
$id_denuncia = "SELECT a.nome as nome_artista, d.denuncia as texto, d.motivo as motivo FROM artista a, denuncia d WHERE d.id_artista = a.id and d.id = $id_denuncia";
$run_denuncia = mysqli_query($con, $id_denuncia);
while($record=mysqli_fetch_array($run_denuncia)){
    $text_path = $record['texto'];
    $artista = $record['nome_artista'];
    $motivo = $record['motivo'];
}

?>

<!doctype html>
<html lang="pt-br">
    <head>
    	<meta charset="utf-8" />
    	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<title><?php echo "$motivo"; ?> - <?php echo "$artista"; ?></title>

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
                            <div class="col-md-12 card">
                                <div class="header">
                                    <h4 class="title"><?php echo "$motivo"; ?></h4>
                                    <p class="category"><?php echo "$artista"; ?></p>
                                    <a href="minhas_denuncias.php">
                                        <p class="btn btn-info btn-fill pull-right">Minhas denuncias</p>
                                    </a>
                                </div>
                                 <div class="col-md-12">
                                    <?php
                                        include("$text_path")
                                    ?><br>
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
