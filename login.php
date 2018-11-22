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
		<section class="wrapper-login">
			<div class="container col-md-6 wrapper-login-2">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group form-group-login">
						<!-- <span class="hidden-xs">Login com</span> -->
			  			<!-- <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
			        		<i class="fa fa-facebook visible-xs"></i>
			        		<span class="hidden-xs">Facebook</span>
			        	</a> -->
			        	<!-- <span class="hidden-xs">Ou</span> -->
						<label for="textInput">Entre com seu usuario</label>
			  			<br>
			  			<i class="fa fa-user"></i>
						<input class="form-control" type="text" name="c_user" id="example-text-input" placeholder="Entre com seu usuario">
					</div>
					<div class="form-group form-group-login">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="c_pass" placeholder="Insira sua senha">
					</div>
					<div class="form-group">
						<label class="checkbox">
							<input type="checkbox" value="remember-me"> Remember Me
						</label>
					</div>
					<div class="form-group">
						<p><a href="#">Forgot password?</a></p>
					</div>
				    <button class="btn btn-lg btn-info btn-block" type="submit" name="login">Login</button>
				</form>
	    	</div>
	    </section>
    <!-- Footer -->
    <?php
		include("commons/footer_bottom.php")
	?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

<?php
	if(isset($_POST['login'])){
		$c_user = $_POST['c_user'];
		$c_pass = $_POST['c_pass'];

		$seleciona_usuario = "select * from usuario where user='$c_user' and senha='$c_pass'";
		$run_seleciona = mysqli_query($con, $seleciona_usuario);
		$usuario_check = mysqli_num_rows($run_seleciona);

		if($usuario_check==0){
			echo "<script>alert('Email ou senha inválidos')</script>";
			exit();
		}
		if($usuario_check == 1) {
			$row_nome =mysqli_fetch_array($run_seleciona);
			$nome = $row_nome['nome'];
			$email = $row_nome['email'];
			$_SESSION['c_email'] = $email;

			echo "<script>alert('Bem vindo $nome!')</script>";
			echo "<script>window.open('user.php','_self')</script>";
		}
	}
?>