<html><head><title>Update Seat</title></head><body>
  <h1 style="text-align:center">Update the Seat of a Passenger</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the passenger's Passport Number: </td>
        <td>
          <input type="text" name="passportNumber"/>
        </td>
      </tr>
	  <tr>
        <td align="right">Enter their ticket ID: </td>
        <td>
          <input type="text" name="ticketId"/>
        </td>
      </tr>
      <tr>
        <td align="right">Enter their new Seat Number:</td>
        <td>
          <input type="text" name="seatNum"/>
        </td>
      </tr>
	  <tr>
        <td align="right">Enter their new Seat Type:</td>
        <td>
          <input type="text" name="seatType"/>
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

  $passportNumber = filter_input(INPUT_POST, 'passportNumber');
  $ticketId = filter_input(INPUT_POST, 'ticketId');
  $seatNum = filter_input(INPUT_POST, 'seatNum');
  $seatType = filter_input(INPUT_POST, 'seatType');

  if (isset($_POST['update'])) {
	$sql = "UPDATE FlightTicket
			SET seatType = \"$seatType\", seatNumber = \"$seatNum\"
			WHERE ticketId = \"$ticketId\" AND passportNumber = \"$passportNumber\"";
			
    if (mysqli_query($con, $sql)) {
	  if (mysqli_affected_rows($con) > 0) {
        echo "<p align=\"center\">Flight Ticket successfully updated.</p>";
      } else {
        echo "<p align=\"center\">No flight ticket to update.</p>";
      }
    }
    else {
      echo "<p align=\"center\">Unable to update: " . mysqli_error($con) . "</p>";
    }
  }

  mysqli_close($con);
?>
