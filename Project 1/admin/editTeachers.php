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
    <div class="container my-5">
        <h2>Edit Teacher Here</h2>
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
                <button type="submit" class="btn btn-secondary" name="submitBtn">Update</button>
            </div>
        </form>
    </div>
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