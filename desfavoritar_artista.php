<?php
session_start();
include("includes/db.php");
include("includes/meths.php");

$id_usuario = retornaIdUsuario();
$id_artista = $_GET['id_artista'];
$remove_favorito = "delete from favoritos where id_usuario = '$id_usuario' and id_artista = '$id_artista'";
$run_favorito= mysqli_query($con, $remove_favorito);

echo "<script>window.open('artista.php?id_artista=$id_artista','_self')</script>";

?>