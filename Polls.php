<?php
session_start();
?>

<head>
		<title>Elements - Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Spectral</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li><a href="generic.html">Generic</a></li>
											<li><a href="elements.html">Elements</a></li>
											<li><a href="createpolls.php">Create Polls</a></li>
											<li><a href="polls.php">Polls</a></li>
											<li><a href="userdetails.php">Members</a></li>
											<li><a href="charts.php">Charts</a></li>
											<li><a href="register.php">Register</a></li>
											<li><a href="signin.php">Log In</a></li>
											<li><?php
													if (isset($_SESSION['id'])){
														echo "<form action='logout.php' >
														<button type=submit class='btn btn-primary'> LOG OUT </button>
															</form>";
										 
																				}
														else {
														echo "You have not logged in";

																}
													?> 
									</div>
								</li>
							</ul>
						</nav>
					</header></li>
										</ul>
					
					<!-- Main -->
					<article id="main">
						<header>
							<h2>Polls</h2>
							<p>Vote your only one vote to your option.</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
   

 <section id="login" class="content-section text-center">
             <div class="container">
               <h1 align="center"><b> Polls </b> 
			  </h1>
			<form method="post" action="#">
	<style>
ul {
    list-style-type: none;    
	margin: 0;
    padding: 0;
}
ul li {
    margin-bottom:2px;
    padding:2px;
     
}
a:hover, a:active, a:focus, a:visited {
    text-decoration: none;
} 
</style>
<?php 
echo "Today is " . date("Y-m-d") . "<br>";
echo "The time is " . date("h:i:sa");

include 'dbhpolls.php';

$sql = 'SELECT end FROM polls';
	$result = $conn->query($sql);
	
while ($row = $result->fetch_assoc()) {

	$enddate=$row['end'];

}

if ($enddate < date("Y-m-d"). date("h:i:sa"))
{
	
	header("Location: index.php");

}

else 
{
		print '<p>The Polls still can be vote.</p>';
}
?>

<form id="regForm" action="" method="POST">	
			  
		<label class="col-xs-2 control-label" for="inputWarning" name="poll_views">Which Polls do you want to show?</label>
		<input type="text"  class="form-control" name="poll_views" placeholder="polls" value="" />
<br>
			<input type="submit" name="button" value="Submit"/> 
			</form>			
			
<?php
    //include and initialize Poll class 
    include 'Poll.class.php';
    $poll = new Poll;

    //get poll and options data
    $pollData = $poll->getPolls();

?>
<div class="pollContent">
    <?php echo !empty($statusMsg)?'<p class="stmsg">'.$statusMsg.'</p>':''; ?>
    <form action="" method="post" name="pollFrm">
    <h3><?php echo $pollData['poll']['subject']; ?></h3>
    <ul>
	
        <?php foreach($pollData['options'] as $opt){
            echo '<li><input type="radio" name="voteOpt" value="'.$opt['id'].'" >'.$opt['name'].'</li>';
        } ?>
    </ul>
    <input type="hidden" name="pollID" value="<?php echo $pollData['poll']['id']; ?>">
    <input type="submit" name="voteSubmit" class="button" value="Vote">
    <a href="results.php?pollID=<?php echo $pollData['poll']['id']; ?>">Results</a>
    </form>
</div>
		
		<?php
				//if vote is submitted
				if(isset($_POST['voteSubmit'])){
					$voteData = array(
						'poll_id' => $_POST['pollID'],
						'poll_option_id' => $_POST['voteOpt']
					);
					//insert vote data
					$voteSubmit = $poll->vote($voteData);
					if($voteSubmit){
						//store in $_COOKIE to signify the user has voted
						setcookie($_POST['pollID'], 1, time()+60*60*24*365);
						
						$statusMsg = 'Your vote has been submitted successfully.';
					}else{
						$statusMsg = 'Your vote already had submitted.';
					}
				}
				
				?>
			</section>
				
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
