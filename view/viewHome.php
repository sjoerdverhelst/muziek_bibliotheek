<?php
include "model/modelMusic.php";
include "model/modelAlbums.php";
include "model/modelArtiest.php";

$modelNummers = new modelMusic();
$modelAlbums = new modelAlbums();
$modelArtiest = new modelArtiest();

$showAllNummers = $modelNummers->showAllNummersDESC5();
$showALbums = $modelAlbums->showAllAlbumsDESC();
?>

<h3>Recente toegevoegd</h3>
<!-- 
    uitleg gebruik van boodstrap 5
    mt is margin top 5 staat gelijk aan 3rem
    d-flex staat gelijk aan display:flex;
    w-50 staat voor width:50%;
    p van padding en e van END 2 van 0.5rem
    d-block van display block zodat ze onder elkaar komen
    class table is dat het een table moet zijn coll zorgt er voor dat alles in die rij de gelijke breedte heeft  
-->
<div class="d-flex w-75 mt-5">
    <div class="d-block w-50 pe-2">
        <h5>Recent Toegevoegde Nummers</h5>
        <table class="table ">
          <thead>
            <tr>
                <th class="col">Nummers</th>
                <th class="col">Artiest</th>
                <th class="col">ALbum</th>
            </tr>
          </thead>
          <tbody>
           
            <?php
                foreach($showAllNummers as $r){
                    ?><tr><?php
                        $showAlbumByName = $modelAlbums->showAlbumById($r['album_id']);
                        $showArtiestByName = $modelArtiest->showArtiestById($r['artietst_id']);
                       
                        print "<td>" . $r['naam'] . "</td>";
                        print "<td>" . $showArtiestByName[0]['naam']. "</td>";
                        print "<td>" . $showAlbumByName[0]['naam']. "</td>";
                        // print "<td> <a href='?page=album?nummer_id=" .$r['id']. "'><i class='bi bi-music-note'></i></a> </td>"
                    ?></tr><?php
                }
            ?>
           
          </tbody>
        </table>
    </div>

    <div class="d-block w-50 ps-2">
        <h5>Recent Toegevoegde Albums</h5>
        <table class="table">
            <thead>
                <tr>
                    <th class="col">ALbum</th>
                    <th class="col">Jaartal</th>
                    <th class="col">Nummers</th>
                </tr>
            </thead>
            <tbody>
            
                <?php
                    foreach($showALbums as $r){
                        ?><tr><?php
                            print "<td>" . $r['naam'] . "</td>";
                            print "<td>" . $r['jaartal']. "</td>";
                            print "<td> <a href='?album_id=" .$r['id']. "'><i class='bi bi-music-note'></i></a> </td>"
                        ?></tr><?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

