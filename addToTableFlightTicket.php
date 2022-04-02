<html><head><title>Add To Table Screen</title></head><body>
  <h1 style="text-align:center">Create Flight Ticket</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Passport Number: </td>
        <td><input type="text" name="passportNumber"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Ticket ID: </td>
        <td><input type="text" name="ticketId"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Seat Type: </td>
        <td><input type="text" name="seatType"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Seat Number: </td>
        <td><input type="text" name="seatNumber"/></td>
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

  $table = 'FlightTicket';
  $passportNumber = filter_input(INPUT_POST, 'passportNumber');
  $ticketId = filter_input(INPUT_POST, 'ticketId');
  $seatType = filter_input(INPUT_POST, 'seatType');
  $seatNumber = filter_input(INPUT_POST, 'seatNumber');

  if (isset($_POST['add'])) {
    $sql = "INSERT INTO $table VALUES (\"$passportNumber\", \"$ticketId\", \"$seatType\", \"$seatNumber\")";
    if (mysqli_query($con, $sql)) {
      echo "<p align=\"center\">Successfully added the flight ticket with ID: $ticketId.</p>";
    } else {
      echo "<p align=\"center\">Unable to add to table: " . mysqli_error($con) . "</p>";
    }
  }

  mysqli_close($con);
?>
