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

	    <title>Cadastro - Rotten Music</title>

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
		<section class="wrapper-register">
			<div class="container col-md-6 wrapper-register-2" >
				<p><h3>Cadastro</h3></p>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group form-group-login">
				  		<label for="textInput">Nome</label>
						<input class="form-control" type="text" value="" id="example-text-input" name="c_name" placeholder="Entre com seu nome" required>
					</div>
					<div class="form-group form-group-login">
				  		<label for="textInput">Usuário</label>
						<input class="form-control" type="text" value="" id="example-text-input" name="c_user" placeholder="Entre com seu usuário" required>
					</div>
					<div class="form-group form-group-login">
				  		<label for="textInput">Foto</label>
						<input class="form-control" type="file" name="c_image" required>
					</div>
					<div class="form-group form-group-login">
						<label for="exampleInputEmail1">E-mail</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="c_email" placeholder="Entre com seu e-mail" required>
						<small id="emailHelp" class="form-text text-muted">Fique tranquilo, livre de spam.</small>
				  	</div>
					<div class="form-group form-group-login">
						<label for="exampleInputPassword1">Senha</label>
						<input type="password" class="form-control" name="c_pass" id="exampleInputPassword1" placeholder="Insira sua senha" required>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
						Li e concordo com os termos do site
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="gridRadios" id="gridRadios1" value="option2">
						Receber Newsletter
						</label>
					</div>
					<br>
					<button type="submit" class="btn btn-info btn-block" name="submit">Cadastrar</button>
				</form>
			</div>
		</section>
		<!-- Footer -->
		<?php
	    include("commons/footer.php")
	    ?>
	    <!-- Bootstrap core JavaScript -->
	    <script src="vendor/jquery/jquery.min.js"></script>
	    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

<?php
	if(isset($_POST['submit'])){
		$c_name = $_POST['c_name'];
		$c_user = $_POST['c_user'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];

		$updir = 'profile_pictures/';
		$uploadfile = $updir . basename($_FILES['c_image']['name']);

		$c_img = $_FILES['c_image']['name'];

		move_uploaded_file($_FILES['c_image']['tmp_name'], $uploadfile);

		$insere_usuario = "insert into usuario (nome, user, email, senha, newsletter, foto) values ('$c_name','$c_user','$c_email','$c_pass',1,'$c_img')";
		$run_usuario = mysqli_query($con, $insere_usuario);

		if($run_usuario){
			echo"<script>alert('Usuario cadastrado com sucesso')</script>";
			echo"<script>window.open('home.php','_self')</script>";
		}
	}
?>