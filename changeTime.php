<html><head><title>Update Time</title></head><body>
  <h1 style="text-align:center">Update Time of a Flight</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Flight ID of the flight you want to change: </td>
        <td>
          <input type="text" name="flightId"/>
        </td>
      </tr>
      <tr>
        <td align="right">Enter the new Departure Time:</td>
        <td>
          <input type="text" name="depTime"/>
        </td>
      </tr>
	  <tr>
        <td align="right">Enter the new Arrival Time:</td>
        <td>
          <input type="text" name="arrTime"/>
        </td>
      </tr>
      <tr>
        <td/>
        <td align="center">
          <input type="submit" name="update" value="Update"/>
        </td>
      </tr>
    </table>
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

  $flightId = filter_input(INPUT_POST, 'flightId');
  $depTime = filter_input(INPUT_POST, 'depTime');
  $arrTime = filter_input(INPUT_POST, 'arrTime');

  if (isset($_POST['update'])) {
	$sql = "UPDATE Flight
			SET departureTime = \"$depTime\", arrivalTime = \"$arrTime\"
			WHERE flightId = \"$flightId\"";
			
    if (mysqli_query($con, $sql)) {
	  if (mysqli_affected_rows($con) > 0) {
        echo "<p align=\"center\">Flight successfully updated.</p>";
      } else {
        echo "<p align=\"center\">No flight to update.</p>";
      }
    }
    else {
      echo "<p align=\"center\">Unable to update: " . mysqli_error($con) . "</p>";
    }
  }


  mysqli_close($con);
?>
