<?php
include "model/modelAlbums.php";

$modelAlbums = new modelAlbums();
$showAll = $modelAlbums->showAllAlbums();
?>

<h1>Albums</h1>

<table class="table w-25">
  <thead>
    <tr>
        <th scope="col">ALbum</th>
        <th scope="col">Jaartal</th>
        <th scope="col">Nummers</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        foreach($showAll as $r){
            ?><tr><?php
                print "<td>" . $r['naam'] . "</td>";
                print "<td>" . $r['jaartal']. "</td>";
                print "<td> <a href='?page=album?album_id=" .$r['id']. "'><i class='bi bi-music-note'></i></a> </td>"
            ?></tr><?php
        }
    ?>
   
  </tbody>
</table>

