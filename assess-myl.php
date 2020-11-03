
<div class="bg-secondary mt-4 rounded p-2 text-white">
    <h5 class="text-center mt-2">Hello all welcome to the workshop of Mathlete Young Learners,hope you're doing well</h5>
    <h5 class="text-center">Wishing you a Happy Dussehra. Go, finish the assessments below and try do it them in regular school manner or whatever method you know of.</h5>
    </div>
<div class="container">
    
    
    <div class="row" style="margin-top:30px;">
        <?php
        $exam="SELECT * FROM exams WHERE batchid='MYL'";
        $examquery=mysqli_query($conn,$exam);
        while($fetch_exam=mysqli_fetch_assoc($examquery))
        {
        ?>
        <div class="col-md-4 p-1">
            <a href="<?php echo $fetch_exam['examlink']?>" class="text-decoration-none">
            <div class="text-center p-4" style="background-color: <?php echo $fetch_exam['examcolor'] ?>;border-radius:10px;color:#fff;">
                <i class="fas <?php echo $fetch_exam['examicon']?> fa-5x"></i>
                <h1 class="text-center my-2" style="font-size: 35px;"><?php echo $fetch_exam['examname'] ?></h1>
                <?php
                $exam_name=$fetch_exam['examname'];
                $check=mysqli_query($conn,"SELECT * FROM results WHERE email='$email' AND test_name='$exam_name'");
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
