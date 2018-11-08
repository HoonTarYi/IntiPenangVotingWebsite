<?php


include 'dbhpolls.php';

/*
Get the  subjects,start date ,end date and total numbers of options from the form (createpolls.php)
*/
$subject = $_POST['subject'];
$start = $_POST['start'];
$end = $_POST['end'];
$poll_options = $_POST['poll_options'];

/*
Validate if user forget to fill the fields 
*/

	  if(empty($_POST['subject'])){
		  header("Location:../Inti_College_Voting_System/createpolls.php?error=subject");
		
		exit();
	  }
	
 
	 if(empty($_POST['start'])){
		  header("Location:../Inti_College_Voting_System/createpolls.php?error=start");
	
		exit();
	}
	
	if(empty($_POST['end'])){
		  header("Location:../Inti_College_Voting_System/createpolls.php?error=end");
	
		exit();
	}

/*
If all data is filled , it will go 'else' part and insert al the data to the database, poll_system and store in the table,polls
*/


	else {
	
		$sql = "INSERT INTO polls (subject,start,end,poll_options)
								VALUES ('$subject','$start','$end','$poll_options')";
								
			$result = mysqli_query($conn, $sql);
/*
Goes to next page, fill the options 
*/
					header("Location: generateopts.php");	
		
	}
	
?>