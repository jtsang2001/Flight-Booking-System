<html><head><title>Search Passengers</title></head><body>
  <h1 style="text-align:center">Search Passengers</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Flight ID: </td>
        <td>
          <input type="text" name="flightId"/>
        </td>
      </tr>
      <tr>
        <td align="right">Enter the Date of Departure: </td>
        <td>
          <input type="text" name="date"/>
        </td>
      </tr>
      <tr>
        <td/>
        <td align="center">
          <input type="submit" name="search" value="Search"/>
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
  $date = filter_input(INPUT_POST, 'date');

  if (isset($_POST['search'])) {
    $sql = "SELECT Passengers.passportNumber, Passengers.firstName, Passengers.lastName
            FROM Flight
            INNER JOIN FlightTicket ON Flight.flightId = FlightTicket.ticketId
            INNER JOIN Passengers Passengers ON FlightTicket.passportNumber = Passengers.passportNumber
            WHERE Flight.flightId LIKE \"$flightId\" AND Flight.dateOfFlight LIKE \"$date\"";

    $result = mysqli_query($con, $sql);

    if ($result) {
      //Start printing the table
      $fields_num = mysqli_field_count($con);

      if ($row = mysqli_fetch_row($result)) {
        echo "<table align=\"center\" border='1'><tr>";
        //Print table headers
        for ($i = 0; $i < $fields_num; $i++) {
          $field = mysqli_fetch_field($result);
          echo "<td><b>{$field->name}</br></td>";
        }
        echo "</tr>\n";

        do {
          echo "<tr>";
          foreach($row as $cell)
          echo"<td>$cell</td>";
          echo "</tr>\n";
        } while ($row = mysqli_fetch_row($result));
      }
      else {
        echo "<p align=\"center\">No results found.</p>";
      }

    }
    else {
      echo "<p align=\"center\">Unable to search: " . mysqli_error($con) . "</p>";
    }
    mysqli_free_result($result);
  }


  mysqli_close($con);
?>
