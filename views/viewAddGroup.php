<?php 
if(!isset($group)):
?>
<form action="Group&status=store" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Add Group</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" name="libelle"/>
    <label for="libelle" class="mb-2">Capacity :</label>
    <input type="text" class="form-control mb-2" name="effectif" />
    <button type="submit" class="btn btn-primary btn-block">
        Add
    </button>
</form>
<?php
else:   
 ?>
<form action="Group&status=update" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Update Group</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" value="<?= $group->getLibelle() ?>" name="libelle"/>
    <label for="libelle" class="mb-2">Capacity :</label>
    <input type="text" class="form-control mb-2" value="<?= $group->getEffectif() ?>" name="effectif" />
    <input type="hidden" value="<?= $group->getId() ?>" name="id">
    <button type="submit" class="btn btn-primary btn-block">
        update
    </button>
</form>
<?php
endif;
?>