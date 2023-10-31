<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql= "Select * from `signup1` where
    username='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "Login Sucessfully";
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
           
        }else{
            //  echo "Invalid data";
             $invalid=1; 
        }
    }





}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <?php
if ($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucessfully !!! </strong> User Sucessfully signed up.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
<?php
if ($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid</strong> Enter correct data 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>


    <div class="container">
        <h1> Login</h1>
    <form action="login.php" method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" >
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
    
  </body>
</html>