<div class="d-flex justify-content-between align-items-center mb-4">
<h1 class="font-weight-bold">
List of Group
</h1>
<a class="btn btn-primary p-2" href="group&status=new">Add Group</a>
</div>
<div class="data">
<table class="table caption-top">
  <thead>
    <tr>
  
      <th scope="col">Libelle</th>
      <th scope="col">Effectif</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($groups as $key => $value) : ?>

    <tr>
      <td><?= $value->getLibelle() ?></td>
      <td><?= $value->getEffectif() ?> Person</td>
      <td class="">
      <a class="btn btn-warning" href="group&status=edit&id=<?= $value->getId() ?>">Edit</a>
      <a class="btn btn-danger ml-2" href="group&status=delete&id=<?= $value->getId() ?>">Delete</a>
      </td>
    </tr>
 <?php endforeach; ?>

   
 
  </tbody>
</table>
</div>
