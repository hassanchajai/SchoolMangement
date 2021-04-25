<div class="d-flex justify-content-between align-items-center mb-4">
<h1 class="font-weight-bold">
List of Salle
</h1>
<a class="btn btn-primary p-2">Add Salle</a>
</div>
<div class="data">
<table class="table caption-top">
  <thead>
    <tr>
  
      <th scope="col">Libelle</th>
      <th scope="col">Capacity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($salles as $key => $value) : ?>

    <tr>
      <td><?= $value->getLibelle() ?></td>
      <td><?= $value->getCapacity() ?> Person</td>
      <td class="">
      <a class="btn btn-warning">Edit</a>
      <a class="btn btn-danger ml-2" href="salle&status=delete&id=<?= $value->getId() ?>">Delete</a>
      </td>
    </tr>
 <?php endforeach; ?>

   
 
  </tbody>
</table>
</div>
