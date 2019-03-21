<?php 



require __DIR__ . '/lib/PayPalDemo.php';
$app = new PayPalDemo();

if(isset($_POST['submit']))
{
$user_emailid = $_POST['useremail'];
$result= $app->findPasswordByEmail($user_emailid);
//$row = mysqli_fetch_assoc($result);
//$emailid=$row['email'];
//$password1=$row['password'];
//echo "$result";
$to = $user_emailid;
$subject = "Password for the market place";
$txt = "Your password is : $result.";
$headers = "From: akhilnortheastern1994@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$mail= mail($to,$subject,$txt,$headers);
if($mail)
{
    echo "successful!";
    echo"<h6>An email with your password has been sent!<h6>";
}
else{
    echo "failed";
}

}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style type="text/css">
input[type="email"]{
border:1px solid olive;
border-radius:5px;
width:200px;
position:absolute;
left:550px;
top:300px;
}
h1{

font-size:22px;
text-align:center;
}
#btn1{

position:absolute;
bottom:420px;

}
</style>
</head>
<body>

    <a class="nav-link" href="home.html"><img src="Images/coflogo.png" class="rounded" width="100px" height="100px" alt="Coffee_roasters"></a>
  
<h1>Please enter your email id, we will send your password<h1>
<form action='' method='post'>
<div class="form-group">
<label for="email"></label>
<input class="form-control" type="email" name="useremail" id="useremail" placeholder="Email" maxlength="100" >
</div>
<button id="btn1" type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>