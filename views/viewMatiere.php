<div class="d-flex justify-content-between align-items-center mb-4">
<h1 class="font-weight-bold">
List of Matiere
</h1>
<a class="btn btn-primary p-2" href="matiere&status=new">Add Matiere</a>
</div>
<div class="data">
<table class="table caption-top">
  <thead>
    <tr>
  
      <th scope="col">Libelle</th>
     
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  foreach ($matiere as $key => $value) : ?>

    <tr>
      <td><?= $value->getLibelle() ?></td>
      
      <td class="">
      <a class="btn btn-warning" href="Matiere&status=edit&id=<?= $value->getId() ?>">Edit</a>
      <a class="btn btn-danger ml-2" href="Matiere&status=delete&id=<?= $value->getId() ?>">Delete</a>
      </td>
    </tr>
 <?php endforeach; ?>

   
 
  </tbody>
</table>
</div>
