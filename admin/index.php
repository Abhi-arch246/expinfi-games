<?php 
ob_start();
 include '../conn.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exploring Infinities | Admin area</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../image/logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body style="background:darkslateblue;">
  <div class="container mt-5 mb-3">
    <div class="row ">
    <div class="col-md-6 my-auto ">
    <div class="text-center">
        <img class="mb-5" src="../image/exploringinfi.png" width="270" alt="">
      </div>
      <img class="img-fluid pt-4" style="max-width:100%;" src="../image/login.svg" alt="">
    </div>
    
    
      <div class="col-md-6 card mt-5" style="border-radius:15px;">
        <div class="container py-5">
          <h1 class="m-2">Admin Login Area</h1>
          <form action="" method="POST">
          <div class="alert mt-3 alert-danger" id="failure" role="alert" style="display: none">
            <strong>Wrong Credentials!</strong> Either email or password doesn't match
          </div>
          <br>
          <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
          </div>
          <br>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <br>
          <br>
          <div class="text-center">
            <button type="submit" name="submit" class="btn font-weight-bold btn-block btn-info">Login</button>
            <br>
          </div>
          </form>
        </div>
    </div>

 
    
  </div>
</div>

</body>
</html>
<?php
session_start();
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $session_var='Admin';

  $sql="SELECT * FROM admin WHERE email='$email'AND password='$password'";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)==1){
    $_SESSION['logged']=$session_var;
    header("location:performance.php");
  }else{
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#failure").css("display","block");
      })
    </script>
    <?php
  }

}

ob_end_flush();
?>


