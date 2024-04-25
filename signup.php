<?php
 $showAlert=false;
 $showError=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
   
require("_partials/dbconnect.php");
$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['Cpassword'];
$exists=false;
// Check whether username exists.
// $exitSql="SELECT * FROM `users` WHERE username='admin@admin'";

// $result=mysqli_query($conn, $exitSql);
// $numExitRows=mysqli_num_rows($result);
// if($numExitRows> 0){
//     $exists=true;
// }
// else{
//     $exists=false;
// }
if(($password==$cpassword) && $exists==false){

$sql="INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$password', '2024-04-24 09:26:55.000000');";
$result=mysqli_query($conn,$sql);
echo "$result";
if($result){
    $showAlert=true;

}
}
else{
    $showError=true;
}

}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
require("_partials/nav.php");?>
<?php
if($showAlert){
echo '<div class="alert alert-success" role="alert">
  Success!You have created account sucessfully.
</div>';
}
if($showError){
    echo '<div class="alert alert-danger" role="alert">
    You have entered a wrong password or username already exists.
  </div>'; 
}
?>
<div class="container" style="    width: 44%;
    margin: auto;
    padding: 10px;">
    <h1 style="text-align: center;margin:23px">Sign Up to our website.</h1>
<form action="/LOGINSYSTEM/signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Email address</label>
    <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="textHelp">

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="Cpassword" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" id="Cpassword" name="Cpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>