<?php
 session_start();
 if(isset($_SESSION['user'])){
    if($_SESSION['user']=='admin'){
        header('Location: admin/dashboard.php');
    }
    else if($_SESSION['user']=='teachers'){
        header('Location: teacher/dashboard.php'); 
    }
    else if($_SESSION['user']=='students'){
        header('Location: student/dashboard.php'); 
    }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">      
        <div class="text-center mt-5 name">
          Oxford University
        </div>
        <br>
        <br>
        <br>
        <br>
        <form method="post" class="p-3 mt-5">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <br>
            <br>
            <br>
            <button type="submit" name="submit" value="submit" class="btn mt-5">Login</button>
        </form>
    <?php
        include 'connection.php';
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pswd = $_POST['pswd'];
        
            $query = "SELECT * FROM admin WHERE email='$email' AND password='$pswd'";
            $result = mysqli_query($con, $query);
            $admin = mysqli_fetch_array($result);
        
            $query = "SELECT * FROM teachers WHERE email='$email' AND password='$pswd'";
            $result = mysqli_query($con, $query);
            $teacher = mysqli_fetch_array($result);
        
            $query = "SELECT * FROM students WHERE email='$email' AND password='$pswd'";
            $result = mysqli_query($con, $query);
            $student = mysqli_fetch_array($result);
        
            if ($admin) {
                $_SESSION['user'] = 'admin';
                $_SESSION['id'] = $admin['id'];
                header("Location: admin/dashboard.php");
                exit();
            } else if ($teacher) {
                $_SESSION['user'] = 'teachers';
                $_SESSION['id'] = $teacher['id'];
                header("Location: teacher/dashboard.php");
                exit();
            } else if ($student) {
                $_SESSION['user'] = 'students';
                $_SESSION['id'] = $student['id'];
                header("Location: student/dashboard.php");
                exit();
            } else {
                echo "<span class='text-center text-danger'>Invalid Email or Password!</span>";
            }
        }

    ?>
    </div>
</body>
</html>