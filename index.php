<?php
session_start();
require('functions.php');

if(isset($_POST['loginBtn'])){
    login();
}
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>OPSD</title>
</head>

<body>
<div class="mainContainer">
    <div class="subMainContainer">
        <div class="leftSide">

        </div>
        <div class="rightSide">
            <div class="deptTitle">
                <label>OFFICE OF THE PREFECT OF STUDENT DISCIPLINE</label>
            </div>
            <div class="myForm">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group pass">
                            <label>Password</label>
                            <input type="password" name="passw" class="form-control" placeholder="Enter password">
                        </div>
                        <input type="submit" name="loginBtn" class="btn btn-dark btn-lg btn-" value="Log-in">
                    </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>