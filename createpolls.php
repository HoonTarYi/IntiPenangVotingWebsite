<!DOCTYPE HTML>

<html>
	<?php 
require('Header.php');

?>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


		
		
				<!-- Main -->
					<article id="main">
						<header>
							<h2>Create Polls</h2>
							<p>Admin can create their own polls at below form</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
							
							<h3> <?php 
				$url = "htttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				if (strpos($url, 'error=empty') !== false) {
					print "Fill out all fields";
					
				}
				
				if (strpos($url, 'error=subject') !== false) {
					print "Please enter your question"; 
					
				}

			
				if (strpos($url, 'error=start') !== false) {
					print "Your Start Date is not filled correctly"; 
					
				}
				
				 if (strpos($url, 'error=end') !== false) {
					print "Your End Date is not filled correctly"; 
				}
				
				
				
				?></h3>
						
       

           
		   <!-- Function For Multiple Step -->
            <script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft"
                    });
                });
            </script>
			
			
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #b7b5b5;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}


</style>
<body>

					
				
<form id="regForm" action="pollsoptdb.php" method="POST">
  <h1>Polls Setup</h1>

  <div class="tab">
		<label class="col-xs-2 control-label" for="inputWarning" name="subject">Question / Subject</label>
  <h3>Polls Basic Setting</h3>
		<input type="text" class="form-control" name="subject" placeholder="subject" value="" />
										  
		<label class="col-xs-2 control-label" for="inputWarning" name="start">Start Date Time</label>
		<input type="datetime-local"  class="form-control" name="start" placeholder="start" value="" />
								
		<label class="col-xs-2 control-label" for="inputWarning" name="end">End Date Time</label>
		<input type="datetime-local"  class="form-control" name="end" placeholder="end" value="" />
		
	
			<p>How many options do you want?<br>
			<select name="poll_options">
			<option value="0">[Choose Option Below]</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			</select><br>
		
						<input type="submit" name="button" value="Submit"/>		
  </div>

  

				  <div style="overflow:auto;">
					<div style="float:right;">
					 <div class="row aln-middle">
						<div class="col-xs-offset-2 col-xs-2">
	
					  
						
					</div>
				  </div>
				   </div>
				  </div>
							  <!-- Circles which indicates the steps of the form: -->
							  <div style="text-align:center;margin-top:40px;">
								<span class="step"></span>
								<span class="step"></span>
								
							  </div>
</form>

	    






			</section>			

				

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Next";

  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}



function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


</script>
			
<?php 
require('Footer.php');

?>
			
	
	</body>
</html>