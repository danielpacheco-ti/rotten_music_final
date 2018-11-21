<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
        </div>
        <div class="content">
            <div class="author">
                <a href="artista.php?id_artista=<?php echo $id_artista; ?>">
                    <img class="avatar border-gray" src="artist_pictures/<?php echo $foto; ?>" alt="..."/>
                    <h4 class="title"><?php echo $nome; ?><br />
                        <small><?php echo $genero; ?></small><br />
                    </h4>
                </a>
            </div>
            <p class="description text-center">
                <?php 
                    $id_usuario = retornaIdUsuario();
                    $busca_favorito = "select * from favoritos where id_usuario=$id_usuario";
                    $run_busca = mysqli_query($con, $busca_favorito);
                    $favoritos = array();
                    while($record=mysqli_fetch_array($run_busca)){
                        $favoritos[] = $record['id_artista'];
                    }
                    if(in_array($id_artista, $favoritos)){
                         echo "<a href='desfavoritar_artista.php?id_artista=$id_artista'>
                                    <br><button class='btn btn-info btn-fill' size='4'>Desfavoritar</button>
                                </a><br>";
                    } else {
                         echo "<a href='favoritar_artista.php?id_artista=$id_artista'>
                                    <br><button class='btn btn-info btn-fill' size='4'>Favoritar</button>
                                </a><br>";
                    }

                ?>
                <a href="denuncia.php?id_artista=<?php echo $id_artista; ?>">
                    <br><button type="submit" name="submit" class="btn btn-danger btn-fill" size='4'>Denunciar</button>
                </a>
            </p>
        </div>
    <hr>
    <div class="text-center">
        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
        <button href="#" class="btn btn-simple"><i class="fa fa-instagram"></i></button>
    </div>
</div>
</div>