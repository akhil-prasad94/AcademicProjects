<!DOCTYPE html>
<html>
<head>
<title> Reservations</title>
<!-- <link rel="stylesheet" type="text/css"  href="test.css"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="test.css">
<style>
 form{


width:40%;

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
	
	
	

	
		<h1 style = "text-align:center; font-size:70px; font-weight:bold; font-family:Vivaldi;"> Event Reservations</h1>
	


<div class="wpb_wrapper">	
  
<h2 class="sub-titles" style = "font-family:Vivaldi; color: #A52A2A; font-size:40px;" ><strong><u>Host Your Party at World Travellers!</u></strong></h2>
<p>We can&#8217;t wait for you to host your next event in our gorgeous 1,500 square foot event space! Wow your guests with the inspiring &amp; quirky BREWED decor while they are wined and dined on local craft beer, farm fresh and scratch-made food, boutique wine, and locally roasted coffee. There is no event like a BREWED event.</p>
<p>We accept reservations for parties of 6 or more on Tuesday &#8211; Friday and on Saturday evenings.</p>
<p>We are not able to accept reservations during our brunch hours on Saturday and Sunday. We gladly accept walk-in parties of fewer than 6 guests at the door! If you are concerned about wait time during peak hours, we recommend you add your name to the list via the <strong>No Wait app</strong>.</p>
<p>For parties of 6-12 guests, give us a call at <b>817.945.1545</b> to make a reservation.</p>
<p>For parties of 13+, or for more information about our event space, contact our Large Party Coordinator using the form below!</p>
</div>


<?php # Script 3.13 - register.php


require_once('mysql_connect.php');
// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

        $errors = array(); // Initialize error array.
        
        // Check for a name.
        if (empty($_POST['firstName'])|| (!preg_match("/^([A-Za-z ]{5,30})$/",$_POST['firstName'])===0)) {
                $errors[] = 'Please enter your  name.';
        }
       



        // Check for an email address.
        if (empty($_POST['emailId']) || !preg_match("/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i",$_POST['emailId'])===0) {
                $errors[] = 'Please enter your email address.';
        }
       



         if (empty($_POST['phoneNumber']) || !preg_match("/^\d{3}-\d{3}-\d{4}$/",$_POST['phoneNumber'])===0) {
                $errors[] = 'Please enter your phone number.';
        }
      
       
               




         if (empty($_POST['description']) || !preg_match("/^([A-Za-z0-9 ]{10,30})$/",$_POST['description'])===0) {
                $errors[] = 'Please enter your event address.';
        }
        
        
             

        
        
            if (empty($_POST['eventname']) || !preg_match("/^([A-Za-z ]{10,30})$/",$_POST['eventname'])===0) {
                    $errors[] = 'Please enter your event address.';
            }
           
    

         if (empty($_POST['cardno']) || !preg_match("/^([0-9]{16})$/",$_POST['cardno'])===0) {
            $errors[] = 'Please enter your card number.';
          }



     if (empty($_POST['cvv']) || !preg_match("/^([0-9]{3})$/", $_POST['cvv'])===0) {
        $errors[] = 'Please enter your cvv .';
 }





 if (empty($_POST['expiry']) || !preg_match("/^\d{2}\/\d{2}$/",$_POST['expiry'])===0 ) {
    $errors[] = 'Please enter your card expiry date.';
}





        if (empty($errors)) { 
		
		// If everything's okay.
        
                // Register the user.
                
                // Send an email.
/*  $body = "Thank you for booking with us. We have sent you a confirmation mail regarding the same. We will update you on a timely basis."; */

$name= $_POST['firstName'];
$email= $_POST['emailId'];
$phone= $_POST['phoneNumber'];    
$description= $_POST['description'];
$eventname= $_POST['eventname'];

$cvv= $_POST['cvv'];

$sql = "INSERT INTO events (firstname, emailid, phonenumber, eventdescription, eventname) VALUES ('$name' , '$email','$phone', '$description','$eventname');";

if(!mysqli_query($dbc,$sql))
{
        echo "error while inserting" .$dbc->error;
}
                echo '<h1 id="mainhead"></h1>
                <img class="img-responsive" src="Images/best.jpg" alt="ourpeople" width="90%" height="500px">
                <h1>Thank you for booking your event with us! An email will be sent regarding the booking details. We will update you accordingly. </h1><p><br /></p>';  
                
        } else { // Report the errors.
        
                echo '<h1 id="mainhead"></h1>
                <p class="error">Please go back and complete the all the fields correctly<br />';

                

                foreach ($errors as $msg) { // Print each error.
                        echo " - $msg<br />\n";
                }
                
        } // End of if (empty($errors)) IF.

} 			else { // Display the form.
?>
<form action="reservationssam.php" method="POST">
			
            
            <div class="form-group">
			<label for="firstName">Name*:</label>
			<input type="text" class="form-control" name="firstName"  id="firstName" placeholder="Name" required />	
            <span class="error_form" id="name_error"></span>
            </div>
			
			

			
            <div class="form-group">
			<label for="emailId">Email Id*:</label>
			<input type="text" class="form-control" name="emailId" id="emailId" placeholder="yourname@domain.com" required />
            <span class="error_form" id="email_error"></span>
        </div>
			
			
            <div class="form-group">
			<label for="phoneNumber">Phone Number*:</label>
			<input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="xxx-xxx-xxxx" required />
            <span class="error_form" id="phone_error"></span>
        </div>
			
            
     <div class="form-group">
            <label for="address">Event Name*:</label>
			<input type="text" class="form-control" name="eventname" id="eventname" size="20" required  />
            <span class="error_form" id="ename_error"></span>
        </div>
          
            
            <div class="form-group">
            <label for="address">Event Description*:</label>
			<input type="text" class="form-control" name="description" id="description" size="200"  required />
            <span class="error_form" id="address_error"></span>
        </div>
            

            
            <div class="form-group">
                <label for="sel1">Select card:</label>
                <select class="form-control" id="creditcard">
                  <option >Visa</option>
                  <option>MasterCard</option>
                  <option>American Express</option>
                 
                </select>
              </div>


              <div class="form-group">
                <label for="cardnumber">Card Number*:</label>
                <input type="text" class="form-control" name="cardno" id="cardno" size="10" placeholder="xxxxxxxxxxxxxxxx" required />
                <span class="error_form" id="cardno_error"></span>
            </div>

            <div class="form-group">
                <label for="cvv">CVV*:</label>
                <input type="text" class="form-control" name="cvv" id="cvv" size="10" placeholder="xxx" required />
                <span class="error_form" id="cvv_error"></span>
            </div>

            <div class="form-group">
                <label for="cvv">Expiry date*:</label>
                <input type="text" class="form-control" name="expiry" id="expiry" size="10" placeholder="MM/YY" required />
                <span class="error_form" id="expiry_error"></span>
            </div>
             
		
            <button type="submit" id ="submit"  class="btn btn-default" name="Submit">Register Event</button>
            <input type="hidden" name="submitted" value="TRUE" />
			
			<br><br>
		 </form>
         <?php
}
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

  </footer>
  <!-- Footer -->

   
 <button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
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

</body>
</html>
