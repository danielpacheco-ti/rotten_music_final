<?php

$c_email = $_SESSION['c_email'];    
$busca_perfil = "select * from usuario where email='$c_email'";
$run_perfil = mysqli_query($con, $busca_perfil);

while($record=mysqli_fetch_array($run_perfil)){
    $c_nome = $record['nome'];
    $c_user = $record['user'];
    $c_email = $record['email'];
    $c_foto = $record['foto'];
}
?>
<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/rottenmusic/user.php">Bem vindo (a), <?php echo $c_nome; ?></a>
        </div>
        <form method="post" enctype="multipart/form-data">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
					    <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-globe"></i>
                        <b class="caret hidden-sm hidden-xs"></b>
                        <span class="notification hidden-sm hidden-xs">5</span>
						<p class="hidden-lg hidden-md">
							5 Notifications
							<b class="caret"></b>
						</p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                        <li><a href="#">Notification 4</a></li>
                        <li><a href="#">Another notification</a></li>
                    </ul>
                </li>
                <li>
                    <input type="text" name="banda_busca" class="form-control nav navbar-nav navbar-right" placeholder="Buscar banda">
                </li>
                <li>
                    <button type="submit" name="submit" class="btn btn-primary"></button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="./logout.php">
                        <p>Logout</p>
                    </a>
                </li>
				<li class="separator hidden-lg hidden-md"></li>
            </ul>
        </div>
    </form>
    </div>
</nav>


<?php 
    if(isset($_POST['submit']) && isset($_POST['banda_busca'])){
        $string_busca = $_POST['banda_busca'];
        echo "<script>window.location = 'busca_banda.php?banda_busca=$string_busca'</script>";
    }
?>