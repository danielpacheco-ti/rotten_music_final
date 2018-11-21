<?php
session_start();
include("includes/db.php");

if(!isset($_SESSION['c_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<meta charset="utf-8" />
    	<link rel="icon" type="image/png" href="img/halloween_apple_worm_-rot-512.png">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<title>Rotten Music - Novo Álbum</title>

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
                                        <h4 class="title">Cadastrar Álbum</h4>
                                    </div>
                                    <div class="content">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Nome do Artista</label>
                                                        <input type="text" class="form-control" name="a_nome" placeholder="Nome do artista" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="a_nome_disco">Nome do disco</label>
                                                        <input type="text" class="form-control" name="a_nome_disco" placeholder="Nome do disco" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                            	<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="a_data">Data de lançamento</label>
                                                        <input type="date" class="form-control" name="a_data" placeholder="Nome do disco" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Capa</label>
                                                        <input class="form-control" type="file" name="a_image" required><br><br>
                                                        <button type="submit" class="btn btn-info btn-fill pull-right" name="submit">Cadastrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                                <?php
                                    include("commons/card_user.php")
                                ?>
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

<?php 
	if(isset($_POST['submit'])){
		$a_nome = $_POST['a_nome'];
		$a_nome_disco = $_POST['a_nome_disco'];
		$a_data = $_POST['a_data'];

		$updir = 'cover_pictures/';
		$uploadfile = $updir . basename($_FILES['a_image']['name']);

		$a_image = $_FILES['a_image']['name'];

		move_uploaded_file($_FILES['a_image']['tmp_name'], $uploadfile);

		$busca_artista = "select * from artista where nome='$a_nome'";
		$run_busca = mysqli_query($con, $busca_artista);
		$artista_check = mysqli_num_rows($run_busca);


		$busca_discos = "select * from discos where nome='$a_nome_disco'";
		$run_busca_d = mysqli_query($con, $busca_discos);
		$discos_check = mysqli_num_rows($run_busca_d);



		if($artista_check > 0){
			while($record=mysqli_fetch_array($run_busca)){
		    $id_artista = $record['id'];
			}
			if($discos_check == 0){
				$insere_disco = "insert into discos (id_artista, nome, data_lancamento, capa) values ('$id_artista','$a_nome_disco','$a_data','$a_image')";
				$run_disco = mysqli_query($con, $insere_disco);
				if ($run_disco){
					echo"<script>alert('Disco cadastrado com sucesso')</script>";
				}
			} else {
				echo"<script>alert('Disco já cadastrado!')</script>";
				exit();
			}
			
		} else {
			echo"<script>alert('Artista não cadastrado!')</script>";
			exit();
		}
	}
?>