  <?php
 include("includes/db.php");

    function retornaIdUsuario(){
        global $con;
        if(isset($_SESSION['c_email'])){
            $email = $_SESSION['c_email'];
            $seleciona_usuario = "select * from usuario where email ='$email'";
            $run_usuario = mysqli_query($con, $seleciona_usuario);
            $row_id = mysqli_fetch_array($run_usuario);
            $id = $row_id['id'];
            return $id;
        }
        return;
    }

     function retornaIdDisco(){
        global $con;
        if(isset($_POST['album'])){
            $album = $_POST['album'];
            $seleciona_album = "select * from discos where nome ='$album'";
            $run_album = mysqli_query($con, $seleciona_album);
            $row_id = mysqli_fetch_array($run_album);
            $id = $row_id['id'];
            return $id;
        }
        return;
    }

    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>

<Script Language="JavaScript">
    function albumfiller(what) { 
        if (what.value != '') { 
            var banda = what.value; 
            document.location=('resenha.php?artista=' + banda); 
        } 
    } 
</Script>
