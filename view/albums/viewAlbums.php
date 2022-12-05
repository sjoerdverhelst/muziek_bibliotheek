<?php
include "model/modelAlbums.php";

$modelAlbums = new modelAlbums();
$showAll = $modelAlbums->showAllAlbums();
?>

<h1>Albums</h1>

<div class="d-flex w-25">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Album</button>
</div>

<table class="table w-25">
  <thead>
    <tr>
        <th class="col">ALbum</th>
        <th class="col">Jaartal</th>
        <th class="col">Nummers</th>
        <th class="col">Edit</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex w-100">
            <form action="" class="w-100">
                <div class="mb-3">
                    <label class="form-label">Album Naam</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jaartal</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" >
                </div>
                <div class="mb-3 ">
                    <button class="btn btn-primary float-end" type="submit">Opslaan</button>
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

