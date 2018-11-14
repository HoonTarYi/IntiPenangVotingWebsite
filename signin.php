

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
      <h3> <?php 
				$url = "htttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				
				
				if (strpos($url, 'error=uidpass') !== false) {
					print "Username or Password is Incorrect!";
					
				}
				
				?></h3> 
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
    
     
						
				
				
	
				<?php 
require('Footer.php');

?>
        

</body>

</html>
