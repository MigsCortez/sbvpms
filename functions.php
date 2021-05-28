<?php
/* START OF LOGIN */
function login(){
require('config.php');
//START WRONG ENTRY
function wrong(){
    require('config.php');
    ?>
    <script>alert("Wrong username or password!");</script>
    <?php
    mysqli_close($conn);
    header("refresh:0;url = index.php");
}
//END WRONG ENTRY
$uname = mysqli_real_escape_string($conn,$_POST['uname']);
$passw = mysqli_real_escape_string($conn,$_POST['passw']);

$qry = "SELECT uname FROM admins WHERE '$uname' = uname";
$res = mysqli_query($conn,$qry);

if(mysqli_num_rows($res) <= 0){
    wrong();
}

else{
$qry = "SELECT * FROM admins WHERE '$uname' = uname";
$res = mysqli_query($conn,$qry);
while($row = mysqli_fetch_assoc($res)):
    $verification = password_verify($passw, $row['password']);
    if($verification){
        $_SESSION['user'] = $row['uname'];
        header("refresh:0;url=home.php");
    }
    else{
        wrong();
    }
endwhile;
}
}
/* END OF LOGIN */

/*START CHECK SESSION */
function logincheck(){
    if (empty($_SESSION['user'])){
        ?><script>alert("Session Expired!");</script><?php
        header("refresh:0;url = index.php");
    }
}
/*END CHECK SESSION */
/*START LOG OUT */
function logout(){
    require('config.php');
    session_destroy();
    mysqli_close($conn);
    header('location:index.php');
}
/*END LOG OUT */

/*START ADD PROBATION */
function addProbation(){
    require('config.php');
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $desc = mysqli_real_escape_string($conn,$_POST['description']);
    $count = 1;
    if($category =='Minor Offense'){
        $qry1 = "SELECT * FROM offenses WHERE category = 'Minor Offense'"; 
        $res = mysqli_query($conn,$qry1);
        while($row = mysqli_fetch_assoc($res)):
            $name = "A.1.$count";
            if($name == $row['name']){
                $count++;
            }
        endwhile;
        $name = "A.1.$count";
    }
    else if($category =='Major Offense'){
        $qry1 = "SELECT * FROM offenses WHERE category = 'Major Offense'";
        $res = mysqli_query($conn,$qry1);
        while($row = mysqli_fetch_assoc($res)):
            $name = "B.1.$count";
            if($name == $row['name']){
                $count++;
            }
        endwhile;
        $name = "B.1.$count";
    }
    $qry = "INSERT INTO offenses(name,category,description) VALUE('$name','$category','$desc')";
    mysqli_query($conn,$qry);

}
/*END ADD PROBATION */
/*START OF ADD STUDENT */
function add_student($studnumber,$fullName){
    require('config.php');
    $qry = "INSERT INTO dummyStudents VALUES('$studnumber','$fullName')";
    mysqli_query($conn,$qry);
}
/*END OF ADD STUDENT */

function count_MINOR(){
    require('config.php');
    $qry3 = "SELECT COUNT('Minor Offense') AS MinorOffenses,StudNo FROM offensesdetailsstudents WHERE $studno = StudNo";
    $res3 = mysqli_query($res, $qry);
    
    while($row = mysqli_fetch_assoc($res3)):
        if($row['MinorOffenses'] >= 5){
            $count_minor = $row['MinorOffenses'];
            $major_offense = 'B.1.39';
            $major_sacntion1 = ' ';
            $qry4 = "SELECT * FROM offenses WHERE '$major_offense' = name";
            $res4 = mysqli_query($conn,$qry4);
            while($row1 = mysqli_fetch_assoc($res4)):
                $descky = $row1['description'];
                $catss = $row1['category'];
            endwhile;
            $qry5 = "INSERT INTO offensesdetailsstudents(StudNo,category,name,description) VALUES('$studno','$catss','$major_offense','$descky')";
            mysqli_query($conn,$qry5);
            $qry6 = "INSERT INTO students_major_offense(StudNo,name,description,major_sanction,category) VALUES('$studno','$major_offense','$descky','$major_sacntion1','$catss')";
            mysqli_query($conn,$qry6);
        }
    endwhile;
} 

function add_Details_Students_Offenses(){
    require('config.php');
    $studno = mysqli_real_escape_string($conn,$_POST['StudentNumber']);
    $checkqry = "SELECT * FROM dummystudents WHERE '$studno' = studno";
    $checkresult = mysqli_query($conn,$checkqry);
    if(mysqli_num_rows($checkresult) <=0 ){
        ?>
        <script>alert("Student Number: <?php echo $studno?> does not exist in the database!");</script>
        <?php
        header("refresh:0; url = new_disciplinary_probation.php");
    }
    else{
    //$semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $offense = mysqli_real_escape_string($conn,$_POST['offense']);
   
    if($offense[0]=='B'){
        $major_sanction = $_POST['majorsanction'];
    }

    $qry = "SELECT * FROM offenses WHERE '$offense' = name";
    $res = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($res)){
        $category = $row['category'];
        $description = $row['description'];
    }
    if($offense[0]=='B'){
        $qry1 = "INSERT INTO students_major_offense (StudNo,name,description,major_sanction,category) VALUES('$studno','$offense','$description','$major_sanction','$category')";
        mysqli_query($conn,$qry1);
    }
        $qry2 = "INSERT INTO offensesdetailsstudents(StudNo,category,name,description) VALUES('$studno','$category','$offense','$description')";
        mysqli_query($conn,$qry2);

        $qry3 = "SELECT COUNT('Minor Offense')AS MinorOffenses,StudNo FROM offensesdetailsstudents WHERE '$studno' = StudNo AND category = 'Minor Offense'";
        $res3 = mysqli_query($conn, $qry3);
        
        while($row = mysqli_fetch_assoc($res3)):
            if($row['MinorOffenses'] >= 5){
                $count_minor = $row['MinorOffenses'];
                $major_offense = 'B.1.39';
                $major_sacntion1 = ' ';
                $qry4 = "SELECT * FROM offenses WHERE '$major_offense' = name";
                $res4 = mysqli_query($conn,$qry4);
                while($row1 = mysqli_fetch_assoc($res4)):
                    $descky = $row1['description'];
                    $catss = $row1['category'];
                endwhile;
                $qry5 = "INSERT INTO offensesdetailsstudents(StudNo,category,name,description) VALUES('$studno','$catss','$major_offense','$descky')";
                mysqli_query($conn,$qry5);
                $qry6 = "INSERT INTO students_major_offense(StudNo,name,description,major_sanction,category) VALUES('$studno','$major_offense','$descky',11,'$catss')";
                mysqli_query($conn,$qry6);
            }
        endwhile;
    }
}
//

function show_disciplinary_minor($studno){
    require('config.php');
    
    $qry0 = "SELECT DISTINCT StudNo 
            FROM offensesdetailsstudents 
            WHERE studno LIKE '%$studno%'";
    $re = mysqli_query($conn,$qry0);

    while($row = mysqli_fetch_assoc($re)):
        $studno=$row['StudNo'];
        $qry = "SELECT  StudNo,COUNT('Minor Offense') 
        AS COUNT_Minor 
        FROM offensesdetailsstudents 
        WHERE studno LIKE '%$studno%'
        AND category = 'Minor Offense'";
        
        /*$qry = "SELECT  StudNo,COUNT('Minor Offense') 
        AS COUNT_Minor 
        FROM offensesdetailsstudents 
        WHERE studno='$studno'AND category = 'Minor Offense' OR studno LIKE '%$studno%'
        AND category = 'Minor Offense'";*/

        $res = mysqli_query($conn,$qry);

            while($row = mysqli_fetch_assoc($res)):
                $countMinor = $row['COUNT_Minor'];
            endwhile;

        if($countMinor > 0){
            $qry1 = "SELECT * FROM minor_sanctions WHERE id = $countMinor";
            $res = mysqli_query($conn,$qry1);
            
            while($row1=mysqli_fetch_assoc($res)):
                    $minorsanction = $row1['description'];
            endwhile;
        }
        else{
            $minorsanction = '';
        }
            $qry1 = "SELECT COUNT('Major Offense')AS COUNT_Major 
            FROM offensesdetailsstudents 
            WHERE studno = '$studno' 
            AND category = 'Major Offense'";

            $res1 = mysqli_query($conn,$qry1);
            while($row1 = mysqli_fetch_assoc($res1)):
                $countMajor = $row1['COUNT_Major'];
            endwhile;
           ?>
        <?php
            $qry7 = "SELECT * FROM dummyStudents WHERE studno = '$studno'";
            $res2 = mysqli_query($conn,$qry7);
            
            while($row2 = mysqli_fetch_assoc($res2)):
                $full = $row2['fullName'];
            endwhile;
        ?>
        <form action="<?php echo $link ?>" method="POST">
            <tr>
                <?php if($countMajor > 0){?>
                    <th><input type="submit" class="studno" formaction="show_records_disciplinary_major.php" value="<?php echo $studno; ?>">
                        <input type="hidden" name="val_studno" value="<?php echo $studno; ?>"></th>
                <?php }
                else{
                    ?>
                    <td><input type="hidden"  name="val_studno" value="<?php echo $studno;?>"><?php echo $studno; ?></td>
                    <?php
                }
                ?>
                    <td><input type="hidden"  name="fullName" value="<?php echo $full;?>"><?php echo $full; ?></td>
                <?php
                if($countMinor <= 0){?>
                    <td><?php echo $countMinor; ?></td>
                <?php
                }
                else{
                    ?>
                    <th><input type="submit" class="studno" name="val_minor" formaction="show_records_disciplinary_minor.php" value="<?php echo $countMinor; ?>"></th>
                <?php
                }
                ?>
                <td><?php echo $minorsanction; ?></td>
                <td><?php echo $countMajor;?></td>
            </tr>
        </form>
        <?php
   endwhile;
    
}
//START
function dropDownOffenses(){
    require('config.php');
    $qry = "SELECT name,category,LEFT(description, 75)AS description FROM offenses WHERE category='Minor Offense' ORDER BY id";
    $res = mysqli_query($conn,$qry);
    ?>
        <optgroup label="Minor Offense">
    <?php
    while($row = mysqli_fetch_assoc($res)):
    ?>    
        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; echo $row['description'];?></option>
    <?php
    endwhile;
    ?>
    </optgroup>
    <?php
  
    $qry1 = "SELECT name,category,LEFT(description, 75)AS description FROM offenses WHERE category='Major Offense' ORDER BY id";
    $res = mysqli_query($conn,$qry1);
    ?>
    <optgroup label="Major Offense">
    <?php
    while($row1 = mysqli_fetch_assoc($res)):
    ?> 
        <option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']." ".$row1['description'];?></option>
    <?php
    endwhile;
    ?>
    </optgroup>
    <?php
}//END

//START
function dropDownMajorSanctions(){
    require('config.php');
    $qry = "SELECT id,LEFT(description,100)AS description FROM major_sanctions";
    $res = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($res)):
        ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></option>
        <?php
    endwhile;

}
//END
//START
function show_disciplinary_major(){
    require('config.php');
    $studno = $_POST['val_studno'];
    $qry = "SELECT * FROM students_major_offense WHERE studno = '$studno'";
    $res = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($res)):
        $major = $row['major_sanction'];
        $qry1 = "SELECT * FROM major_sanctions WHERE id = $major";
        $res1 = mysqli_query($conn,$qry1);

        while($row1  = mysqli_fetch_assoc($res1)):
            $description = $row1['description'];
        endwhile;
        ?>
        <tr>
            <td><?php echo $row['StudNo']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $description; ?></td>
        </tr>
        <?php
    endwhile;
        
}
//END
//START
function show_disciplinary_report_minor(){
    require('config.php');
    $studno = mysqli_real_escape_string($conn,$_POST['val_studno']);
    $qry = "SELECT * FROM offensesdetailsstudents WHERE '$studno' = StudNo AND category = 'Minor Offense'";
    $res = mysqli_query($conn,$qry);

    while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr>
            <td><?php echo $row['StudNo']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
        </tr>
        <?php
    endwhile;
}
//END