<html><head><title>Add To Table Screen</title></head><body>
  <h1 style="text-align:center">Create Passenger</h1>
  <form action="" method="post">
    <table align="center">
      <tr>
        <td align="right">Enter the Passport Number: </td>
        <td><input type="text" name="passportNumber"/></td>
      </tr>
      <tr>
        <td align="right">Enter the First Name: </td>
        <td><input type="text" name="firstName"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Last Name: </td>
        <td><input type="text" name="lastName"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Email: </td>
        <td><input type="text" name="email"/></td>
      </tr>
      <tr>
        <td align="right">Enter the Age: </td>
        <td><input type="text" name="age"/></td>
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

  $table = 'Passengers';
  $passportNumber = filter_input(INPUT_POST, 'passportNumber');
  $firstName = filter_input(INPUT_POST, 'firstName');
  $lastName = filter_input(INPUT_POST, 'lastName');
  $email = filter_input(INPUT_POST, 'email');
  $age = filter_input(INPUT_POST, 'age');

  if (isset($_POST['add'])) {
    $sql = "INSERT INTO $table VALUES (\"$passportNumber\", \"$firstName\", \"$lastName\", \"$email\", \"$age\")";
    if (mysqli_query($con, $sql)) {
      echo "<p align=\"center\">Successfully added $firstName $lastName.</p>";
    } else {
      echo "<p align=\"center\">Unable to add to table: " . mysqli_error($con) . "</p>";
    }
  }

  mysqli_close($con);
?>
