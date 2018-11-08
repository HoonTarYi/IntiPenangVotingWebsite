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

				
				if (strpos($url, 'error=name') !== false) {
					print "Please enter your options name"; 
					
				}
				/*
				if (strpos($url, 'error=start') !== false) {
					print "Your Start Date is not filled correctly"; 
					
				}
				
				 if (strpos($url, 'error=end') !== false) {
					print "Your End Date is not filled correctly"; 
				}
				/*
				 if (strpos($url, 'error=votes') !== false) {
					print "Your votes"; 
				}
				*/
				
				
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

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #4f4e4e;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>

<!--  Adding Input Field and Delete Input Field */ -->
<script type="text/javascript">
					$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '<br><br><div><label class="col-xs-2 control-label" for="inputWarning" name="name">Options</label><input type="text" class="form-control" name="name" placeholder="name" value="<?php if (isset ($_POST['name'])) {print htmlspecialchars($_POST['name']); } ?>" /><br><input type="file" name="field_name[]" accept="image/*"><a href="javascript:void(0);" class="remove_button"><br><br><img width ="30" height="30" align="center" src="images/dlt.png"/></a></div>'; 
						//New input field html 
						var x = 1; //Initial field counter is 1
						
						//Once add button is clicked
						$(addButton).click(function(){
							//Check maximum number of input fields
							if(x < maxField){ 
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); //Add field html
							}
						});
						
						//Once remove button is clicked
						$(wrapper).on('click', '.remove_button', function(e){
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					});
					</script>
					
				
<form id="regForm" action="pollsoptdb.php" method="POST">
  <h1>Polls Setup</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
		<label class="col-xs-2 control-label" for="inputWarning" name="subject">Question / Subject</label>
  <h3>Polls Basic Setting</h3>
		<input type="text" class="form-control" name="subject" placeholder="subject" value="" />
										  
		<label class="col-xs-2 control-label" for="inputWarning" name="start">Start Date Time</label>
		<input type="datetime-local"  class="form-control" name="start" placeholder="start" value="" />
								
		<label class="col-xs-2 control-label" for="inputWarning" name="end">End Date Time</label>
		<input type="datetime-local"  class="form-control" name="end" placeholder="end" value="" />
								
  </div>
  <div class="tab"> 
  <h2>Create Options</h2>
 <div class="field_wrapper">

                    <label class="col-xs-2 control-label" for="inputWarning" name="name">Options</label>
					
					
					<input type="text" class="form-control" name="name" placeholder="name" value="<?php if (isset ($_POST['name'])) {print htmlspecialchars($_POST['name']); } ?>" />
					<br>
			
					<input type="file" name="pic" accept="image/*">
					<br><br>
					<a href="javascript:void(0);" class="add_button" title="Add field">
					<img width ="30" height="30" align="center" src="images/add.png"/></a>			
					
					</div>
  </div>
  

				  <div style="overflow:auto;">
					<div style="float:right;">
					 <div class="row aln-middle">
						<div class="col-xs-offset-2 col-xs-2">
					  <button type="button" id="prevBtn" class="button primary" onclick="nextPrev(-1)">Previous</button>
					  
						<button type="button" id="nextBtn" class="button primary" onclick="nextPrev(1)">Next</button>
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

			
			
      
	
					</div>
			
			</section>			

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
    document.getElementById("nextBtn").innerHTML = "Submit";

  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
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