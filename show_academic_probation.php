<?php 
session_start();
require('functions.php');
require('functions2.php');

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
                <label><a href="home.php">Office of the</a></label>
                <label><a href="home.php">Prefect of Student Discipline</a></label>
            </div>
            <div class="navigation">
                <ul>
                    <div class="dropdown">
                        <button class="dropbtn">Records</button>
                        <div class="dropdown-content">
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
                <label>Summary of Academic Probation</label>
                <form action="" method="POST">
                    <input type="text" name="search" placeholder = "Search...">
                    <input type="submit" name = "issubmit" value="Search">
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Student Number</th>
                    <th scope="col">Amount of Failed Subjects</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($_POST['issubmit'])){
                            show_academic_probation($_POST['search']);
                            } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>