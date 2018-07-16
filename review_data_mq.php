<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Smoke & Gas Detector</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <link href="css/smokestyle.css" rel="stylesheet">
	
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
  </head>
  
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top ">  <!--collapsing in medium screen size && color set to primary--> 
      <a class="navbar-brand"><img src="logo.png" width="50" height="50"></a>
	  <a class="navbar-brand" href="#">SMOKE & GAS Detector</a>
	<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
	    <span class="navbar-toggler-icon"></span>
	</button>
	
    <div class="collapse navbar-collapse" id="collapse_target">
	
         

        
   </div>
</nav>




<?php
include("dbconnect.php");
$dblink = Connection();

$query = "SELECT * FROM gasconcentration_logs ORDER BY timestamp ASC";

if($result = mysqli_query($dblink, $query)){
	echo "Reading records successfully from gasconcentration_logs <br>";
} else {
	echo "Error: " . $query . "<br>" . mysqli_error($dblink);
}
?>


   <h3 align="center"><strong>Gas and Smoke Concentration Particles in the Air</strong></h3>
   <h6 align="center">Gas/Smoke rate below 400ppm is clean air and above is contaminated with gas or smoke particles.</h6>
<div class="card" style="padding-left:300px;padding-right:300px;">  
   <table class="table table-bordered" >
		<tr>
			<th>Detected Time</th><th>Gas/Smoke Rate (ppm) </th>
		</tr>
      <?php 
		  if(mysqli_num_rows($result) > 0){
		     while($row = mysqli_fetch_assoc($result)) {
		        printf("<tr>
							<td>%s</td><td>%s</td>
					   </tr>", 
		           $row["timestamp"], $row["lpg"]);
		     }
		  }
		  mysqli_close($dblink);
      ?>
   </table>
 
</body>
</html>