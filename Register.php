	<!DOCTYPE HTML>

<html>
	

<?php 
require('Header.php');

?>



				<!-- Main -->
					<article id="main">
						<header>
							<h2>Register</h2>
							<p>Register As a Member,to Vote as a member</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
   
		<section>
			<h4>Register Form</h4>
				
			   <h3> <?php 
				$url = "htttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				if (strpos($url, 'error=empty') !== false) {
					print "Fill out all fields";
					
				}
				
				if (strpos($url, 'error=uid') !== false) {
					print "Username Existed!";
					
				}
				
				if (strpos($url, 'error=username') !== false) {
					print "Please enter your username"; 
					
				}
				
				if (strpos($url, 'error=pwd') !== false) {
					print "Please enter your password"; 
					
				}
				
				 if (strpos($url, 'error=cpwd') !== false) {
					print "Your confirmed password does not match the original password"; 
				}
				
				 if (strpos($url, 'error=email') !== false) {
					print "Please enter your email address"; 
				}
				
				 if (strpos($url, 'error=addr') !== false) {
					print "Please enter your address"; 
				}
				
				
				
				
				
				?></h3>
				
					<div class="row gtr-uniform aln-center col-3 " >
						
			
			   <br><br>
                
		
			<!-- Form to get new user basic data-->	
		<form class="form-horizontal" action="registerdb.php" method="POST">
	<?php
	/*  A Function to get ip address and  show the countr that user come from */
include 'countryip.php';

echo '<strong>IP Address</strong>:= ' .$ip. '<br/>';
echo '<strong>Country</strong>:= ' .$country. '<br/>';


?>
			
            <div class="col-3 col-12-xsmall ">
                <label class="col-xs-2 control-label" for="inputSuccess" >Username</label>
                <div class="col-xs-7">
                    <input type="text"  class="form-control" name="uid" placeholder="Username" value="<?php if (isset ($_POST['name'])) {print htmlspecialchars($_POST['name']); } ?>"/>
                    
                </div>
            </div>
			
			
        <div class="col-3 col-12-xsmall">
            <label class="col-xs-2 control-label" for="inputWarning" name="pwd">Password</label>
                <div class="col-xs-10">
                    <input type="password" class="form-control" name="pwd" placeholder="Password">
                    
             </div>
        </div>
    
    <div class="col-3 col-12-xsmall">
            <label class="col-xs-2 control-label" for="inputWarning" name="cpwd">Confirm Password</label>
                <div class="col-xs-10">
                    <input type="password" class="form-control" name="cpwd" placeholder="ConfirmPassword">
                    
                </div>
        </div>
    
		<div class=" col-6 col-12-xsmall">
			<label form="inputEmail" class="control-label col-xs-2" name="email">Email</label>
				<div class="col-xs-10">
					<input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php if (isset ($_POST['email'])) {print htmlspecialchars($_POST['email']); } ?>"/>
     
				</div>
			</div>
                    
                    <div class="col-6 col-12-xsmall ">
                <label class="col-xs-2 control-label" for="inputError" name="addr">Address</label>
                <div class="col-xs-10">
                    <input type="text"  class="form-control" placeholder="Address" name="addr" value="<?php if (isset ($_POST['addr'])) {print htmlspecialchars($_POST['addr']); } ?>" />
               </div>
                  </div>
				  
				  
				    <div class="col-6 col-12-xsmall ">
                <label class="col-xs-2 control-label" for="inputError" name="roles">Roles</label>
                <div class="col-xs-10">
				  <select name="roles" id="roles">
					  <option value="admin">Admin</option>
					  <option value="participants">Participants</option>
					</select>
				</div>
                  </div>
		
		<br><br>
                    
                    
        <div class="row aln-middle">
        <div class="col-xs-offset-2 col-xs-2">
			<!-- Hidden value for storing user's ip and country name to database -->	
			<input id="ip" type="hidden" name="ip" value="<?php echo $ip;?>">
			<input id="country" type="hidden" name="country" value="<?php echo $country;?>">
            <button type="submit" class="button primary">Register</button>
        </div>
           
        </div>
</div>
</div>
		
</form>
                    
						</div>
					</div>
				</section>
			</div>
		</section>
	</article>
	
				<?php 
require('Footer.php');

?>
        

</body>

</html>
