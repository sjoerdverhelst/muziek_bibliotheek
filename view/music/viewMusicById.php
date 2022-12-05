<?php
include "model/modelMusic.php";
include "model/modelAlbums.php";
include "model/modelArtiest.php";

$modelNummers = new modelMusic();
$modelAlbums = new modelAlbums();
$modelArtiest = new modelArtiest();
$showByAlbumId = $modelNummers->showMusicByAlbumId($_GET['album_id']);

$showAlbumByName = $modelAlbums->showAlbumById($showByAlbumId[0]['album_id']);
?>

<h3>Nummers van het album "<?= $showAlbumByName[0]['naam']?>"</h3>

<table class="table w-25">
  <thead>
    <tr>
        <th scope="col">Nummers</th>
        <th scope="col">artiest</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        foreach($showByAlbumId as $r){
            ?><tr><?php
            $showArtiestByName = $modelArtiest->showArtiestById($r['artietst_id']);
          
            print "<td>" . $r['naam'] . "</td>";
            print "<td>" . $showArtiestByName[0]['naam']. "</td>";
            ?></tr><?php
        }
    ?>
   
  </tbody>
</table>