<html><head><title>Search Flights</title></head><body>
  <h1 style="text-align:center">Search a Flight</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Airline: </td>
        <td>
          <input type="text" name="airline"/>
        </td>
        <td/><td/><td/><td/>
        <td align="right">Enter the Origin: </td>
        <td>
          <input type="text" name="city"/>
        </td>
      </tr>
      <tr>
        <td align="right">Enter the Date of Departure: </td>
        <td>
          <input type="text" name="dateAirline"/>
        </td>
        <td/><td/><td/><td/>
        <td align="right">Enter the Date of Departure: </td>
        <td>
          <input type="text" name="dateCity"/>
        </td>
      </tr>
      <tr>
        <td/>
        <td align="center">
          <input type="submit" name="searchAirline" value="Search"/>
        </td>
        <td/><td/><td/><td/><td/>
        <td align="center">
          <input type="submit" name="searchCity" value="Search"/>
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

  $table = 'Flight';
  $airline = filter_input(INPUT_POST, 'airline');
  $city = filter_input(INPUT_POST, 'city');
  $dateAirline = filter_input(INPUT_POST, 'dateAirline');
  $dateCity = filter_input(INPUT_POST, 'dateCity');

  if (isset($_POST['searchAirline'])) {
    if($airline == 'AirlessCanada') { //NEED TO FIX THIS TO WORK WITH ADDED AIRLINES
      $flightPrefix = 'AC';
    } else if($airline == 'EastJet') {
      $flightPrefix = 'EJ';
    } else if($airline == 'Sigma Airlines') {
      $flightPrefix = 'SA';
    } else if($airline == 'Wolfskin Airlines') {
      $flightPrefix = 'WA';
    } else {
      $flightPrefix = '';
    }

    $sql = "SELECT * FROM $table WHERE flightId LIKE \"$flightPrefix%\" AND dateOfFlight = \"$dateAirline\"";
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
  else if (isset($_POST['searchCity'])) {
    $sql = "SELECT * FROM $table WHERE origin LIKE \"%$city%\" AND dateOfFlight = \"$dateCity\"";
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
  }

  mysqli_close($con);
?>
