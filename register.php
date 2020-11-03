<?php 
include 'conn.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exploring Infinities | Register area</title>
  <link rel="icon" type="image/png" sizes="32x32" href="./images/download.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body style="background:darkslateblue;">
  <div class="container my-4">
    <div class="row">
    <div class="col-md-6 my-auto ">
      <div class="text-center">
        <img class="mb-5" src="./images/exploringinfi.png" width="270" alt="">
      </div>
      <img class="img-fluid pt-4" src="./images/login.svg" alt="">
    </div>
    <div class="col-md-6 mt-4 card" style="border-radius:15px;">
    <div class="container py-3 m-1">
    <h1>Registration Area</h1>
    <form action="" method="POST">
      <div class="alert mt-2 alert-success" id="success" role="alert" style="display: none">
        <strong>Success!</strong> Registered succesfully now <strong>Login</strong>
      </div>
      <div class="alert mt-2 alert-danger" id="failure" role="alert" style="display: none">
        <strong>Already Exist!</strong> This Email already exist
      </div>
      <br>
      <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
      </div>
      <br>
      <div class="form-group">
      <label>Email address</label>
      <input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <br>
      <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <br>
      <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
      </div>
      <br>
      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-block btn-info">Register</button>
        <br>
        <button class="btn btn-block btn-success">
        <a href="index.php"style="color: #fff; text-decoration: none; font-size: 17px; font-weight: 600;">Already a member? Login here. . .</a>
      </button>
      </div>

    </form>
    </div>
    
    </div>
    </div>
  </div>
</body>
</html>

<?php 

if (isset($_POST["submit"])) {
  $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
  $count=0;
  $result=mysqli_query($conn,"SELECT * from users WHERE email='$_POST[email]'") or die(mysqli_error($conn));
  $count=mysqli_num_rows($result);

  if ($count>0) {
?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#success").css("display","none");
        $("#failure").css("display","block");
      })
    </script>
    <?php 
    

    } else if($password!=$cpassword){
      echo "<script>alert('Passwords are not same..')</script>";
    } else{
    mysqli_query($conn,"INSERT INTO users VALUES (NULL,'$username','$email','$password')");
     ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#failure").css("display","none");
        $("#success").css("display","block");
      })
    </script>
      <?php  
    }
  }

  ?>



