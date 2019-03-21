
<?php

require __DIR__ . '/lib/PayPalDemo.php';


if(!empty($_SESSION['user_id'])){
    header('Location: products.php');
    exit;
}

$app = new PayPalDemo();

$login_error_message = '';


if (!empty($_POST['btnLogin'])) {


 


    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "") {
        $login_error_message = 'a valid Email id is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $login_error_message = 'Invalid email address!';
    } else {

        if ($app->isEmail($email)) {


 $_SESSION['user_id'] = $app->getUserIDByEmail($email);  
   header("Location: products.php"); 
        }else{
            
            $login_error_message = 'Account is not exist with this email, please create new account to login!';
        }

}

        } 
    


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Market Place</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <ul class="nav navbar-nav" >
    
    
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


<li class="nav-item  myHome">
<a class="nav-link" href="view_events.php">Events</a>
</li>

<li class="nav-item  myHome">
<a class="nav-link" href="contactus.html">Contact Us</a>
</li>

</ul>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Cafe's Market Place</h1>
            </div>
        </div>

        <div class="row well">
            <div class="col-md-7">
                <h2>
                    Please login
                </h2>
                <?php
                if (isset($login_error_message) && $login_error_message != "") {
                    echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
                }
                ?>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <input name="btnLogin" type="submit" class="btn btn-primary" value="Login" >
                    </div>

            <div >
            <p> Not registered yet? <a href="signup.php"> Sign up now!</a></p>
            <p> Forgot password? <p> <a href="forgotpassword.php"> Click here to reset<a>
                </form>
            </div>
            <div class="col-md-5">
               
            </div>
        </div>
    </div>


</body>
</html>