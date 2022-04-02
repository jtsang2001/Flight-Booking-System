<?php

  $value = filter_input(INPUT_POST, 'table');
  
  if ($value == "Airline") {
    header("Location: addToTableAirline.php");
  }
  else if ($value == "Passengers") {
    header("Location: addToTablePassengers.php");
  }
  else if ($value == "Flight") {
    header("Location: addToTableFlight.php");
  }
  else if ($value == "FlightTicket") {
    header("Location: addToTableFlightTicket.php");
  }

?>
