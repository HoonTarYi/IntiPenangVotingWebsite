
<!DOCTYPE html>
<html lang="en">

 <?php 
require('Header.php');

?> 

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Users Details</h2>
							<p>Log In As a Member, to vote your favourite choice in the polls.</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
   



   
    <section id="login" class="content-section text-center">
             <div class="container">
               <h1 align="center"><b> User Details</b> 
			  </h1>
       
<br>

<?php 

require 'db.php';
  
  /* Read the value */
	$sql = 'SELECT * FROM users';
	$statement = $connection->prepare($sql);
	$statement->execute();
	$people = $statement->fetchAll(PDO::FETCH_OBJ);
	
	

	
?>
<?php 

$url = "htttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
																				
include 'dbh.php';
  
  /* Select Name with Admin roles From users table */
	$sql = 'SELECT * FROM users WHERE roles IN ("participants")';
	$result = mysqli_query($conn, $sql);
	/*List all the result from the sql */
	
	while ($row = $result->fetch_assoc()) {
				/* If the log in user name is equal to the username who is participants it will run to home page 
				To Prevent normal user can edit the registred user database.			*/

				if ($row['uid'] == $_SESSION['uid'] ){
					header("Location: index(members).php");	
						break;
						
						
				}

				/* If you are adminn it will not jump to home page */
						
}

	?>

										
<!-- Table For show the registered users basic information -->	
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Members</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
		  <th>Password</th>
		  <th>Confirm Password</th>
          <th>Email</th>
		   <th>Roles</th>
		   <th>IP Address</th>
		   <th>Country</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->uid; ?></td>
			<td><?= $person->pwd; ?></td>
			<td><?= $person->cpwd; ?></td>
            <td><?= $person->email; ?></td>
			<td><?= $person->roles; ?></td>
			 <td><?= $person->ip; ?></td>
			 <td><?= $person->country; ?></td>
            <td>
			<!-- Function for Edit and Delete the registered user -->
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

</div>

			</section>
				</article>
				
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
        

</body>

</html>
