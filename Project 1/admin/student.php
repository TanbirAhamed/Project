<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />     
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
                                    <table class="table table-striped" id="example">
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
                                                $sql = "SELECT * FROM students";
                                                $result = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td>
                                                    <button onclick="window.location.href='editStudent.php?tId=<?php echo $row['id']; ?>'" class="btn btn-warning btn-sm mr-2">Edit</button>
                                                    <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm mr-2">Delete</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="profileReportChart"></div>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        function confirmDelete(studentId) {
            // Display a confirmation dialog
            var confirmDelete = confirm("Are you sure you want to delete this Student?");

            // If the user clicks "OK" in the confirmation dialog
            if (confirmDelete) {
                // Redirect to the deleteTeachers.php with the teacherId
                window.location.href = 'deleteStudents.php?tId=' + studentId;
            }
        }

        $(document).ready(function () {
            $("#example").DataTable({
                lengthMenu: [7], // Set the default page length to 7
                paging: true, // Enable pagination
                // Add Bootstrap styling options
                "dom": '<"top"lf>rt<"bottom"ip><"clear">'
            });
        });
    </script>
</body>
</html>
