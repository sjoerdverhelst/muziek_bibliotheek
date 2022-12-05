<?php
include "model/modelALbums.php";

    $modelAlbums = new modelALbums();
    $getById = $modelAlbums->showAlbumById($_GET['album_id']);

    foreach($getById as $r)
    {
        $id = $r['id'];
        $naam = $r['naam'];
        $jaartal = $r['jaartal'];
    }
?>

<h3>edit album</h3>

<div class="d-flex w-25">
    <form action="model/modelAlbums.php" method="post" class="w-100">
        <input type="hidden" class="form-control" name="id" value="<?=$id?>">
        <div class="mb-3">
            <label class="form-label">Album Naam</label>
            <input type="text" class="form-control" name="naam" value="<?=$naam?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jaartal</label>
            <input type="text" class="form-control" name="Jaartal" value="<?=$jaartal?>">
        </div>
        <div class="mb-3 ">
            <input class="btn btn-primary float-end" type="submit" name="UpdateAlbum" value="Submit">
        </div>
    </form>
</div>