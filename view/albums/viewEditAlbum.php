<?php
include "model/modelALbums.php";

    $modelAlbums = new modelALbums();
    $getById = $modelAlbums->showAlbumById($_GET['album_id']);

    foreach($getById as $r)
    {
        $naam = $r['naam'];
        $jaartal = $r['jaartal'];
    }
?>

<h3>edit album</h3>

<div class="d-flex w-25">
    <form action="" class="w-100">
        <div class="mb-3">
            <label class="form-label">Album Naam</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$naam?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jaartal</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$jaartal?>">
        </div>
        <div class="mb-3 ">
            <button class="btn btn-primary float-end" type="submit">Opslaan</button>
        </div>
    </form>
</div>