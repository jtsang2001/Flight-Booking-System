<?php

  $value = filter_input(INPUT_POST, 'table');

  if ($value == "Airline") {
    header("Location: removeFromTableAirline.php");
  }
  else if ($value == "Passengers") {
    header("Location: removeFromTablePassengers.php");
  }
  else if ($value == "Flight") {
    header("Location: removeFromTableFlight.php");
  }
  else if ($value == "FlightTicket") {
    header("Location: removeFromTableFlightTicket.php");
  }

?>
