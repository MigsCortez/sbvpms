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
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
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
                            <a href="#">Academic Probation</a>
                            <a href="show_records_disciplinary.php">Disciplinary Probation</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">New Record</button>
                        <div class="dropdown-content">
                            <a href="new_academic_probation.php">Academic Probation</a>
                            <a href="new_disciplinary_probation.php">Disciplinary Probation</a>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <input type="submit" class="logout" name="logout" value="LogOut">
                    </form>
                </ul>
            </div>
        </div>
        <div class="showTable">
            <div class="cat">
                <label>Minor Offenses</label>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Student Number</th>
                    <th scope="col">Minor Offenses</th>
                    <th scope="col">Description</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php show_disciplinary_report_minor(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>