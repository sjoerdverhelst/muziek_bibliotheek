<?php
include "model/modelAlbums.php";

$modelAlbums = new modelAlbums();
$showAll = $modelAlbums->showAllAlbums();

if (isset($_GET['deleted'])) {
  $modelAlbums->deleteAlbum($_GET['deleted']);
}
?>

<h1>Albums</h1>

<div class="d-flex w-25">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Album</button>
</div>

<table class="table w-50">
  <thead>
    <tr>
        <th class="col">ALbum</th>
        <th class="col">Jaartal</th>
        <th class="col">Nummers</th>
        <th class="col"></th>
        <th class="col"></th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        foreach($showAll as $r){
            ?><tr><?php
                print "<td>" . $r['naam'] . "</td>";
                print "<td>" . $r['jaartal']. "</td>";
                print "<td> <a class='btn btn-sm btn-primary' href='?album_id=" .$r['id']. "'><i class='bi bi-music-note'></i></a> </td>";
                print "<td> <a class='btn btn-sm btn-primary' href='?page=editalbum&album_id=". $r['id']."'>Edit</a> </td>";
                print "<td> <a class='btn btn-sm btn-danger' href='?deleteAlbum=". $r['id']."'>Delete</a> </td>";
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
        <h5 class="modal-title" id="exampleModalLabel">Album Toevoegen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex w-100">
            <form action="model/modelAlbums.php" method="post" class="w-100">
                <div class="mb-3">
                    <label class="form-label">Album Naam</label>
                    <input type="text" class="form-control" name="naam">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jaartal</label>
                    <input type="text" class="form-control" name="jaartal" >
                </div>
                <div class="mb-3 ">
                  <input class="btn btn-primary float-end" type="submit" name="AddAlbum" value="Opslaan">
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

