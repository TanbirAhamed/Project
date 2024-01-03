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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <!-- Sidebar -->
        <?php include 'include/sidebar.php'; ?>
        <!-- Sidebar -->
    </header>
    
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <h2>Teachers Table</h2>
            <table class="table table-striped table-bordered" style="width:100%" id="example">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../connection.php';
                        $sql = "SELECT * FROM teachers";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>
                            <button href = "editTeachers.php" class="btn btn-warning btn-sm mr-2">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                $("#example").DataTable({
                    lengthMenu: [7], // Set the default page length to 7
                    paging: true // Enable pagination
                });
            });
        </script>
    </div>
    </main>

    
</body>
</html>
