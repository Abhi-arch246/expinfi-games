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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploring Infinities | Assessments</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../image/logo.png">	
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        @media screen and (max-width: 780px){
          .mobile_nav{
            display: block;
            width: calc(100% - 0%);
            margin-top: -70px;
          }
          #header{
            display: none;
          }
        }
    </style>
  </head>
  <body style="background:blueviolet;">

    <!--header area start-->
    <header id="header">
        
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
      <a href="../dashboard.php" style="position:absolute;bottom:15px;"><img src="../image/exploringinfi.png" width="200"></a>

        
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="../dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="../assessments.php"><i class="fas fa-table"></i><span>Assessments</span></a>
        <a href="../statistics.php"><i class="fas fa-cogs"></i><span>Statistics</span></a>
        <a href="../logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    
    <div style="padding-top:100px;" class="sidebar">
    
      <a href="../dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="../assessments.php"><i class="fas fa-table"></i><span>Assessments</span></a>
      <a href="../statistics.php"><i class="fas fa-cogs"></i><span>Statistics</span></a>
      <a href="../logout.php"><i class="fas fa-info-circle"></i><span>Logout</span></a>
    </div>
    <!--sidebar end-->

    <div class="content" style="background:blueviolet;">
        <h1 class="text-center text-white font-weight-bold">Addition Assessment</h1>
        <?php 
		    $email=$_SESSION['logged'];
		    $sql="SELECT * from users WHERE email='$email'";
		    $query=mysqli_query($conn,$sql);
		    $fetch_name=mysqli_fetch_assoc($query);		
        ?>
        <h3 class="mt-4 text-white">Hello, <?php echo $fetch_name['username']?></h3>
            <div class="text-center">
                 <div class="">
                     <div class="row mt-5 py-4 ">

                        <div id="question_part" class="mx-auto pt-4 col-md-4">
                            <h2 class="text-white ml-4" id="firstq"></h2>
                            <h2 class="text-white" id="secondq"></h2>
                            <h2 class="text-white" id="thirdq"></h2>
                            <h2 class="text-white" id="fourthq"></h2>
                            <h2 class="text-white" id="fifthq"></h2>
                            <h2 class="text-white" id="sixthq"></h2>
                            
                            <br>
                            <div class="form-group">
                                <input type="number" style="text-align: center;font-size: 20px;" class="form-control" id="userinput" autofocus>
                                <br>
                                <button id="button" class="btn btn-block btn-primary" onclick="submit()">Submit</button>
                            </div>
                            <br>
                            <br>
                        </div>

                        <div class="mx-auto col-md-6 rounded bg-info my-auto">
                        <h1 class="stopwatch pt-3" style="font-family:Lucida Console;">00:00:00</h1>
                            <h2 id="complete"></h2>
                            <br>
                            <h2 id="ans">Once you Start the assessment</h2>
                            <h2 class="pb-3" id="aans">your result will be shown here</h2>
                            <p id="goto"></p>
                        </div>

                        
                    </div>
                </div>
            </div>




        
    </div>

<script type="text/javascript">

    $(document).ready(function(){
        $('[data-toggle="offcanvas"]').click(function(){
        $("#navigation").toggleClass("hidden-xs");
        });

        Swal.fire({
        title: 'Are you sure?',
        html: 'You want to start the assessment?<br><b>Do this in Left to Right method<b>',
        icon: 'info',
        allowOutsideClick: false,
        showDenyButton: true,
        confirmButtonText: `Start`,
        denyButtonText: `Cancel`,})
        .then((result) => {
          if (result.isConfirmed) {
          start();
          } else if (result.isDenied) {
            location.replace("../assessments.php");
          }
        })

        $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });

    });

    

    var ms=0,s=0,m=0;
    var timer;

    var stopWatch=document.querySelector('.stopwatch');
    function start(){
      timer=setInterval(run,10);
    }

    function run(){
      stopWatch.textContent=(m<10 ? "0" + m : m) +":"+(s<10 ? "0" + s : s)+":"+(ms<10 ? "0" + ms : ms);
      ms++;
      if(ms==100){
        ms=0;
        s++;
      }
      if(s==60){
        s=0;
        m++;
      }
    }

    function stop(){
      clearInterval(timer);
    }




    function getRandomNumber(start,end){
      let getNumber=Math.floor((Math.random() * end) + start);
      while(getNumber > end){
        getNumber=Math.floor((Math.random() * end) + start);
      }
    return getNumber;
    }   
    
    // Variables
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var test_name="Addition";
    var test_category="Beginner";
    var user="<?php echo $fetch_name['username'] ?>";
    var email="<?php echo $email ?>";
    var batch="<?php echo $fetch_name['batchid']?>";
    var cans=0;
    var wans=0;
    var ques=1;
    var question_no = 1;
    var isfive = false;
    let first=getRandomNumber(10,99);
    let second=getRandomNumber(10,99);
    let third=getRandomNumber(10,99);
    let fourth=getRandomNumber(10,99);
    let fifth=getRandomNumber(10,99);
    let sixth=getRandomNumber(10,99);

    $("#firstq").text(""+first);
    $("#secondq").text("+"+second);
    $("#thirdq").text("+"+third);
    $("#fourthq").text("+"+fourth);
    $("#fifthq").text("+"+fifth);
    $("#sixthq").text("+"+sixth);
    let oans=first+second+third+fourth+fifth+sixth;

    document.getElementById("userinput")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("button").click();
    }
});

    function isCheck(){
      var uans=$("#userinput").val();
            if(oans==uans){
                cans++;
                $( "#userinput" ).focus();
                $("#ans").text(`Correct answers are: ${cans}`);
                $("#aans").text(`Wrong answers are: ${wans}`);
               // ques++;
                // $("#next").html("<button onclick=nextq()>Next</button>");
            }else{
                wans++;
                $( "#userinput" ).focus();
                $("#ans").text(`Correct answers are: ${cans}`);
                $("#aans").text(`Wrong answers are: ${wans}`);
                //ques++;
                // $("#next").html("<button onclick=nextq()>Next</button>");
            }
    }

    function submit() {
       if(question_no < 15){
        question_no += 1;
        if(ques<=15){ 
            isCheck(); 
           console.log(question_no);
        }
            $("#userinput").val('');
            first=getRandomNumber(10,99);
            second=getRandomNumber(10,99);
            third=getRandomNumber(10,99);
            fourth=getRandomNumber(10,99);
            fifth=getRandomNumber(10,99);
            sixth=getRandomNumber(10,99);

            $("#firstq").text(" "+first);
            $("#secondq").text("+"+second);
            $("#thirdq").text("+"+third);
            $("#fourthq").text("+"+fourth);
            $("#fifthq").text("+"+fifth);
            $("#sixthq").text("+"+sixth);
            oans=first+second+third+fourth+fifth+sixth;
       }

          else{

            isCheck();
            stop();
            $("#firstq").text('');
            $("#secondq").text('');
            $("#thirdq").text('');
            $("#fourthq").text('');
            $("#fifthq").text('');
            $("#sixthq").text('');
            var currentdate = new Date(); 
            var submitted_at = currentdate.getDate() + " "
                + monthNames[currentdate.getMonth()] + " "
                + currentdate.getFullYear() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds() + " IST";
            var time=$(".stopwatch").text();
            console.log(time);
            $("#complete").text('Test Completed :');
            $("#ans").text('Correct answers are:\n' +cans);
            $("#aans").text('Wrong answers are:\n' +wans);
            $("#goto").html("<a href='../assessments.php'><button class='btn btn-primary btn-lg'>Go to Assessments</button></a>");

            $.ajax({
              url:"../result.php", 
              type:"POST",
              data:{correct:cans,wrong:wans,email:email,user:user,test_name:test_name,time:time,test_category:test_category,batch:batch,submitted_at:submitted_at},
              success:function (data){
                console.log(data);
              }
            })

            $("#question_part").hide();
            
            }
        }    

        

</script>


</body>
</html>
                           