<?php
include 'connectdb.php';
$idDelete = 0;

// while loop to increment idDelete int until the selected id is found
while (true) {
    if (isset($_POST[$idDelete])) {
        break;
    }
    $idDelete++;
}
// Deletes the trip
if (isset($_POST["q3"])) {
    if ($_POST["q3"] == 'yes') {
        $query = "DELETE FROM bustrips WHERE tripid = $idDelete";
        $result = mysqli_query($connection, $query);    
        if (!$result) {
            $errorMessage = mysqli_error($connection);
        }
    }
}
// Close database connection
$connection->close();
// Return back to main page
header("Location:index2.php?error3={$errorMessage}");
