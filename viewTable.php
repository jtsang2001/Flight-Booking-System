<html><head><title>Display Table Screen</title></head><body>
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

  //Get Query
  $table = $_POST["table"];
  $sql = "SELECT * FROM {$table}";
  $result = mysqli_query($con, $sql);

  //If Query fails
  if (!$result) {
    echo "Failed to show fields from query.";
    exit();
  }

  //Start printing the table
  $fields_num = mysqli_field_count($con);
  echo "<h1 align=\"center\">$table</h1>";
  echo "<table align=\"center\" border='1'><tr>";

  //Printing table headers
  for ($i = 0; $i < $fields_num; $i++) {
    $field = mysqli_fetch_field($result);
    echo "<td><b>{$field->name}</br></td>";
  }
  echo "</tr>\n";

  //Loop through every row. $row is an array and the foreach basically takes
  //each element and puts into $cell variable
  while ($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $cell)
    echo"<td>$cell</td>";
    echo "</tr>\n";
  }
  echo "</table>";

  //Back Button
  echo "<h2></h2>";
  echo "<form action=\"main.php\">";
  echo "<div align=\"center\"><input type=\"submit\" value=\"Back To Start\"></div>";
  echo "</form>";


  //Free Result and Close connection
  mysqli_free_result($result);
  mysqli_close($con);
?>
</body></html>
