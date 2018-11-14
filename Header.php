<?php
session_start();
?>

<head>
		<title>INTI COLLEGE PENANG ONLINE VOTING SYSTEM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
										
					
					

