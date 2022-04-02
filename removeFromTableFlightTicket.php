<html><head><title>Add To Table Screen</title></head><body>
  <h1 style="text-align:center">Remove Flight Ticket</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Flight Ticket ID: </td>
        <td><input type="text" name="ticketId"/></td>
      </tr>
    </table>
    <br/>
    <div align="center">
      <input type="submit" name="remove" value="Remove"/>
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
  $ticketId = filter_input(INPUT_POST, 'ticketId');

  if (isset($_POST['remove'])) {
    $sql = "DELETE FROM $table WHERE ticketId = \"$ticketId\"";
    if (mysqli_query($con, $sql)) {
      if (mysqli_affected_rows($con) > 0) {
        echo "<p align=\"center\">Successfully removed flight ticket with ID: $ticketId from FlightTicket.</p>";
      } else {
        echo "<p align=\"center\">No Flight Ticket to remove with that ID.</p>";
      }
    } else {
      echo "<p align=\"center\">Unable to remove from table: " . mysqli_error($con) . "</p>";
    }
  }

  mysqli_close($con);
?>
