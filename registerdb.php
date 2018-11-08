<?php

include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];
$email = $_POST['email'];
$addr = $_POST['addr'];
$roles = $_POST['roles'];
$ip = $_POST['ip'];
$country = $_POST['country'];




    if(empty($_POST['uid'])){

	     header("Location:../Inti_College_Voting_System/register.php?error=username");
		
		exit();
	}
	
	//Validate the password 
	if (empty($_POST['pwd'])){
		 header("Location:../Inti_College_Voting_System/register.php?error=pwd");
	
		exit();
	}
	
	
	//Check the two passwords for equality:
	if ($_POST['pwd'] != $_POST['cpwd']) {
		  header("Location:../Inti_College_Voting_System/register.php?error=cpwd");
		
		exit();
	}
	
    if(empty($_POST['email'])){
		  header("Location:../Inti_College_Voting_System/register.php?error=email");
		
		exit();
	}
	

	 if(empty($_POST['addr'])){
		  header("Location:../Inti_College_Voting_System/register.php?error=addr");
	
		exit();
	}
	
	
	else {
		$sql= "SELECT uid FROM users WHERE uid='$uid'";
		$result = mysqli_query($conn, $sql);
		$uidcheck = mysqli_num_rows($result);
		if($uidcheck > 0) {
			 header("Location:../Inti_College_Voting_System/register.php?error=uid");
			print '<p class="error">Username Existed!.</p>';
			exit();
		} 
		//If there were no errors, print a success message: 
		else {
			$sql = "INSERT INTO users (uid,pwd,cpwd,email,addr,ip,country,roles)
			VALUES ('$uid','$pwd','$cpwd','$email','$addr','$ip','$country','$roles')";
			$result = mysqli_query($conn, $sql);
			
			//1 for voters 0 for admin
			//need create two different polls page for different roles
			//if($roles = 1) {
			 //header("Location: polls.php");
			
			print '<p>You have been successfully registered.</p>';
			header("Location: signin.php");
		}
	}	
	
?>