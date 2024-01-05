<?php
include '../connection.php';

$t_id = isset($_GET['tId']) ? $_GET['tId'] : 0;

// Check if the student with the given ID exists
$check_query = "SELECT * FROM students WHERE id=" . $t_id;
$check_result = mysqli_query($con, $check_query);

if ($check_result && mysqli_num_rows($check_result) > 0) {
    // Student exists, proceed with deletion
    $delete_query = "DELETE FROM students WHERE id=" . $t_id;
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        // Successful deletion
        echo "Student with ID " . $t_id . " has been deleted successfully.";
    } else {
        // Error in deletion
        echo "Error deleting student with ID " . $t_id;
    }
} else {
    // Student does not exist
    echo "Student with ID " . $t_id . " does not exist.";
}

// Close the database connection
mysqli_close($con);
?>
