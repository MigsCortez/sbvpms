<?php 
session_start();
//The functions.php contains all the methods for Disciplinary Probations.
require('functions.php');
//functions2.php contains the methods for the Academic Probations.
require('functions2.php');

logincheck();
if(isset($_POST['logout'])){
    logout();
}
if(isset($_POST['submit'])){
    add_Details_Students_Offenses();
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/forAcademic.css">
    
    <title>OPSD | Academic Probation</title>
</head>
<body>
    <div class="MainContainer">
        <div class="TopBar">
            <div class="opsd">
                <label><a href="home.php">Office of the</a></label>
                <label><a href="home.php">Prefect of Student Discipline</a></label>
            </div>
            <div class="navigation">
                <ul>
                    <div class="dropdown">
                        <button class="dropbtn">Records</button>
                        <div class="dropdown-content">
                            <a href="show_records_disciplinary.php">Disciplinary Probation</a>
                            <a href="show_academic_probation.php">Academic Probation</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">New Record</button>
                        <div class="dropdown-content">
                            <a href="new_disciplinary_probation.php">Disciplinary Probation</a>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <input type="submit" class="logout" name="logout" value="LogOut">
                    </form>
                </ul>
            </div>
        </div>
        <div class="MainBody">
            <div class="container2">
                <div class="AcadProb">
                    <label>Academic Probation</label>
                </div>
                <div>
            <!--START OF FORM-->
                <form action="" method="POST">
                    <label>Student Number</label>
                    <input type="text" name="StudentNumber" class="form-control" id="exampleFormControlInput1" placeholder="E.g C-123456" require>
                    <label>Semester</label>
                    <div class="forSemester">
                        <input type="radio" name = "semester" value="1st Semester">1st Semester
                        <input type="radio" name="semester" value="2nd Semester">2nd Semester
                    </div>
                    <label>School Year</label>
                    <div class="select_sy">
                        <select name="sy" class="custom-select" id="inputGroupSelect02">
                            <?php drop_Down_School_Year(); ?>
                        </select>
                    </div>
                    <label>Subjects</label>
                    <input type="text" name="failed1" class="form-control" id="exampleFormControlInput1" placeholder="E.g MTH06,ENG01" require>
                    <input type="text" name="failed2" class="form-control" id="exampleFormControlInput1" placeholder="E.g MTH06,ENG01" require>
                    <input type="text" name="failed3" class="form-control" id="exampleFormControlInput1" placeholder="E.g MTH06,ENG01" require>
                    <!-- <button onclick="" name="" class="btn btn-danger">Add More...</button> -->
                    <input type="submit" name = "acd" class="btn btn-danger">
                </form>
                <!--END OF FORM-->
                <?php 
                    if(isset($_POST['acd'])){
                        add_to_academic_probation_db($_POST['StudentNumber'],$_POST['failed1'],$_POST['failed2'],$_POST['failed3'],$_POST['semester'],$_POST['sy']);
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <script href="js/forAcadmic.js"></script>
</body>
</html>