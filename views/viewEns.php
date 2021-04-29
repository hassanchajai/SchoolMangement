<div class="d-flex justify-content-between align-items-center mb-4">
<h1 class="font-weight-bold">
List of Enseignants
</h1>
<a class="btn btn-primary p-2" href="ens&status=new">Add Enseignant</a>
</div>
<div class="data">
<table class="table">
  <thead>
    <tr>
  
      <th scope="col">Full name</th>
      <th>Group</th>
      <th>Matiere</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($ens as $key => $value) : ?>

    <tr>

      <td><?= $value->getNom() . " ".$value->getPrenom() ?></td>
      <td><?= $value->getGroup()  ?></td>
      <td><?= $value->getMatiere()  ?></td>
      
      <td class="">
      <a class="btn btn-warning" href="ens&status=edit&id=<?= $value->getId() ?>">Edit</a>
      <a class="btn btn-danger ml-2" href="ens&status=delete&id=<?= $value->getId() ?>&iduser=<?= $value->getIdUser() ?>">Delete</a>
      </td>
    </tr>
 <?php endforeach; ?>

   
 
  </tbody>
</table>
</div>
