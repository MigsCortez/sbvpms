<?php 
session_start();
require('functions.php');
logincheck();
if(isset($_POST['logout'])){
    logout();
}
if(isset($_POST['submit'])){
    addProbation();
}
?>

<html>
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mainStyle2.css">
    <title>OPSD | New Probation</title>
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
                            <a href="#">Disciplinary Probation</a>
                            <a href="#">Retention</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">New Record</button>
                        <div class="dropdown-content">
                            <a href="new_academic_probation.php">Academic Probation</a>
                            <a href="#">Disciplinary Probation</a>
                            <a href="#">Retention</a>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <input type="submit" class="logout" name="logout" value="LogOut">
                    </form>
                </ul>
            </div>
        </div>
        <div class="MainBody">
            <div class="container1">
                <label id="title">New Probation</label>
                <div class="mainForm">
                    <!--START OF FORM-->
                    <form action="" method="POST">
                        <div class="subForm">
                            <div class="subsubForm">
                                <label class="indent" for="exampleFormControlSelect1">Category</label>
                                <div class="categs">
                                    <input type="radio" name="category" value="Minor Offense">Minor Offense
                                    <input type="radio" name="category" value="Major Offense">Major Offense
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea name="description" class="form-control col-" id="exampleFormControlTextarea1" cols="50" rows="6"></textarea>
                                </div>
                                <input type="submit" name="submit" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                    <!--END OF FORM-->
                </div>
            </div>
        </div>
    </div>
    <script src="js/mainjjs.js"></script>
</body>
</html>