<?php 
if(!isset($salle)):
?>
<form action="salle&status=store" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Add Salle</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" name="libelle"/>
    <label for="libelle" class="mb-2">Capacity :</label>
    <input type="text" class="form-control mb-2" name="capacity" />
    <button type="submit" class="btn btn-primary btn-block">
        Add
    </button>
</form>
<?php
else:   
 ?>
<form action="salle&status=update" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Update Salle</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" value="<?= $salle->getLibelle() ?>" name="libelle"/>
    <label for="libelle" class="mb-2">Capacity :</label>
    <input type="text" class="form-control mb-2" value="<?= $salle->getCapacity() ?>" name="capacity" />
    <input type="hidden" value="<?= $salle->getId() ?>" name="id">
    <button type="submit" class="btn btn-primary btn-block">
        update
    </button>
</form>
<?php
endif;
?>