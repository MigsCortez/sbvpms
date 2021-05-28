<?php
function drop_Down_School_Year(){
    $starting_year = 2000;

    for($i = 0; $i < 50 ;$i++){
        ?> 
        <option><?php echo "$starting_year - "; echo $starting_year+1; ?></option>
        <?php
        $starting_year++;
    }
}

function add_to_academic_probation_db($studno,$failed1,$failed2,$failed3,$semester,$sy){
    require('config.php');

    $qry1_check = "SELECT * FROM dummystudents WHERE '$studno' = studno";
    $res1_check = mysqli_query($conn,$qry1_check);

    if(mysqli_num_rows($res1_check) <= 0){
        ?>
        <script>alert("Student Number: <?php echo $studno?> does not exist in the database!")</script>
        <?php
    }
    else{
        if(!empty($failed1)){
        $qry1_add = "INSERT INTO students_academic_probation(StudNo,Subjects,semester,school_year)
                    VALUES('$studno','$failed1','$semester','$sy')";
        mysqli_query($conn,$qry1_add);
        }
        if(!empty($failed2)){
        $qry2_add = "INSERT INTO students_academic_probation(StudNo,Subjects,semester,school_year)
                    VALUES('$studno','$failed2','$semester','$sy')";
        mysqli_query($conn,$qry2_add);
        }
        if(!empty($failed3)){
        $qry3_add = "INSERT INTO students_academic_probation(StudNo,Subjects,semester,school_year)
                    VALUES('$studno','$failed3','$semester','$sy')";
        mysqli_query($conn,$qry3_add);
        }
    }
}

function show_academic_probation($search){
    require('config.php');

    $qry1_show = "SELECT DISTINCT studno
                FROM students_academic_probation 
                WHERE studno LIKE '%$search%'";
    $res1_show = mysqli_query($conn,$qry1_show);

    while($row1_show = mysqli_fetch_assoc($res1_show)):
        $stud_show = $row1_show['studno'];
        
        $qry2_show = "SELECT COUNT(Subjects)AS count_subjects 
                    FROM students_academic_probation 
                    WHERE StudNo = '$stud_show'";
        $res2_show = mysqli_query($conn,$qry2_show);
        
        while($row2_show = mysqli_fetch_assoc($res2_show)):
            $subject_count_show = $row2_show['count_subjects'];
        endwhile;
        ?>
        <tr>
            <form action="show_detailed_academic_probation.php" method="POST">
                <th><input type="submit" class="studno_show1" value="<?php echo $stud_show; ?>"></th>
                <input type="hidden" name="studno_show" value="<?php echo $stud_show; ?>">
                <td><?php echo $subject_count_show; ?></td>
            </form>
        </tr>
        <?php
    endwhile;

}

function show_detailed_academic_probation(){
    require('config.php');
    $stud_detailed = mysqli_real_escape_string($conn,$_POST['studno_show']);
    
    $qry1_detailed = "SELECT * FROM students_academic_probation WHERE studno = '$stud_detailed'";
    $res1_detailed = mysqli_query($conn,$qry1_detailed);

    while($row1_detailed = mysqli_fetch_assoc($res1_detailed)):
        ?>
        <tr>
            <td><?php echo $stud_detailed; ?></td>
            <td><?php echo $row1_detailed['Subjects']; ?></td>
            <td><?php echo $row1_detailed['semester']; ?></td>
            <td><?php echo $row1_detailed['school_year']; ?></td>
        </tr>
        <?php
    endwhile;

}