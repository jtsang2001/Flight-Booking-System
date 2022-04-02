<html><head><title>Add To Table Screen</title></head><body>
  <h1 style="text-align:center">Create Flight</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Flight ID: </td>
        <td><input type="text" name="flightId"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Date of Departure: </td>
        <td><input type="text" name="dateOfFlight"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Origin: </td>
        <td><input type="text" name="origin"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Destination: </td>
        <td><input type="text" name="destination"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Departure Time: </td>
        <td><input type="text" name="departureTime"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Arrival Time: </td>
        <td><input type="text" name="arrivalTime"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Airplane ID: </td>
        <td><input type="text" name="airplaneId"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Crew ID: </td>
        <td><input type="text" name="crewId"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Airline Name: </td>
        <td><input type="text" name="airlineName"/></td>
      </tr>
    </table>
    <br/>
    <div align="center">
      <input type="submit" name="add" value="Add"/>
    </div>
  </form>
  <form action="main.php">
    <div align="center">
      <input type="submit" value="Back To Start"/>
    </div>
  </form>
</body></html>

<?php
  $host="localhost";
  $port=3306;
  $socket="";
  $user="root";
  $password="";
  $dbname="FlightBookingSystem";

  $con = mysqli_connect($host, $user, $password, $dbname, $port);

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  $table = 'Flight';
  $flightId = filter_input(INPUT_POST, 'flightId');
  $dateOfFlight = filter_input(INPUT_POST, 'dateOfFlight');
  $origin = filter_input(INPUT_POST, 'origin');
  $destination = filter_input(INPUT_POST, 'destination');
  $departureTime = filter_input(INPUT_POST, 'departureTime');
  $arrivalTime = filter_input(INPUT_POST, 'arrivalTime');
  $airplaneId = filter_input(INPUT_POST, 'airplaneId');
  $crewId = filter_input(INPUT_POST, 'crewId');
  $airlineName = filter_input(INPUT_POST, 'airlineName');

  if (isset($_POST['add'])) {
    $sql = "INSERT INTO $table VALUES (\"$flightId\", \"$dateOfFlight\", \"$origin\", \"$destination\", \"$departureTime\", \"$arrivalTime\", \"$airplaneId\", \"$crewId\", \"$airlineName\")";
    if (mysqli_query($con, $sql)) {
      echo "<p align=\"center\">Successfully added the flight with ID: $flightId.</p>";
    } else {
      echo "<p align=\"center\">Unable to add to table: " . mysqli_error($con) . "</p>";
    }
  }

  mysqli_close($con);
?>
