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
<meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      
    <title>Dashboard</title>
    <meta name="description" content="" />  
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'include/sidebar.php'; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include 'include/navbar.php'; ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="col-12 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="card-title">
                            <h2>Create Student</h2>
                            <form action="" method="post">
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
                      </div>
                      <div id="profileReportChart"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->   
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
            $str = "INSERT INTO students(name, email, password)
            VALUES 
            ('".$teacher_name."', '".$teacher_email."', '".md5($password)."')";
            if(mysqli_query($con, $str)){
                header('Location: student.php');
            }
        }
        else {
            echo 'Password Mismatch';
        }

        
    }

?>
