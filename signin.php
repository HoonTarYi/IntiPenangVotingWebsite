

<!DOCTYPE html>
<html lang="en">

 <?php 
require('Header.php');

?> 

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Log In</h2>
							<p>Log In As a Member, to vote your favourite choice in the polls.</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
   



   
    <section id="login" class="content-section text-center">
             <div class="container">
               <h1 align="center"><b> Login </b> 
			  </h1>
       
<br>
      
<form class="form-horizontal" action="signindb.php" method="POST">
    <div class="form-group">
    <label class="col-xs-2 control-label" for="inputSuccess" >Username</label>
                <div class="col-xs-10">
                    <input type="text"  class="form-control" name="uid" placeholder="Username" />
                    
                    
                </div>
</div>
<br>
    <div class="form-group">
        <label for="inputPassword" class="control-label col-xs-2">Password</label>
         <div class="col-xs-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pwd" >
       
         </div>
    </div>
	
<br><br>
    <div class="form-group">
        <div class="col-6 col-12-small">
		<input type="checkbox" id="demo-human" name="demo-human" checked>
             <label for="demo-human"> Remember Me </label>
         </div>
    </div>
    </div>
     <div class="form-group">
        <div class="col-xs-offset-2 col-xs-2">
            <button type="submit" class="button primary">Login</button>
			
        </div>
         </div>
		 
	</form>   	
		</section>
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
