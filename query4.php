<?php
include 'connectdb.php';

// Funcion to check what the url ends with
function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}

// Checks url value
if (isset($_POST["q4_7"])) {
    if ($_POST["q4_7"] != "") {
        if (endsWith($_POST["q4_7"], ".jpg") || endsWith($_POST["q4_7"], ".png")) {      
            $_POST["q4_7"] = $_POST["q4_7"];
        }
        else {
            // Discard provided URL if it does not end with .jpg or .png   
            $_POST["q4_7"] = "";
        }
    }
}

// Creates a new trip
if (isset($_POST["q4_1"]) && isset($_POST["q4_2"]) && isset($_POST["q4_3"]) && isset($_POST["q4_4"]) && isset($_POST["q4_5"]) && isset($_POST["q4_6"])) {
    // Checks if start date is before end date
    if ($_POST["q4_3"] <= $_POST["q4_4"]) {
        $query = "INSERT INTO bustrips VALUES('" . $_POST["q4_1"] . "', '" . $_POST["q4_2"] . "', '" . $_POST["q4_3"] . "','" . $_POST["q4_4"] . "', '" . $_POST["q4_5"] . "', '" . $_POST["q4_6"] . "', '" . $_POST["q4_7"] . "')";
        $result = mysqli_query($connection, $query);    
        if (!$result) {
            $errorMessage = mysqli_error($connection);
        }
    }
}
// Close database connection
$connection->close();
// Return back to main page
header("Location:index2.php?error4={$errorMessage}");
