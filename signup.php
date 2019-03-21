
<?php


require __DIR__ . '/lib/PayPalDemo.php';
$app = new PayPalDemo();
if (!empty($_POST['btnsignup'])) {


    $email = trim($_POST['email1']);
    $password = trim($_POST['password1']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];



    if ($email == "") {
        $login_error_message = 'Email field is required!';
    } else if ($password == "" || !preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)==1) {
        $login_error_message = 'Password field with min 8 characters, 1 nnumber, 1 uppercase and 1 lower case letter required!';
    } else if ($fname == "" ||  !preg_match("/^[a-zA-Z ]+$/", $fname)==1) {
        $login_error_message = 'First name field is required. No numbers allowed!';
    } else if ($lname == "" ||  !preg_match("/^[a-zA-Z ]+$/", $lname)==1 ) {
        $login_error_message = 'a valid Last name field is required. No numbers allowed!';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $login_error_message = 'Invalid email address!';
    } else {
        $app-> signup($fname,$lname,$email,$password);
       echo "<h2>You have successfully created an account, please login using the credentials<h2>";
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
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Cafe's Market Place</h1>
            </div>
        </div>
        
        <div class="row well">
            <div class="col-md-7">
                <h2>
               
                </h2>
                <?php
                if (isset($login_error_message) && $login_error_message != "") {
                    echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
                }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email1" id="email1" placeholder="Email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password1" id="password1" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input class="form-control" type="text" name="fname" id="fname" placeholder="First name" >
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input class="form-control" type="text" name="lname" id="lname" placeholder="Last name" >
                    </div>
                    <div class="form-group">
                        <input name="btnsignup" type="submit" class="btn btn-primary" value="Sign Up" > 
                    </div>
                </form>
                <a href="index.php"> Back to Login</a>
            </div>
            
        </div>
    </div>


</body>
</html>