<?php
include "model/modelMusic.php";
include "model/modelAlbums.php";

$modelNummers = new modelMusic();
$showAllNummers = $modelNummers->showAllNummers();

$modelAlbums = new modelAlbums();
?>

<h1>Music</h1>

<table class="table w-25">
  <thead>
    <tr>
        <th scope="col">Nummers</th>
        <th scope="col">Artiest</th>
        <th scope="col">ALbum</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        foreach($showAllNummers as $r){
            ?><tr><?php
                $showAlbumByName = $modelAlbums->showAlbumNameById($r['album_id']);
               
                print "<td>" . $r['naam'] . "</td>";
                print "<td>" . $r['artietst_id']. "</td>";
                print "<td>" .  $showAlbumByName[0]['naam']. "</td>";
                // print "<td> <a href='?page=album?nummer_id=" .$r['id']. "'><i class='bi bi-music-note'></i></a> </td>"
            ?></tr><?php
        }
    ?>
   
  </tbody>
</table>

