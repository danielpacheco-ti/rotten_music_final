<?php
session_start();
include("includes/db.php");
include("includes/meths.php");

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

    	<title>Rotten Music - Nova Resenha</title>

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
                                        <h4 class="title">Resenha</h4>
                                    </div>
                                    <div class="content">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                       <label>Artista</label>
                                                                <input type="text" class="form-control" onchange="albumfiller(this);" name="banda" placeholder="Nome do artista" value="<?php if(isset($_GET['artista'])){
                                                                        echo $_GET['artista'];
                                                                        } ?>"><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Álbum</label>
                                                        <?php
                                                            if(isset($_GET['artista'])){
                                                                $a_nome = $_GET['artista'];
                                                                $busca_artista = "select * from artista where nome='$a_nome'";
                                                                $run_busca = mysqli_query($con, $busca_artista);
                                                                $artista_check = mysqli_num_rows($run_busca);
                                                                if($artista_check > 0){
                                                                    while($record=mysqli_fetch_array($run_busca)){
                                                                        $id_artista = $record['id'];
                                                                        $get_albuns="select * from discos where id_artista='$id_artista'";
                                                                        $run_albuns = mysqli_query($con, $get_albuns);
                                                                        $albuns_check = mysqli_num_rows($run_albuns);
                                                                        if($albuns_check > 0 ){
                                                                            echo "<select name='album' class='form-control'>";
                                                                            while($record=mysqli_fetch_array($run_albuns)){
                                                                                $nome = $record['nome'];
                                                                                $id_disco = $record['id'];
                                                                                echo "<option value=$id_disco>$nome</option>";
                                                                            }
                                                                            echo "</select>";
                                                                        } else {
                                                                            echo "<input type='text' class='form-control' value='Nenhum álbum cadastrado, cadastre ao lado' disabled>";
                                                                        }
                                                                    }
                                                                } else {
                                                                    echo"<input type='text' class='form-control' value='Artista não cadastrado, cadastre ao lado' disabled>";
                                                                }
                                                            } else {
                                                                echo"<input type='text' class='form-control' value='Digite um artista' disabled>";
                                                        } ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label>Nota</label>
                                                        <input type="text" class="form-control" name="nota" placeholder="0-5">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="form-group">
                                                            <textarea name="content" id="editor"></textarea><br>
                                                            <script>
                                                                ClassicEditor
                                                                    .create( document.querySelector( '#editor' ) )
                                                                    .catch( error => {
                                                                        console.error( error );
                                                                    } );
                                                            </script>
                                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Enviar</button>
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
        $id_usuario = retornaIdUsuario();
        $id_disco = $_POST['album'];
        $nota = $_POST['nota'];

        $filename = generateRandomString();

        $updir = 'posts_files/';

        if(!file_exists($updir . $filename . ".html")){
                $file = tmpfile();
            }
            $file = fopen($updir . $filename . ".html","a+");
            while(!feof($file)){
                $old = $old . fgets($file). "<br />";
            }
            $text = $_POST["content"];
            file_put_contents($updir . $filename . ".html", $old . $text);
            fclose($file);

        $textfile = $updir . $filename . ".html";


        if ($id_disco != ''){
            $insere_resenha = "insert into post (id_usuario, id_disco, texto, nota) values ('$id_usuario','$id_disco','$textfile', '$nota')";
            $run_usuario = mysqli_query($con, $insere_resenha);    
            if($run_usuario){
                echo"<script>alert('Resenha salva com sucesso')</script>";
                echo"<script>window.open('resenha.php','_self')</script>";
            }
        } else {
            echo"<script>alert('Por favor preencha todos os campos')</script>";
        }
    }
?>