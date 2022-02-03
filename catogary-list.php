<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/catogary-list.php';
?>
<div class="container">
  <div class="row">
    <div class="col-6 mt-3">
      <h2>Catogary</h2>
    </div>
    <div class="col-6 mt-3 text-end"><a href="catogary-add.php" class="btn btn-secondary">Add Catogary</a></div>
  </div>
  <?php
  if ($message) {
  ?>
    <div class="alert alert-danger mt-3" role="alert">
      <?= $message ?>
    </div>
  <?php }
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Catogary Name</th>        
        <th scope="col">Parent catogary</th>        
        <th scope="col">Created at</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td scope="row"><?= $row['id'] ?></td>
          <td scope="row"><?= $row['catogary_name'] ?></td>
          <td scope="row"><?php  ?></td>
          <td scope="row"><?= formattedDateTime($row['created_at']) ?> </td>
          <td><a class="btn btn-primary" href="catogary-update.php?id=<?= $row['id'] ?>">Edit</a>
            <a class="btn btn-danger" href="catogary-list.php?id=<?= $row['id'] ?>">Delete</a>
          </td>
        </tr> 
      <?php } ?>
    </tbody>
  </table>
</div>
<?php include 'include/bottom.php'; ?>