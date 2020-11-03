<?php 
include 'conn.php';
session_start();
// error_reporting(0);
// ini_set('display_errors', 0);
if(!isset($_SESSION['logged'])){
	header('Location:index.php');
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploring Infinities | Dashboard</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./image/logo.png">	
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
        
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <a href="dashboard.php" style="position:absolute;bottom:15px;"><img src="./image/exploringinfi.png" width="200"></a>
        <!-- <a href="home.php"><img src="http://expinfi.com/assets/img/logo.png" alt="exp_logo" > -->
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a class="on-option" href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="assessments.php"><i class="fas fa-table"></i><span>Assessments</span></a>
        <a href="statistics.php"><i class="fas fa-cogs"></i><span>Statistics</span></a>
        <a href="logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    
    <div style="padding-top:100px;" class="sidebar">
    
      <a style="background: #19B3D3;
                text-decoration: none;
                font-weight: bold;
                color: #2F323A;" 
                href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="assessments.php"><i class="fas fa-table"></i><span>Assessments</span></a>
      <a href="statistics.php"><i class="fas fa-cogs"></i><span>Statistics</span></a>
      <a href="logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
        <h1 class="text-center font-weight-bold">Dashboard</h1>
        <?php 
		    $email=$_SESSION['logged'];
		    $sql="SELECT * from users WHERE email='$email'";
		    $query=mysqli_query($conn,$sql);
        $fetch_name=mysqli_fetch_assoc($query);	
        
        if($fetch_name['batchid'] == 'MYL'){	
        ?>
        <h3 class="mt-5">Welcome to the workshop by The FASTEST HUMAN CALCULATOR</h3>
        <h4 class="mt-2">Please do you pre-assessment finish it off soon!</h4>
        <?php
        }
        elseif($fetch_name['batchid'] == 'MYW'){
        ?>
        <h3 class="mt-5">Welcome to the workshop by The FASTEST HUMAN CALCULATOR</h3>
        <h4 class="mt-2">Please do you pre-assessment finish it off soon!</h4>
        <?php
        }else{
        ?>
        <h3 class="mt-4">Welcome, <span class="badge badge-secondary"><?php echo $fetch_name['username']?></span></h3>
        <?php
        }
        ?>

        <div class="jumbotron mt-4">
            <a class="btn btn-success btn-lg" href="assessments.php" role="button">Go to Assessments</a>
          <h1 class="display-4 mt-3">Exploring Infinities</h1>
          <p class="lead">Founded by World's Fastest Human Calculator- Neelakantha Bhanu Prakash.Developing cognitive abilities in children through arithmetic learning.</p>
          <hr class="my-4">
          <p>At Exploring Infinities, we believe that the way math is learned, practiced has a direct impact on a child’s cognitive improvement.</p>
          <p class="lead">
          <a class="btn btn-primary btn-lg" href="http://expinfi.com/" role="button">Learn more</a>
        

          </p>
        </div>


        <div class="card text-white bg-info mt-4">
          <div class="card-header">Featured</div>
          <div class="card-body">
            <h3 class="card-title">What do we do at Exploring Infinities?</h3>
            <p class="card-text">Exploring Infinities, works with students and employees across different educational and professional institutions in enabling cognitive ability development and numeracy development. We believe that improvement in arithmetic skill translates into development of an individual cognitively.</p>
            <a href="http://expinfi.com/" class="btn btn-dark">Our Website</a>
          </div>
        </div>

        
        <!--<div class="row mt-5">-->
        <!--  <div class="col-md-3">-->
        <!--    <div class="card text-white bg-danger">-->
        <!--      <div class="card-body">-->
        <!--        <h5 class="card-title">Special title treatment</h5>-->
        <!--        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
        <!--        <a href="#" class="btn btn-primary">Go somewhere</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--  <div class="col-md-3">-->
        <!--    <div class="card bg-warning">-->
        <!--      <div class="card-body">-->
        <!--      <h5 class="card-title">Special title treatment</h5>-->
        <!--      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
        <!--      <a href="#" class="btn btn-primary">Go somewhere</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--  <div class="col-md-3">-->
        <!--    <div class="card text-white bg-success">-->
        <!--      <div class="card-body">-->
        <!--      <h5 class="card-title">Special title treatment</h5>-->
        <!--      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
        <!--      <a href="#" class="btn btn-primary">Go somewhere</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!-- </div>-->
        <!--</div>-->

        

    </div>
    
    <footer style="background:#2a52be;" class="py-2 text-white-50">
    <div class="container text-center">
      <h6 class="text-white">Designed and Developed by @Abhishek Potula</h6>
    </div>
    </footer>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html>
                           