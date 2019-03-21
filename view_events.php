<!DOCTYPE html>
<html>
<head>
<title> Events</title>
<link rel="stylesheet" type="text/css"  href="test.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>


a {
    text-decoration: none;
    color: inherit;
    transition: all 0.25s ease;
}

.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
        font-size: 14px;
        line-height: 1;
    font-size: inherit;
    
}





</style>
</head>





<body background = Images/background.jpg>
    
       
<ul class="nav myNav" >
  
  
<li class="nav-item">
<a class="nav-link" href="home.html"><img src="Images/coflogo.png" class="rounded" width="100px" height="100px" alt="Coffee_roasters"></a>
</li>
  
<li class="nav-item myHome">
<a class="nav-link active" href="Menu.html">Our Menu</a>
</li>

<li class="nav-item myHome">
<a class="nav-link" href="ourstory1.html">Our Story</a>
</li>

<li class="nav-item  myHome">
<a class="nav-link" href="register.php">Reservations</a>
</li>

<li class="nav-item  myHome">
<a class="nav-link" href="index.php">Market Place</a>
</li>

<li class="nav-item  myHome">
<a class="nav-link" href="joinus_form.html">Join the Team</a>
</li>

<li class="nav-item myHome">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Our Branches
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="boston.html">Boston</a>
           <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="newyork.html">New York</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sf.html">San Francisco</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="seattle.html">Seattle</a>
        </div>
      </li>
<li class="nav-item  myHome">
<a class="nav-link" href="view_events.php">Events</a>
</li>

<li class="nav-item  myHome">
<a class="nav-link" href="contactus.html">Contact Us</a>
</li>

</ul>



   <img src="Images/okkt.jpg" alt="beer drinkers" height="500px" width="100%" >






	<?php # Script 7.6 - view_users.php (2nd version after Script 7.4)
// This script retrieves all the records from the users table.


require_once('mysql_connect.php');
// Page header.
echo '<h1 id="mainhead" align="center" style="font-family:Vivaldi";">Events Happening</h1>';
DEFINE('MYSQL_ASSOC',MYSQLI_ASSOC);
		
// Make the query.
$query = "SELECT eventname, eventdescription FROM events";	
$result = mysqli_query($dbc,$query); // Run the query.
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.

	// Table header.
	echo '<table  class="table table-warning table-striped" align="center" cellspacing="0" cellpadding="5">
	<tr><td ><b>Event Name </b></td><td><b>Event Description</b></td></tr>'; 
	// Fetch and print all the records.
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		echo '<tr><td align="left">' . $row['eventname'] . '</td><td align="left">' . $row['eventdescription'] . '</td></tr>';
	}

	echo '</table>';
	
	mysqli_free_result ($result); // Free up the resources.	

} 

mysqli_close($dbc); // Close the database connection.

 // Include the HTML footer.
?>



<!-- Footer -->
<footer class="page-footer">

    <!-- Footer Links -->
    <div class="container">

      <!-- Grid row-->
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="home.html">Home</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="Menu.html">Our Menu</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="ourstory1.html">Our Story</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="index.php">Market Place</a>
          </h6>
        </div>
        
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="joinus_form.html">Join the Team</a>
          </h6>
        </div>
        <!-- Grid column -->
<div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="contactus.html">Contact Us</a>
          </h6>
        </div>
      </div>
      <!-- Grid row-->
      <hr class="rgba-white-light" style="margin: 0 15%;">

      <!-- Grid row-->
      <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

        <!-- Grid column -->
        <div class="col-md-8 col-12 mt-5">
          <p style="line-height: 1.7rem">We created our Love the Fort mural with “Bless the City” in mind. Just to give back and say thanks. The idea behind our mural is to express visually what so many of us locals think daily as we stroll through our wonderful city.

<BR>
Love and Worth are truly what makes us all feel valuable, and that’s just the reason we created COFFEE ROASTERS.</p>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->
      <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

      <!-- Grid row-->
      <div class="row pb-3">

        <!-- Grid column -->
        <div class="col-md-12">

          <div class="mb-5 flex-center" style=" text-align: center;">

            <a  href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a  href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                     <a  href="https://twitter.com/?lang=en" target="_blank"><i class="fab fa-twitter"></i></a>
                      <a  href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>

          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> CoffeeRoasters.com</a>
    </div>
    <!-- Copyright -->

  <!-- Footer -->
    


 
 <!-- backtoTopButton -->
 <button onclick="topFunction()" id="myBtn" title="Go to top" >^</button>
<script type="text/javascript">
                
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

 </script>

</footer>
</body>
</html>