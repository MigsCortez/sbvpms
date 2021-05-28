<?php 
session_start();
require('functions.php');
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
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
    <link rel="stylesheet" type="text/css" href="css/mainStyle2.css">
    <title>OPSD | Academic Probation</title>
</head>
<body>
    <div class="MainContainer">
        <div class="TopBar">
            <div class="opsd">
                <label>Office of the</label>
                <label>Prefect of Student Discipline</label>
            </div>
            <div class="navigation">
                <ul>
                    <div class="dropdown">
                        <button class="dropbtn">Records</button>
                        <div class="dropdown-content">
                            <a href="show_academic_probation.php">Academic Probation</a>
                            <a href="show_records_disciplinary.php">Disciplinary Probation</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">New Record</button>
                        <div class="dropdown-content">
                            <a href="new_academic_probation.php">Academic Probation</a>
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
                <!--START OF FORM-->
                <form action="" method="POST">
                        <div class="subForm">
                            <div class="subsubForm">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Student Number</label>
                                    <input type="text" name="StudentNumber" class="form-control" id="exampleFormControlInput1" placeholder="E.g C-123456" require>
                                </div>
                                <!-- <label>Semester</label>
                                 <div class="semesters">
                                    <input type="radio" name="semester" value="1st Semester">1st Semester
                                    <input type="radio" name="semester" value="2nd Semester">2nd Semester
                                </div> -->
                                <label>Offense</label>
                                <div class="input-group mb-3">
                                    <select name="offense" class="custom-select" id="major_sanctions" onchange="showSelect()">
                                        <?php dropDownOffenses(); ?>
                                    </select>
                                </div>
                                <!--SHOW IF MAJOR OFFENSE-->
                                <div style="display:none;" class="majorsanctions" id="dropMajorSanctions">
                                    <label>Major Sanction</label>
                                </div>
                                <div class="input-group mb-2" id="dropMajorSanctionss">
                                    <select name="majorsanction" class="custom-select" id="inputGroupSelect02" >
                                        <?php dropDownMajorSanctions(); ?>
                                    </select>
                                </div>
                                <input type="submit" name="submit" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                    <!--END OF FORM-->
            </div>
        </div>
    </div>
<script src="node_modules/jquery/src/jquery.js"></script>
<script src="js/mainjjs.js"></script>
</body>
</html>