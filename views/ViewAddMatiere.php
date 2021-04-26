<?php 
if(!isset($matiere)):
?>
<form action="matiere&status=store" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Add Group</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" name="libelle"/>
    <button type="submit" class="btn btn-primary btn-block">
        Add
    </button>
</form>
<?php
else:   
 ?>
<form action="matiere&status=update" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Update matiere</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" value="<?= $matiere->getLibelle() ?>" name="libelle"/>
    <input type="hidden" value="<?= $matiere->getId() ?>" name="id">
    <button type="submit" class="btn btn-primary btn-block">
        update
    </button>
</form>
<?php
endif;