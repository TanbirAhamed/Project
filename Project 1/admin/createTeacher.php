<?php
    session_start();

    //authentication
    if(!isset($_SESSION['user'])){
        header('Location: ../include/logout.php');
    }

    //authorization (end to end verification)
    if($_SESSION['user'] != 'admin'){
        header('Location: ../unauthorised.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">  <br><br><br>
        <h1>Register Teacher Here</h1>
        <form action="" method="post">
            <div class="form-group">
                <?php include 'include/sidebar.php'; ?>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="cnf_password" class="form-control" id="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
include '../connection.php';
    if(isset($_POST['submitBtn'])){
        $teacher_name = $_POST["name"];
        $teacher_email = $_POST["email"];
        $password = $_POST["password"];
        $cnf_password = $_POST["cnf_password"];
        if($password == $cnf_password){
            $str = "INSERT INTO teachers(name, email, password)
            VALUES 
            ('".$teacher_name."', '".$teacher_email."', '".md5($password)."')";
            if(mysqli_query($con, $str)){
                header('Location: teachers.php');
            }
        }
        else {
            echo 'Password Mismatch';
        }

        
    }

?>