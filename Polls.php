<?php
session_start();
?>

<head>
		<title>INTI COLLEGE PEANANG ONLINE VOTING SYSTEM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
		<link rel="stylesheet" href="assets/css/polls.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index(members).php">Home</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index(members).php">Home</a></li>
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

<?php 
date_default_timezone_set("Singapore");
echo "Today is " . date("Y-m-d") . "<br>";
echo "The time is " . date("h:i:sa");

include 'dbhpolls.php';

$sql = 'SELECT start,end FROM polls';
	$result = $conn->query($sql);
	
while ($row = $result->fetch_assoc()) {

	$enddate=$row['end'];
	$startdate=$row['start'];

}
if ($startdate > date("Y-m-d"). date("h:i:sa"))
{
	
	header("Location: index.php");

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

			
<?php

    //include and initialize Poll class 
    include 'Poll.class.php';
    $poll = new Poll;
	 $poll2 = new Poll;


    //get poll and options data
    $pollData = $poll->getPolls();
	 $pollData2 = $poll2->getPolls2();

?>
<!-- First Polls-->
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

<!-- Latest Created Polls-->
<div class="pollContent">
    <?php echo !empty($statusMsg)?'<p class="stmsg">'.$statusMsg.'</p>':''; ?>
    <form action="" method="post" name="pollForm">
    <h3><?php echo $pollData2['poll2']['subject']; ?></h3>
    <ul>
	
        <?php foreach($pollData2['options'] as $opt){
            echo '<li><input type="radio" name="voteOpt2" value="'.$opt['id'].'" >'.$opt['name'].'</li>';
        } ?>
    </ul>
    <input type="hidden" name="pollID2" value="<?php echo $pollData2['poll2']['id']; ?>">
    <input type="submit" name="voteSubmit2" class="button" value="Vote">
    <a href="results.php?pollID=<?php echo $pollData2['poll2']['id']; ?>">Results</a>
    </form>
</div>

<!-- Function to save the vote From First Polls-->		
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
<!-- Function to save the vote From Lastest Polls-->					
				<?php
				//if vote is submitted
				if(isset($_POST['voteSubmit2'])){
					$voteData2 = array(
						'poll_id' => $_POST['pollID2'],
						'poll_option_id' => $_POST['voteOpt2']
					);
					//insert vote data
					$voteSubmit2 = $poll2->vote($voteData2);
					if($voteSubmit2){
						//store in $_COOKIE to signify the user has voted
						setcookie($_POST['pollID2'], 1, time()+60*60*24*365);
						
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
