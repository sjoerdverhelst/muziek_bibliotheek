<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- inport bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
    <!-- inport bootstrap icons   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Muziek Bibliotheek</title>
</head>
<body>
    <?php 
        include "templates/navbar.php";
        include "model/connection.php";
       ?>
       <!-- padding voor heel deze div van 1.0rem elke 1 of 2 of 3 staat voor 0.5rem -->
        <div class="p-2">
            <?php
                if(isset($_GET['page'])){
                    if($_GET['page'] == "Home"){
                        include "view/viewHome.php";
                    }
                    if($_GET['page'] == "album"){
                        include "view/albums/viewALbums.php";
                    }
                    if($_GET['page'] == "editalbum"){
                        include "view/albums/viewEditALbum.php";
                    }
                    if($_GET['page'] == "music"){
                        include "view/music/viewMusic.php";
                    }
                    if($_GET['page'] == "editMusic"){
                        include "view/music/viewEditMusic.php";
                    }
                    

                }elseif(isset($_GET['album_id'])){
                    include "view/music/viewMusicById.php";
 
                }elseif(isset($_GET['deleteAlbum'])){
                    include "model/modelAlbums.php";
                    $modelAlbums = new modelAlbums();
                    $modelAlbums->deleteAlbum($_GET['deleteAlbum']);
                }elseif(isset($_GET['deleteMusic'])){
                    include "model/modelMusic.php";
                    $modelNummers = new modelMusic();
                    $modelNummers->deleteNummer($_GET['deleteMusic']);
                }else{
                    include "view/viewHome.php";
                }

            ?>
        </div>
       <?php
    ?>
</body>
</html>