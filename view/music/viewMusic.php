<?php
include "model/modelMusic.php";
include "model/modelAlbums.php";
include "model/modelArtiest.php";

$modelNummers = new modelMusic();
$modelAlbums = new modelAlbums();
$modelArtiest = new modelArtiest();

$showAllNummers = $modelNummers->showAllNummers();
?>

<h1>Music</h1>

<div class="d-flex w-25">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Music</button>
</div>

<table class="table w-50">
  <thead>
    <tr>
        <th scope="col">Nummers</th>
        <th scope="col">Artiest</th>
        <th scope="col">ALbum</th>
        <th></th>
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
                print "<td> <a class='btn btn-sm btn-primary' href='?page=editMusic&editMusic=". $r['id']."'>Edit</a> </td>";
                print "<td> <a class='btn btn-sm btn-danger' href='?deleteMusic=". $r['id']."'>Delete</a> </td>";
                // print "<td> <a href='?page=album?nummer_id=" .$r['id']. "'><i class='bi bi-music-note'></i></a> </td>"
            ?></tr><?php
        }
    ?>
   
  </tbody>
</table>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nummer toevoegen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex w-100">
            <form action="model/modelMusic.php" method="post" class="w-100">
                <div class="mb-3">
                    <label class="form-label">Nummer Naam</label>
                    <input type="text" class="form-control" name="naam">
                </div>
                <div class="mb-3">
                    <label class="form-label">Selecteer ALbum</label>
                    <select name='album_id' class="form-select" aria-label="Default select example">
                      <?php
                          $showAllALbums = $modelAlbums->showAllAlbums();
                          foreach($showAllALbums as $r)
                          {
                            print"<option value=".$r["id"].">".$r["naam"]."</option>";
                          }
                      ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Selecteer Artiest</label>
                    <select name='artiest_id' class="form-select" aria-label="Default select example">
                      <?php
                          $showAllALbums = $modelArtiest->showAll();
                          foreach($showAllALbums as $r)
                          {
                            print"<option  value=".$r["id"].">".$r["naam"]."</option>";
                          }
                      ?>
                    </select>
                </div>
                <div class="mb-3 ">
                <input class="btn btn-primary float-end" type="submit" name="AddMusic" value="Opslaan">
                </div>
            </form>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

