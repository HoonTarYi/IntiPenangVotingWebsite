<?php
session_start();
?>

<head>
		<title>INTI COLLEGE PEANANG ONLINE VOTING SYSTEM</title>
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
						<h1><a href="index.php">Home</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li><a href="generic.html">Generic</a></li>
											<li><a href="elements.html">Elements</a></li>
											<li><a href="polls.php">Polls</a></li>
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

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>Inti Penang Free Online Voting Website</h2>
							<p>A Free Voting Website for all students who study in INTI Penang.</p>
								 <h3> <?php 
											$url = "htttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
											
											if (strpos($url, 'error=uidpass') !== false) {
												echo "Your username or password is incorrect!";
											}
											
										   else if(!isset($_SESSION['uid'])  || empty($_SESSION['uid'])) {
												echo 'Welcome Guest.';
													} else {
												echo 'Welcome ' . $_SESSION['uid'];
															}; 
										 ?>
								</h3>
							<ul class="actions special">
								<li><a href="signin.php" class="button primary">Sign In</a></li>
							</ul>
						</div>
						<a href="#one" class="more scrolly">Learn More</a>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								<h2>Admin Permission</h2>
								<p>There will be some features are just for the admin<br />
								Examples: Create Polls, Manage Voters and Summarized Chart and Graph.</p>
							</header>
							<ul class="icons major">
								<li><span class="icon fa-pencil major style1"><span class="label">Create</span></span></li>
								<li><span class="icon fa-heart-o major style2"><span class="label">Love</span></span></li>
								<li><span class="icon fa-code major style3"><span class="label">Coding</span></span></li>
							</ul>
						</div>
					</section>

				<!-- Two -->
					<section id="two" class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="images/pic01.jpg" alt="" /></div><div class="content">
								<h2><a href="createpolls.php">Create Polls<br />
								Add Options</a></h2>
								<p>This Function is just can use by admin. Admin can create their own polls to let user vote the options.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="images/vote.jpg" alt="" /></div><div class="content">
								<h2><a href="userdetails.php">Manage Voters</a></h2>
								<p>Edit,Delete & Block the voters. Admin can check their basic details of each voters. Voters who have the sam ip adress and voted twice will be blocked by the admin.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="images/result.jpg" alt="" /></div><div class="content">
								<h2>Summarized Chart and Graph</h2>
								<p>After the polls is ended,the result will be generate the graph and charts for the admin. Voters just can access the site to see the result.</p>
							</div>
						</section>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style3 special">
						<div class="inner">
							<header class="major">
								<h2>Voters Features</h2>
								<p>After introducing about admin view, there are some features for voters too.</p>
							</header>
							<ul class="features">
								<li class="icon fa-paper-plane-o">
									<h3>Vote!</h3>
									<p>Voters can vote their favourite option in each polls.After the polls ended, they will be no more chance to vote.</p>
								</li>
								<li class="icon fa-laptop">
									<h3>Result</h3>
									<p>Voter can check the result when the polls is ended. </p>
								</li>
								</ul>
						</div>
					</section>	
					

				<?php 
require('Footer.php');

?>


	</body>
</html>