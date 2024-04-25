<?php
 $login=false;
 $showError=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
   
require("_partials/dbconnect.php");
$username=$_POST['username'];
$password=$_POST['password'];
$sql="Select * from users where username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
// echo $num;//for debugging only
if($num==1){ 
      $login=true;
        session_start();
      $_SESSION["loggedin"]=true;
      $_SESSION["username"]=$username;
      header("location: welcome.php");
  
} 
else{
    $showError="Invalid credientals";
}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
require("_partials/nav.php");?>
<?php
if($login){
echo '<div class="alert alert-success" role="alert">
  Success!You have logged in successfully.
</div>';
}
if($showError){
    echo '<div class="alert alert-danger" role="alert">
    Invalid Credentials.
  </div>'; 
}
?>
<div class="container" style="    width: 44%;
    margin: auto;
    padding: 10px;">
    <h1 style="text-align: center;margin:23px">Login to our website.</h1>
<form action="/LOGINSYSTEM/login.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Email address</label>
    <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>