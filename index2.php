<!--Programmer Name: 53 -->

<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <title>RJ Asn3</title>
     <link rel="stylesheet" href="styles.css">
</head>

<body>
     <?php
     include 'connectdb.php';
     ?>
     <h1>Welcome to CS3319 Assignment 3</h1>

     <!-- Query 1 -->
     <h2>Query 1: Bus Trip</h2>
     <div></div>
     <form method="post">
          <p>Please select how you would like to order the data:</p>
          <div>
               <input type="radio" value="tripname" name="q1_1" required />
               <label for="q1_1">Trip Name</label>
               <input type="radio" value="country" name="q1_1" />
               <label for="q1_1">Country</label>
          </div>
          <p>Please select how you would like to order the data:</p>
          <div>
               <input type="radio" value="ASC" name="q1_2" required />
               <label for="q1_1">Ascending</label>
               <input type="radio" value="DESC" name="q1_2" />
               <label for="q1_1">Descending</label>
          </div>
          <br />
          <div>
               <input type="submit" value="submit" />
          </div>
     </form>

     <?php
     if (isset($_POST['q1_1']) && isset($_POST['q1_2'])) {
          $query1_1 = $_POST['q1_1'];
          $query1_2 = $_POST['q1_2'];
          echo '<h4>Viewing the Bus Trips sorted by ' . $query1_1 . ' and ' . $query1_2 . '</h4><p></p>';
          $query = "SELECT * FROM bustrips ORDER BY $query1_1 $query1_2";
     } else {
          echo '<h4>Viewing the Bus Trips with default sorting</h4><p></p>';
          $query = "SELECT * FROM bustrips";
     }
     $result = mysqli_query($connection, $query);
     if (!$result) {
          die("databases query failed.");
     }
     echo '
     <table>
     <tr>
     <th>
          Trip ID
     </th>
     <th>
          Trip Name
     </th>
     <th>
          Country
     </th>
     <th>
          Start Date
     </th>
     <th>
          End Date
     </th>
     <th>
          License Plate Number
     </th>
     <th style ="width: 250px">
          Image
     </th>
     </tr>
     ';
     while ($row = mysqli_fetch_assoc($result)) {
          echo '
          <tr>
               <td>' . $row['tripid'] . '</td>
               <td>' . $row['tripname'] . '</td>
               <td>' . $row['country'] . '</td>
               <td>' . $row['startdate'] . '</td>
               <td>' . $row['enddate'] . '</td>
               <td>' . $row['licenseplatenum'] . '</td>
               <td><img src="' . $row['urlimage'] . '" style="width:250px"></td>
          </tr>
          ';
     }
     echo '</table>';
     mysqli_free_result($result);
     ?>
     </div>

     <!-- Query 2 -->
     <h2>Query 2: Editing a Bus Trip</h2>
     <form method="post">
          <p>Please select the Bus Trip you would like to Edit:</p>
          <div>
               <select name="editTrips" id="editTrips" required>
                    <?php
                    $query = "SELECT * FROM bustrips";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['tripid'] . '">' . $row['tripid'] . '</option>   ';
                    }
                    ?>
               </select>
          </div>
          <br />
          <div>
               <input type="submit" value="submit" />
          </div>

     </form>

     <?php
     if (isset($_POST['editTrips'])) {
          echo '
          <p>Editing Bus Trip with ID ' . $_POST['editTrips'] . ':</p>
          <form action = "query2.php" method="post">
               <label for="q2_1">Trip Name</label>     
               <input type="text" placeholder="Trip Name" name="q2_1" />
               <br />
               <label for="q2_2">Start Date</label>
               <input type="date" name="q2_2" />
               <br />
               <label for="q2_3">End Date</label>
               <input type="date" name="q2_3" />
               <br />
               <label for="q2_4">Image URL</label>
               <input type="text" placeholder="Image URL" name="q2_4" />
               <br />
               <br />
               <div>
                    <input type="submit" name="' . $_POST['editTrips'] . '" value="submit" />
               </div>

          </form>
               ';
     }
     ?>

     <!-- Query 3 -->
     <h2>Query 3: Deleting a Bus Trip</h2>
     <form method="post">
          <p>Please select the Bus Trip you would like to Delete:</p>
          <div>
               <select name="deleteTrip" id="deleteTrip" required>
                    <?php
                    $query = "SELECT * FROM bustrips";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['tripid'] . '">' . $row['tripid'] . ' </option>   ';
                    }
                    ?>
               </select>
          </div>
          <br />
          <div>
               <input type="submit" value="submit" />
          </div>
     </form>

     <?php
     if (isset($_POST['deleteTrip'])) {
          echo '
          <form action = "query3.php" method="post">
               <p>Please confirm if you would like to delete the Trip with ID ' . $_POST['deleteTrip'] . ':</p>
               <h4>This action is permanent</h4>
               <div>
                    <input type="radio" value="yes" name="q3" />
                    <label for="q3">Yes</label>
                    <input type="radio" value="no" name="q3" />
                    <label for="q3">No</label>
               </div>

               <div>
                    <input type="submit" name="' . $_POST['deleteTrip'] . '" value="submit" />
               </div>

          </form>
               ';
     }
     echo '<p align=left>' . $_GET['error3'] . '</p>';
     ?>

     <!-- Query 4 -->
     <h2>Query 4: Creating a Bus Trip</h2>
     <div>
          <form action="query4.php" method="post">
               <p>Please enter the details for the Bus Trip you would like to create:</p>
               <label for="q4_1">Trip ID</label>
               <input type="number" value="tripid" name="q4_1" required />
               <br />
               <label for="q4_2">Trip Name</label>
               <input type="text" placeholder="Trip Name" name="q4_2" required />
               <br />
               <label for="q4_3">Start Date</label>
               <input type="date" value="startdate" name="q4_3" required />
               <br />
               <label for="q4_4">End Date</label>
               <input type="date" value="enddate" name="q4_4" required />
               <br />
               <label for="q4_5">Country</label>
               <input type="text" placeholder="Country" name="q4_5" required />
               <br />
               <label for="q4_6">License Plate Number</label>
               <select name="q4_6" id="q4_6" required>
                    <?php
                    $query = "SELECT * FROM buses";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['licenseplatenum'] . '">' . $row['licenseplatenum'] . ' </option>   ';
                    }
                    ?>
               </select>
               <br />
               <label for="q4_7">Image URL</label>
               <input type="text" placeholder="Image URL" name="q4_7" />
               <br />
               <br />
               <div>
                    <input type="submit" value="submit" />
               </div>
          </form>
          <?php
          echo '<p align=left>' . $_GET['error4'] . '</p>';
          ?>
     </div>

     <!-- Query 5 -->
     <h2>Query 5: View Bus Trips by Country</h2>
     <div>
          <form method="post">
               <p>Please select the country for the bus trips:</p>
               <label for="q5">Country</label>
               <select name="q5" id="q5" required>
                    <?php
                    $query = "SELECT DISTINCT country FROM bustrips";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['country'] . '">' . $row['country'] . ' </option>   ';
                    }
                    ?>
               </select>
               <br />
               <br />
               <div>
                    <input type="submit" value="submit" />
               </div>
          </form>

          <?php
          if (isset($_POST['q5'])) {
               echo '<br />View trips for country ' . $_POST["q5"] . '';
               $query = "SELECT * FROM bustrips WHERE country = '" . $_POST["q5"] . "'";
               $result = mysqli_query($connection, $query);
               if (!$result) {
                    die("databases query failed.");
               }
               echo '
               <table>
               <tr>
               <th>
                    Trip ID
               </th>
               <th>
                    Trip Name
               </th>
               <th>
                    Start Date
               </th>
               <th>
                    End Date
               </th>
               <th>
                    Country
               </th>
               <th>
                    License Plate Number
               </th>
               </tr>
               ';
               while ($row = mysqli_fetch_assoc($result)) {
                    echo '
               <tr>
                    <td>' . $row['tripid'] . '</td>
                    <td>' . $row['tripname'] . '</td>
                    <td>' . $row['startdate'] . '</td>
                    <td>' . $row['enddate'] . '</td>
                    <td>' . $row['country'] . '</td>
                    <td>' . $row['licenseplatenum'] . '</td>
               </tr>
               ';
               }
          }
          echo '</table>';
          mysqli_free_result($result);
          ?>
     </div>

     <!-- Query 6 -->
     <h2>Query 6: Create a Trip Booking</h2>
     <div>
          <form action="query6.php" method="post">
               <p>Please select Passenger and Trip, then enter the price:</p>
               <label for="q6_1">Passenger</label>
               <select name="q6_1" id="q6_1" required>
                    <?php
                    $query = "SELECT * FROM passengers";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['passengerid'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>   ';
                    }
                    ?>
               </select>
               <br />
               <label for="q6_3">Trip</label>
               <select name="q6_2" id="q6_2" required>
                    <?php
                    $query = "SELECT * FROM bustrips";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['tripid'] . '">' . $row['tripname'] . '</option>   ';
                    }
                    ?>
               </select>
               <br />
               <label for="q6_3">Trip Price</label>
               <input type="number" placeholder="Dollar Amount" name="q6_3" required />
               <br />
               <br />
               <div>
                    <input type="submit" value="submit" />
               </div>

          </form>
     </div>

     <!-- Query 7 -->
     <h2>Query 7: Passenger and Passport Details (sorted by last name)</h2>
     <div>
          <?php
          $query = "SELECT passengers.passengerid, firstname, lastname, passportnumber, countryofcitizenship, expirydate, birthdate FROM passengers JOIN passports ON passengers.passengerid = passports.passengerid ORDER BY lastname";
          $result = mysqli_query($connection, $query);
          if (!$result) {
               die("databases query failed.");
          }
          echo '
          <table>
          <tr>
          <th>
               Passenger ID
          </th>
          <th>
               Firstname
          </th>
          <th>
               Lastname
          </th>
          <th>
               Passport Number
          </th>
          <th>
               Country of Citizenship
          </th>
          <th>
               Expiry Date
          </th>
          <th>
               Birth Date
          </th>
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result)) {
               echo '
               <tr>
                    <td>' . $row['passengerid'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['passportnumber'] . '</td>
                    <td>' . $row['countryofcitizenship'] . '</td>
                    <td>' . $row['expirydate'] . '</td>
                    <td>' . $row['birthdate'] . '</td>
               </tr>
               ';
          }
          echo '</table>';
          mysqli_free_result($result);
          ?>
     </div>

     <!-- Query 8 -->
     <h2>Query 8: View Passenger Bookings</h2>
     <div>
          <form method="post">
               <p>Please select Passenger and Trip, then enter the price:</p>
               <div>
                    <label for="q8">Passenger</label>
                    <select name="q8" id="q8" required>
                         <?php
                         $query = "SELECT * FROM passengers";
                         $result = mysqli_query($connection, $query);
                         echo '<option value =""> -- Select -- </option>   ';
                         while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value ="' . $row['passengerid'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>   ';
                         }
                         ?>
               </div>
               <div>
                    <p></p>
                    <input type="submit" value="submit" />
               </div>
          </form>

          <?php
          if (isset($_POST['q8'])) {
               echo '<br />View bookings for passenger with ID ' . $_POST["q8"] . '<p></p>';
               $query = "SELECT * FROM bookings WHERE passengerid = '" . $_POST["q8"] . "'";
               $result = mysqli_query($connection, $query);
               if (!$result) {
                    die("databases query failed.");
               }
               echo '
               <table>
               <tr>
               <th>
                    Trip ID
               </th>
               <th>
                    Trip Price
               </th>
               <th>
                    Passenger ID
               </th>
               </tr>
               ';
               while ($row = mysqli_fetch_assoc($result)) {
                    echo '
               <tr>
                    <td>' . $row['tripid'] . '</td>
                    <td>' . $row['tripprice'] . '</td>
                    <td>' . $row['passengerid'] . '</td>
               </tr>
               ';
               }
          }
          echo '</table>';
          mysqli_free_result($result);
          ?>
     </div>

     <!-- Query 9 -->
     <h2>Query 9: Deleting a Booking</h2>
     <form method="post">
          <p>Please select the Booking you would like to Delete:</p>
          <div>
               <label for="selectPassenger">Select Passenger</label>
               <select name="selectPassenger" id="selectPassenger" required>
                    <?php
                    $query = "SELECT * FROM passengers";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['passengerid'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>   ';
                    }
                    ?>
               </select>
               <label for="selectTrip">Select Trip</label>
               <select name="selectTrip" id="selectTrip" required>
                    <?php
                    $query = "SELECT DISTINCT tripid FROM bookings";
                    $result = mysqli_query($connection, $query);
                    echo '<option value =""> -- Select -- </option>   ';
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value ="' . $row['tripid'] . '">' . $row['tripid'] . '</option>   ';
                    }
                    ?>
               </select>
          </div>
          <br />
          <div>
               <input type="submit" value="submit" />
          </div>

     </form>

     <?php
     if (isset($_POST['selectPassenger']) && isset($_POST['selectTrip'])) {
          // Deletes the booking
          $query = "DELETE FROM bookings WHERE tripid = '".$_POST['selectTrip']."' AND passengerid = '".$_POST['selectPassenger']."'";
          $result = mysqli_query($connection, $query);
          if (!$result) {
               echo "Failed to delete trip. Error: " . mysqli_error($connection);
          }
     }
     ?>

     <!-- Query 10 -->
     <h2>Query 10: Bus trips that don't have bookings</h2>
     <div>
          <?php
          $query = "SELECT tripid, tripname, country, startdate, enddate, licenseplatenum, urlimage FROM bustrips WHERE tripid NOT IN (SELECT tripid FROM bookings)";
          $result = mysqli_query($connection, $query);
          if (!$result) {
               die("databases query failed.");
          }
          echo '
          <table>
          <tr>
          <th>
               Trip ID
          </th>
          <th>
               Trip Name
          </th>
          <th>
               Country
          </th>
          <th>
               Start Date
          </th>
          <th>
               End Date
          </th>
          <th>
               License Plate Number
          </th>
          <th style ="width: 250px">
               Image
          </th>
          </tr>
          ';
          while ($row = mysqli_fetch_assoc($result)) {
               echo '
               <tr>
                    <td>' . $row['tripid'] . '</td>
                    <td>' . $row['tripname'] . '</td>
                    <td>' . $row['country'] . '</td>
                    <td>' . $row['startdate'] . '</td>
                    <td>' . $row['enddate'] . '</td>
                    <td>' . $row['licenseplatenum'] . '</td>
                    <td><img src="' . $row['urlimage'] . '" style="width:250px"></td>
               </tr>
               ';
          }
          echo '</table>';
          mysqli_free_result($result);
          ?>
     </div>
</body>
</html>

<?php
// Close database connection
$connection->close();
?>