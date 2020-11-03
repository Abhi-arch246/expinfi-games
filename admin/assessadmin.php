<?php 
include '../conn.php';
session_start();
if(!isset($_SESSION['logged'])){
	header('Location:index.php');
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>Exploring Infinities | Assessments</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../image/logo.png">	
    <link rel="stylesheet" href="../css/styles.css">
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
        <a href="performance.php" style="position:absolute;bottom:15px;"><img src="../image/exploringinfi.png" width="200"></a>
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
        <a href="performance.php"><i class="fas fa-desktop"></i><span>Students Performance</span></a>
        <a href="assessadmin.php"><i class="on-option fas fa-table"></i><span>Assessments</span></a>
        <a href="logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    
    <div style="padding-top:100px;" class="sidebar">
    
      <a href="performance.php"><i class="fas fa-desktop"></i><span>Students Performance</span></a>
      <a style="background: #19B3D3;
                text-decoration: none;
                font-weight: bold;
                color: #2F323A;" 
        href="assessadmin.php"><i class="on-option fas fa-table"></i><span>Assessments</span></a>
      <a href="logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
      <h1 class="text-center font-weight-bold">Main Assessments</h1>
      <?php 
		  $email=$_SESSION['logged'];		
      ?>
      <h3 class="mt-4">Hello, <?php echo $email?></h3>

      <!-- MWL1 Beginner level-->
      <h2 class="text-center">Batch: MWL1</h2>
      <div class="container">
        <h2><span class="badge badge-secondary p-2 mt-4">Beginner level assessments</span></h2>
          <div class="row" style="margin-top:30px;">
          <?php
          $exam="SELECT * FROM exams WHERE examlevel='Beginner' AND batchid='MWL1'";
          $examquery=mysqli_query($conn,$exam);
          while($fetch_exam=mysqli_fetch_assoc($examquery))
          {
          ?>
            <div class="col-md-4 p-1">
              <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center mt-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
              </div>
            </div>
          <?php
          }
          ?>     
        </div>

      <!-- MWL1 Advanced level-->
    <h2><span class="badge badge-secondary mt-5 p-2">Advanced level assessments</span></h2>
      <div class="row" style="margin-top:30px;">
        <?php
        $exam="SELECT * FROM exams WHERE examlevel='Advanced' AND batchid='MWL1'";
        $examquery=mysqli_query($conn,$exam);
        while($fetch_exam=mysqli_fetch_assoc($examquery))
        {
        ?>
        <div class="col-md-4 p-1">
            <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center mt-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
            </div>
        </div>

        <?php
        }
        ?>     
      </div>
      <hr class="mx-2 my-5" style="border-bottom: 6px solid #696969;">

      <!-- TOCL1 Beginner level-->
    <h2 class="text-center mt-5">Batch: TOCL1</h2>
    <h2><span class="badge badge-secondary p-2">Beginner level assessments</span></h2>
      <div class="row" style="margin-top:30px;">
        <?php
        $exam="SELECT * FROM exams WHERE examlevel='Beginner' AND batchid='TOCL1'";
        $examquery=mysqli_query($conn,$exam);
        while($fetch_exam=mysqli_fetch_assoc($examquery))
        {
        ?>
        <div class="col-md-4 p-1">
            <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center mt-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
            </div>
        </div>

        <?php
        }
        ?>     
    </div>

      <!-- TOCL1 Advanced level-->
    <h2><span class="badge badge-secondary mt-5 p-2">Advanced level assessments</span></h2>
      <div class="row" style="margin-top:30px;">
        <?php
        $exam="SELECT * FROM exams WHERE examlevel='Advanced' AND batchid='TOCL1'";
        $examquery=mysqli_query($conn,$exam);
        while($fetch_exam=mysqli_fetch_assoc($examquery))
        {
        ?>
        <div class="col-md-4 p-1">
            <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center mt-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
            </div>
        </div>

        <?php
        }
        ?>     
    </div>



    </div>

    </div>

    

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html>
                           