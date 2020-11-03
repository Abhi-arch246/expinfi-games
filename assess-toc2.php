
<h2 class="text-center"><span class="badge badge-secondary p-2 mt-4">Beginner level assessments :</span></h2>
<div class="container">
    <div class="row" style="margin-top:30px;">
        <?php
        $exam="SELECT * FROM exams WHERE examlevel='Beginner' AND batchid='TOCL2'";
        $examquery=mysqli_query($conn,$exam);
        while($fetch_exam=mysqli_fetch_assoc($examquery))
        {
        ?>
        <div class="col-md-4 p-1">
            <a href="<?php echo $fetch_exam['examlink']?>" class="text-decoration-none">
            <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center mt-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
                <?php
                $exam_name=$fetch_exam['examname'];
                $check=mysqli_query($conn,"SELECT * FROM results WHERE email='$email' AND test_name='$exam_name' AND examlevel='Beginner'");
                if(mysqli_num_rows($check)==0){
                    ?>
                <h6 class="animate__animated animate__flash animate__infinite">ASSESSMENT PENDING!</h6>
                <h6>You haven't done it yet</h6>
                <?php
                }
                else{
                ?>
                <h6>You have finished the assessment and attempted it <?php echo mysqli_num_rows($check);?> time(s)</h6>
                
                <?php
                }
                ?>
            </div>
            </a>
        </div>

        <?php
        }
        ?>     
    </div>
 </div>
<hr class="mx-2 my-5" style="border-bottom: 6px solid #696969;">
<h2 class="text-center"><span class="badge badge-secondary p-2">Advanced level assessments :</span></h2>
<div class="container">
    <div class="row" style="margin-top:30px;">
        <?php
        $exam="SELECT * FROM exams WHERE examlevel='Advanced' AND batchid='TOCL2'";
        $examquery=mysqli_query($conn,$exam);
        while($fetch_exam=mysqli_fetch_assoc($examquery))
        {
        ?>
        <div class="col-md-4 p-1">
            <a href="<?php echo $fetch_exam['examlink']?>" class="text-decoration-none">
            <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center mt-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
                <?php
                $exam_name=$fetch_exam['examname'];
                $check=mysqli_query($conn,"SELECT * FROM results WHERE email='$email' AND test_name='$exam_name' AND examlevel='Advanced'");
                if(mysqli_num_rows($check)==0){
                    ?>
                <h6 class="animate__animated animate__flash animate__infinite">ASSESSMENT PENDING!</h6>    
                <h6>You haven't done it yet</h6>
                <?php
                }
                else{
                ?>
                <h6>You have finished the assessment and attempted it <?php echo mysqli_num_rows($check);?> time(s)</h6>
                
                <?php
                }
                ?>
            </div>
            </a>
        </div>

        <?php
        }
        ?>     
    </div>
 </div>     