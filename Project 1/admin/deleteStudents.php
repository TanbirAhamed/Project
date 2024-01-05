<?php 
    include '../connection.php';
    $student_id = $_REQUEST['tId'];
    $str = "DELETE from students WHERE id=$student_id";
    if(mysqli_query($conn, $str)){
        header('Location: student.php');
    }
?>