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
		<section>	
			<div class="container col-md-6" style="margin-top: 60px;">
				<div class="p-5">
					<h3 style="text-align: center;"> Sobre </h3>
					<p style="margin-top: 60px;">
						Este projeto tem o objetivo de coletar resenhas, avaliações e comentários sobre álbuns de diversas bandas da cena nacional brasileira. Este site, além de armazenar as principais informações sobre discos e artistas também irá expor denúncias de assédio contra artistas e membros dos grupos. Basta procurar na barra de pesquisa.
					</p>
					<p>
						O desenvolvimento do projeto está por conta de Yasmin Amaral e Daniel Pacheco, ambos estudantes do Instituto Federal de São Carlos.
					</p>
				</div>
			</div>
		</section>

		<section>
		    <div class="container col-md-6" style="margin-top: 60px;">
		        <div class="row align-items-center">
		          	<div class="col-lg-8">
		            	<div class="p-5">
		              		<img class="img-fluid rounded-circle" style="margin-left: 90px;" src="img/01.jpg" alt="">
		            </div>
		        </div>
			</div>
			<div class="col-lg-4"></div>
			<div class="row align-items-center">
		    	<div class="col-lg-12">
		        	<div class="p-5">
		            	<a href="post.html"></a>
			            <p>Yasmin A. Amaral Pacheco</p>
			            <p>Estudante de Análise e Desenvolvimento de Sistemas pelo Instituto Federal de São Carlos, atua ativamente como analista de conteúdo e redes sociais. Feminista, guitarrista na luta contra o machismo no metal e apaixonada por gatos. "Feminista, pessoa que acredita na igualdade social, política e econômica dos sexos" Chimamanda Ngozi Adichie.</p>
					</div>
		        </div>
		    </div>
			<div class="row align-items-center">
		    	<div class="col-lg-8">
		        	<div class="p-5">
		            	<img class="img-fluid rounded-circle" style="margin-left: 90px;" src="img/02.jpg" alt="">
		            </div>
		        </div>
		   	</div>
		    <div class="col-lg-4"></div>
		    	<div class="row align-items-center">
		          	<div class="col-lg-12">
		          		<div class="p-5">
							<a href="post.html"></a>
		              		<p>Daniel D. Pacheco</p>
		              		<p>Estudante de Análise e Desenvolvimento de Sistemas pelo Instituto Federal de São Carlos, atua ativamente como desenvolvedor python no Serasa. Viciado em thrash metal e boardgames.</p>
						</div>
		          	</div>
		        </div>
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