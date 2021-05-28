<?php 
session_start();
require('functions.php');
logincheck();
if(isset($_POST['logout'])){
    logout();
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/forHome.css">
    <title>OPSD</title>
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
                            <a href="show_records_disciplinary.php">Disciplinary Probation</a>
                            <a href="show_academic_probation.php">Academic Probation</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">New Record</button>
                        <div class="dropdown-content">
                            <a href="new_disciplinary_probation.php">Disciplinary Probation</a>
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
            <div class="addsstudents">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Student Number</label>
                        <input type="text" name="StudentNumber" class="form-control" id="exampleFormControlInput1" placeholder="E.g C-123456" require>
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input type="text" name="studentname" class="form-control" id="exampleFormControlInput1" placeholder="E.g Jose Claudio V. Cordova" require>
                        <input type="submit" name="submit" class="btn btn-danger">
                    </div>
                </form>
                <?php if(isset($_POST['submit'])){ 
                        add_student($_POST['StudentNumber'],$_POST['studentname']);
                        }   ?>

            </div>
        </div>
    </div>
</body>
</html>