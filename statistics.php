<?php 
include 'conn.php';
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
    <title>Exploring Infinities | Statistics</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./image/logo.png">	
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

    
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
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="assessments.php"><i class="fas fa-table"></i><span>Assessments</span></a>
        <a href="statistics.php"><i class="fas fa-cogs"></i><span>Statistics</span></a>
        <a href="logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    
    <div style="padding-top:100px;" class="sidebar">
      <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="assessments.php"><i class="fas fa-table"></i><span>Assessments</span></a>
      <a style="background: #19B3D3;
                text-decoration: none;
                font-weight: bold;
                color: #2F323A;" 
        href="statistics.php"><i class="fas fa-cogs"></i><span>Statistics</span></a>
      <a href="logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
        <h1 class="text-center font-weight-bold">Statistics</h1>
        <?php 
		    $email=$_SESSION['logged'];
		    $sql="SELECT username from users WHERE email='$email'";
		    $query=mysqli_query($conn,$sql);
		    $fetch_name=mysqli_fetch_assoc($query);		
        ?>
        <h3 class="mt-4 mb-2">Hello, <?php echo $fetch_name['username']?></h3>
         <div class="table-responsive">
        <div class="col-md-12" style="margin-top:50px;">
           
          <table id="result_table" class="table table-stripped table-hover table-bordered">
          <thead class="thead-dark">
          <tr class="text-center text-white">
          <th scope="col">Test Name</th>
          <th scope="col">Email Address</th>
          <th scope="col">Test Level</th>
          <th scope="col">Correct Answers</th>
          <th scope="col">Wrong Answers</th>
          <th scope="col">Completed in</th>
          <th scope="col">TestTaken on</th>
          </tr>
          </thead>
      </table>
      </div>
      

      <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });

          var email="<?php echo $email ?>";

          $('#result_table').dataTable({
            "ajax":{
              "url":"studentdata.php",
              "type":"POST",
              "data":{email:email},
              "dataSrc":""
            },
            "columns":[
              {"data":"test_name"},
              {"data":"email"},
              {"data":"examlevel"},
              {"data":"correct"},
              {"data":"wrong"},
              {"data":"time"},
              {"data":"submitted_at"}

            ]
          });

        });
      </script>
        

    </div>







  </body>
</html>
                           