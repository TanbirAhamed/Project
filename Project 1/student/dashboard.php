<?php
    ob_start();
    session_start();

    //authentication
    if (!isset($_SESSION['user'])) {
        header('Location: ../include/logout.php');
    }

    //authorization (end to end verification)
    if ($_SESSION['user'] != 'students') {
        header('Location: ../unauthorised.php');
    }
?>
<?php include '../connection.php'; ?>
<?php 
    $t_id = $_SESSION['id'];
    $s = "SELECT * FROM students WHERE id= $t_id";
    $q = mysqli_query($con, $s);
    $r = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html
  lang="en">
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
                    <h2>Student</h2>
                      <form action="" method="post">
                          <div style="margin-bottom: 10px;">
                              <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
                              <input type="text" name="name" class="form-control" value="<?php echo $r['name'] ?>" id="name" style="width: 100%; padding: 8px;">
                          </div>
                          <div style="margin-bottom: 10px;">
                              <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
                              <input type="email" name="email" class="form-control" value="<?php echo $r['email'] ?>" id="email" style="width: 100%; padding: 8px;">
                          </div>
                          <div style="margin-bottom: 10px;">
                              <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
                              <input type="password" name="password" class="form-control" value="<?php echo $r['password'] ?>" id="password" style="width: 100%; padding: 8px;">
                          </div>
                          <div>
                              <button type="submit" class="btn btn-primary mt-1" name="submitBtn" >Update</button>
                          </div>
                      </form>
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
        $admin_name = $_POST["name"];
        $admin_email = $_POST["email"];
        $admin_password = $_POST["password"];
        $str = "UPDATE students SET name='".$admin_name."', 
                    email='".$admin_email."', password='".$admin_password."'
                    WHERE id='$t_id'";
        if(mysqli_query($con, $str)){
            header('Location: dashboard.php');
        }
    }
    ob_end_flush();
?>
