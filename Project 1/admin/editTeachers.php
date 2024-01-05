<?php
    session_start();

    //authentication
    if (!isset($_SESSION['user'])) {
        header('Location: ../include/logout.php');
    }

    //authorization (end to end verification)
    if ($_SESSION['user'] != 'admin') {
        header('Location: ../unauthorised.php');
    }
?>
<?php include '../connection.php'; ?>
<?php 
    $t_id = isset($_REQUEST['tId']) ? $_REQUEST['tId'] : 0;
    $s = "SELECT * FROM teachers WHERE id=" . $t_id;
    $q = mysqli_query($con, $s);
    $r = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teachers Here</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
                        <h2>Edit Students Here</h2>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $r['name'] ?>" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $r['email'] ?>" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $r['password'] ?>" id="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary" name="submitBtn">Update</button>
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
    if(isset($_POST['submitBtn'])){
        $teacher_name = $_POST["name"];
        $teacher_email = $_POST["email"];

        $str = "UPDATE teachers SET name='".$teacher_name."', 
                    email='".$teacher_email."'
                    WHERE id='$t_id'";


        if(mysqli_query($con, $str)){
            header('Location: teachers.php');
        }
    }

?>