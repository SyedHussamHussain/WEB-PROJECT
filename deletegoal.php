<?php


$conn = mysqli_connect("localhost","root","","homeapp");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($conn, $_POST['firstn']);

// Delete the member from the database
$sql = "DELETE FROM savings_goals WHERE goal_name='$name'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>