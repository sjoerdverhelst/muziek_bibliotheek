<?php
include "model/modelMusic.php";
include "model/modelAlbums.php";
include "model/modelArtiest.php";

$modelNummers = new modelMusic();
$modelAlbums = new modelAlbums();
$modelArtiest = new modelArtiest();


    $getById = $modelNummers->showNummerById($_GET['editMusic']);

    foreach($getById as $r)
    {
        $id = $r['id'];
        $naam = $r['naam'];
        $artietst_id = $r['artietst_id'];
        $album_id = $r['album_id'];
    }
?>

<h3>edit album</h3>

<div class="d-flex w-25">
    <form action="model/modelMusic.php" method="post" class="w-100">
        <input type="hidden" class="form-control" name="id" value="<?=$id?>">
        <div class="mb-3">
            <label class="form-label">Nummer Naam</label>
            <input type="text" class="form-control" name="naam" value="<?=$naam?>">
            <input type="hidden" name="id"value="<?=$id?>">
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
            <input class="btn btn-primary float-end" type="submit" name="UpdateMusic" value="Submit">
        </div>
    </form>
</div>