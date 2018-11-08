<?php
session_start();
include 'dbh.php';


$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$_SESSION['uid'] = $uid;
$sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($conn, $sql);

if(!$row = mysqli_fetch_assoc($result)) {
	header("Location:../Inti_College_Voting_System/signin.php?error=uidpass");
	
}
else {
	
	$_SESSION['id'] = $row['id'];
   $_SESSION['uid'] = $row['uid'];
	
header("Location:index.php");

}


?>