<?php
include 'connectdb.php';
$idEdit = 0;

// Funcion to check what the url ends with
function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}

// while loop to increment idEdit int until the selected id is found
while (true) {
    if (isset($_POST[$idEdit])) {
        break;
    }
    $idEdit++;
}
// Edits only the values that are set
// Update tripname
if (isset($_POST["q2_1"])) {
    if ($_POST["q2_1"] != "") {
        $query = "UPDATE bustrips SET tripname = '" . $_POST["q2_1"] . "' WHERE tripid = $idEdit";
        $result = mysqli_query($connection, $query);
    }
}
// Update startdate
if (isset($_POST["q2_2"])) {
    $query = $connection->query("SELECT enddate FROM bustrips WHERE tripid = $idEdit;");
    $row = $query->fetch_assoc();
    if ($_POST["q2_2"] < $row['enddate']){
        $query = "UPDATE bustrips SET startdate = '" . $_POST["q2_2"] . "' WHERE tripid = $idEdit";
        $result = mysqli_query($connection, $query);
    }    
}
// Update enddate
if (isset($_POST["q2_3"])) {
    $query = $connection->query("SELECT startdate FROM bustrips WHERE tripid = $idEdit;");
    $row = $query->fetch_assoc();
    if ($_POST["q2_3"] > $row['startdate']){
        $query = "UPDATE bustrips SET enddate = '" . $_POST["q2_3"] . "' WHERE tripid = $idEdit";
        $result = mysqli_query($connection, $query);
    }
}

// Update url
if (isset($_POST["q2_4"])) {
    if ($_POST["q2_4"] != "") {
        if (endsWith($_POST["q2_4"], ".jpg") || endsWith($_POST["q2_4"], ".png")) {
            $query = "UPDATE bustrips SET urlimage = '" . $_POST["q2_4"] . "' WHERE tripid = $idEdit";
            $result = mysqli_query($connection, $query);
        }
    }
}

// Close database connection
$connection->close();
// Return back to main page
header("Location:index2.php");
