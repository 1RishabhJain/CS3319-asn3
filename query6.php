<?php
include 'connectdb.php';

// Create a booking
if (isset($_POST["q6_1"]) && isset($_POST["q6_2"]) && isset($_POST["q6_3"])) {
    $query = "INSERT INTO bookings VALUES('" . $_POST["q6_3"] . "', '" . $_POST["q6_2"] . "', '" . $_POST["q6_1"] . "')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "Failed to create trip. Error: ". mysqli_error($connection);
    }
}
// Close database connection
$connection->close();
// Return back to main page
header("Location:index2.php");