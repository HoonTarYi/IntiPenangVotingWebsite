
<!DOCTYPE html>
<html lang="en">

 <?php 
require('Header.php');

?> 

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Insert Options</h2>
							<p>Insert Options to Poll</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

							
								<section id="login" class="content-section text-center">
										 <div class="container">
										   <h1 align="center"><b> Options </b> 
										  </h1>
       
<br>
<!-- Loops to Generate Options Input Field -->
<form action="" method="post">

<?php

include 'dbhpolls.php';
  
  /* Read the value */
	$sql = 'SELECT poll_options FROM polls';
	$result = $conn->query($sql);
	

  /* Fetch the latest poll_options that user latest selected */
while ($row = $result->fetch_assoc()) {
	$poll_options=$row['poll_options'];

}
  /* Loops to Generate Options Input Field  */
for ($x = 1; $x <= $poll_options; $x++) {
    $str ='<input type="text" class="form-control" placeholder="name'.$x.'" value="" name="name'.$x.'"/>';
	echo $str;

		
} 

  /* If the input field value is empty is false means nothing will fetch, 
  when user click submit it will just fetch the data from the user input  */
$name1 = false;
$name2 = false;
$name3 = false;
$name4 = false;
$name5 = false;


if(isset($_POST['name1'])){
$name1 = $_POST['name1'];
}
if(isset($_POST['name2'])){
$name2 = $_POST['name2'];
}
if(isset($_POST['name3'])){
$name3 = $_POST['name3'];
}
if(isset($_POST['name4'])){
$name4 = $_POST['name4'];
}
if(isset($_POST['name5'])){
$name5 = $_POST['name5'];
}
	/* Read the value From Polls Table */
	$sql= 'SELECT id FROM polls';
	$result = $conn->query($sql);
	
	  /* Fetch Last Polls ID that just created by user */
while ($lastid = $result->fetch_assoc()) {
	$getid=$lastid['id'];
}

  /* Insert the options that given by user and send to Poll_Options table*/
    /*If user succesfully send the data to the databse, it will show sucessfull message */
	/* It will also then direct link user to the created polls page */
 if(!empty($_POST['name1'])){
	$sql = "INSERT INTO poll_options (poll_id,name)						
			VALUES ('$getid','$name1')";			
			$result = mysqli_query($conn, $sql);
			print '<p>You have inserted options1.</p>';
			header("Location: polls.php");
}
	 if(!empty($_POST['name2'])){
		$sql = "INSERT INTO poll_options (poll_id,name)						
				VALUES ('$getid','$name2')";			
				$result = mysqli_query($conn, $sql);
				print '<p>You have inserted options2.</p>';
	}
	
		 if(!empty($_POST['name3'])){	
			$sql = "INSERT INTO poll_options (poll_id,name)						
					VALUES ('$getid','$name3')";			
					$result = mysqli_query($conn, $sql);
					print '<p>You have inserted options3.</p>';
		}
		
			 if(!empty($_POST['name4'])){	
				$sql = "INSERT INTO poll_options (poll_id,name)						
						VALUES ('$getid','$name4')";			
						$result = mysqli_query($conn, $sql);
						print '<p>You have inserted options4.</p>';
			}
			
				 if(!empty($_POST['name5'])){	
					$sql = "INSERT INTO poll_options (poll_id,name)						
							VALUES ('$getid','$name5')";			
							$result = mysqli_query($conn, $sql);
							print '<p>You have inserted options5.</p>';
				}
				
					else {
							print '<p>Fill out all fields.</p>';
					}
					
?>
<input type="submit" name="button" value="Submit"/>

</form>
		</section>
				</article>
				
				<?php 
require('Footer.php');

?>
        

</body>

</html>
