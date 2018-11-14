<?php 
require('Header.php');

?>
					
					<!-- Main -->
					<article id="main">
						<header>
							<h2>Charts</h2>
							<p>The Polls Summary Result</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
	

 <section id="login" class="content-section text-center">
             <div class="container">
               <h1 align="center"><b> Charts </b> 
			  </h1>
			  
			  <form id="regForm" action="" method="POST">
				<p>Which Polls that you want to show?<br>
			<select name="poll_charts">
			<option value="0">[Choose Option Below]</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			</select><br>
		
						<input type="submit" name="button" value="Submit"/>		
		</form>
<?php

include 'fusioncharts.php';

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "poll_system";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
    exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>


  <head>
   
    <link  rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->
    <script src=" http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script> 
    <script src=" http://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script> 
  </head>
   <body>
    <?php
	$poll_charts = false;

if(isset($_POST['poll_charts'])){
$poll_charts = $_POST['poll_charts'];
}

$subject = false;


      // Form the SQL query that returns the top 10 most populous countries
      $strQuery = "SELECT  poll_options.*, poll_votes.* FROM poll_options
	  INNER JOIN poll_votes	
	  ON poll_options.id=poll_votes.poll_option_id	
	  WHERE poll_options.poll_id='$poll_charts'";

      // Execute the query, or else return the error message.
      $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
		
		
			
      // If the query returns a valid response, prepare the JSON string
      if ($result) {
		  $sql = "SELECT * FROM polls WHERE '$poll_charts'";
				  $results = $dbhandle->query($sql) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

			while ($row = $results->fetch_assoc()) {
				if($row['id']==$poll_charts){
				$subject=$row['subject'];
				}
			}
          // The `$arrData` array holds the chart attributes and data
          $arrData = array(
              "chart" => array(
                  "caption" => "'$subject'",
                  "showValues" => "0",
				  "exportEnabled" => "1",
                  "theme" => "fusion"
				   
                )
            );

          $arrData["data"] = array();

  // Push the data into the array
          while($row = mysqli_fetch_array($result)) {
            array_push($arrData["data"], array(
                "label" => $row["name"],
                "value" => $row["vote_count"]
                )
            );
          }

          /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

          $jsonEncodedData = json_encode($arrData);

  /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

          $columnChart = new FusionCharts("column2D", "myFirstChart" , 700, 400, "chart-1", "json", $jsonEncodedData);

          // Render the chart
          $columnChart->render();

          // Close the database connection
          $dbhandle->close();
      }
    ?>
    <div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
  

</div>
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