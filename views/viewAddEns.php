<?php
// if(!isset($matiere)):
// 
?>
<form action="ens&status=store" method="POST" class="form-group ">
    <h2 class="mb-4">Add Enseignant</h2>
    <hr>
    <h4 class="mb-3">Enseignant Information :</h4>
    <label for="nom" class="mb-2">Nom :</label>
    <input type="text" class="form-control mb-2" name="nom" required />
    <!--  -->
    <label for="prenom" class="mb-2">Prenom :</label>
    <input type="text" class="form-control mb-2" name="prenom" required />
    <!--  -->
    <label for="Group" class="mb-2">Group :</label>
    <select name="idgroup" class="form-control mb-2">
        <option  disabled value="0" selected>select group</option>
        <?php 
        foreach ($grps as $key => $value) {
            echo "<option value='".$value->getId()."'>".$value->getLibelle()."</option>";
        }
        ?>
    </select>
    <!--  -->
    <label for="matiere" class="mb-2">Matiere :</label>
    <select name="idmatiere" class="form-control mb-2">
        <option disabled value="0" selected>select matiere</option>
        <?php 
        foreach ($matiere as $key => $value) {
            echo "<option value='".$value->getId()."'>".$value->getLibelle()."</option>";
        }
        ?>
    </select>
    <!--  -->
    <hr>
    <!--  -->
    <h4 class="mb-3">Login Detail :</h4>
    <label for="username" class="mb-2">Username :</label>
    <input type="text" class="form-control mb-2" name="username" required />
    <!--  -->
    <label for="email" class="mb-2">Email :</label>
    <input type="text" class="form-control mb-2" name="email" required />
    <!--  -->
    <label for="pwd" class="mb-2">Password :</label>
    <input type="text" class="form-control mb-2" name="pwd" required />
    <!--  -->
    <label for="confirm-pwd" class="mb-2">Re-Enter Password :</label>
    <input type="text" class="form-control mb-3" name="confirm-pwd" required />
    <!--  -->
    <button type="submit" class="btn btn-primary py-2 px-4">
        Add
    </button>
</form>
<!-- <?php
        // else:   
        ?>
<form action="matiere&status=update" method="POST" class="form-group w-75 mx-auto pt-5">
    <h2 class="mb-4">Update matiere</h2>
    <label for="libelle" class="mb-2">Libelle :</label>
    <input type="text" class="form-control mb-2" value="" name="libelle"/>
    <input type="hidden" value="" name="id">
    <button type="submit" class="btn btn-primary btn-block">
        update
    </button>
</form>
<?php
