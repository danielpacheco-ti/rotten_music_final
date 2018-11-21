<?php
session_start();
include("includes/db.php");
include("includes/meths.php");

$id_usuario = retornaIdUsuario();
$id_artista = $_GET['id_artista'];    
$insere_favorito = "insert into favoritos (id_usuario, id_artista) values ('$id_usuario', '$id_artista') ";
$run_favorito= mysqli_query($con, $insere_favorito);

echo "<script>window.open('artista.php?id_artista=$id_artista','_self')</script>";

?>