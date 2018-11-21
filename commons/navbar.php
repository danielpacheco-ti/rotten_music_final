<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: #473945;">
  <div class="container">
    <a class="navbar-brand" href="home.php"><h3>ROTTEN<span> music</span></h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form method="post" enctype="multipart/form-data">
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="cadastro.php">Contribuir com Resenha</a>
        </li>

		  <li class="nav-item">
        <div class="input-group col-md-12 block" id="custom-search-input">
          <input type="text" name=banda_busca class="form-control input-lg" placeholder="Buscar resenha" />
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" name="submit">
              <i class="fas fa-search" size="2"></i>
            </button>
          </span>
        </div>
			</li>

			<li class="px-md-5"></li>
        <li class="nav-item">
          <?php
            if(!isset($_SESSION['c_email'])){
              echo('<a class="nav-link" href="cadastro.php">Sign Up</a>');
              } else {
                echo('<a>               </a>');
              }
            ?>
        </li>

        <li class="nav-item">
          <?php
            if(isset($_SESSION['c_email'])){
              echo('<a class="nav-link" href="logout.php">Logout</a> 
                <a class="nav-link" href="user.php">Meu Perfil</a>');
            } else {
                echo('<a class="nav-link" href="login.php">Login</a>');
            }
            ?>
        </li>

      </ul>
    </div>
  </div>
</form>
</nav>

<?php 
    if(isset($_POST['submit']) && isset($_POST['banda_busca'])){
      if(isset($_SESSION['c_email'])){
        $string_busca = $_POST['banda_busca'];
        echo "<script>window.location = 'busca_banda.php?banda_busca=$string_busca'</script>";
      } else {
        $string_busca = $_POST['banda_busca'];
        echo "<script>window.location = 'busca_banda_public.php?banda_busca=$string_busca'</script>";
      }
    }
?>