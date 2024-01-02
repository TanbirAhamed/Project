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
<?php 
 include '../connection.php';
    $t_id = isset($_REQUEST['tId']) ? $_REQUEST['tId'] : 0;
    $s = "SELECT * FROM admin WHERE id=" . $t_id;
    $q = mysqli_query($con, $s);
    $r = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Main Navigation -->
    <header>
        <!-- Sidebar -->
        <?php include 'include/sidebar.php'; ?>
        <!-- Sidebar -->
    </header>
    <!-- Main Navigation -->

    <!-- Main layout -->
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $r['name']?>" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $r['email']?>" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $r['password']?>" id="password">
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-secondary" name="submitBtn">Update</button>
                </div>
            </form>
        </div>
    </main>
    <!-- Main layout -->
</body>
</html>

<?php 
    if(isset($_POST['submitBtn'])){
        $teacher_name = $_POST["name"];
        $teacher_email = $_POST["email"];
        $teacher_password = $_POST["password"];

        $str = "UPDATE admin SET name='".$teacher_name."', 
                    email='".$teacher_email."', 
                    password='".$teacher_password."' 
                    WHERE id=$t_id";

        if(mysqli_query($con, $str)){
            header('Location: teachers.php');
            exit();
        } else {
            echo "<span class='text-center text-danger'>Error updating record: " . mysqli_error($con) . "</span>";
        }
    }
?>
