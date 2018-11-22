<?php
session_start();
include("includes/db.php");
// include("includes/meths.php");

$a_nome = $_GET['artista'];
$busca_artista = "select * from artista where nome='$a_nome'";
$run_busca = mysqli_query($con, $busca_artista);
$artista_check = mysqli_num_rows($run_busca);
if($artista_check > 0){
    while($record=mysqli_fetch_array($run_busca)){
        $id_artista = $record['id'];
        $get_albuns="select * from discos where id_artista='$id_artista'";
        $run_albuns = mysqli_query($con, $get_albuns);
        $discos = array();
        while($record=mysqli_fetch_array($run_albuns)){
            $discos[] = $record['id'];
            $discos[] = $record['nome'];
        }
    }
}
print json_encode($discos)
?>