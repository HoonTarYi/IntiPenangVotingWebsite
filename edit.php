<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['uid'])  && isset($_POST['email']) && isset($_POST['pwd'] )&& isset($_POST['cpwd']) ) {
  $uid = $_POST['uid'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $cpwd = $_POST['cpwd'];
  $sql = 'UPDATE users SET uid=:uid, email=:email, pwd=:pwd, cpwd=:cpwd WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':uid' => $uid, ':pwd' => $pwd, ':cpwd' => $cpwd, ':email' => $email, ':id' => $id ])) {

    header("Location: userdetails.php");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->uid; ?>" type="text" name="uid" id="name" class="form-control">
        </div>
		 <div class="form-group">
          <label for="name">Password</label>
          <input value="<?= $person->pwd; ?>" type="text" name="pwd" id="pwd" class="form-control">
        </div>
		 <div class="form-group">
          <label for="name">Confirm Password</label>
          <input value="<?= $person->cpwd; ?>" type="text" name="cpwd" id="cpwd" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
