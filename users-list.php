<?php
include './db/db-connect.php';
include './include/top.php';
include './pages/users-list.php';
?>
<div class="container">
  <div class="row">
    <div class="col-6 mt-3">
      <h2>Users</h2>
    </div>
    <div class="col-6 mt-3 text-end"><a href="users-create.php" class="btn btn-secondary">Create</a></div>
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
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">email</th>
        <th scope="col">Status</th>
        <th scope="col">Registered At</th>
        <th scope="col">Action</th>
      </tr>
    </thead> 
    <tbody>
      <?php
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td scope="row"><?= $row['id'] ?></td>
          <td scope="row"><?= $row['first_name'] ?></td>
          <td scope="row"><?= $row['last_name'] ?></td>
          <td scope="row"><?= $row['email'] ?></td>
          <td scope="row"><?= $row['status'] ?></td>
          <td scope="row"><?= formattedDateTime($row['created_at']) ?> </td>
          <td><a class="btn btn-primary" href="users-update.php?id=<?= $row['id'] ?>">Edit</a>
            <a class="btn btn-danger" href="users-list.php?id=<?= $row['id'] ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table> 
</div>
<?php include 'include/bottom.php'; ?>