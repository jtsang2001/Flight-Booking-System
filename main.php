<html><head><title>Flight Booking System</title></head><body>
  <h1 align="center">Flight Booking System<h1>
  <form  action="viewTable.php" method="POST">
    <table align="center">
      <tr>
        <td align="right">Choose a table to view: </td>
        <td>
          <select name="table" size="1" Font size="+2">
            <option hidden disabled selected value></option>
            <option value="Airline" >Airline</option>
            <option value="Airplane" >Airplane</option>
            <option value="Passengers" >Passengers</option>
            <option value="Flight" >Flight</option>
            <option value="FlightTicket" >FlightTicket</option>
            <option value="FlightCrew" >FlightCrew</option>
          </select>
        </td>
        <td>
          <div>
            <input type="submit" value="VIEW">
          </div>
        </td>
      </tr>
  </form>
  <form  action="redirectAdd.php" method="POST">
      <tr>
        <td align="right">Choose a table to add to: </td>
        <td>
          <select name="table" size="1" Font size="+2">
            <option hidden disabled selected value></option>
            <option value="Airline" >Airline</option>
            <option value="Passengers" >Passengers</option>
            <option value="Flight" >Flight</option>
            <option value="FlightTicket" >FlightTicket</option>
          </select>
        </td>
        <td>
          <div>
            <input type="submit" value="ADD">
          </div>
        </td>
      </tr>
  </form>
  <form  action="redirectRemove.php" method="POST">
      <tr>
        <td align="right">Choose a table to remove from: </td>
        <td>
          <select name="table" size="1" Font size="+2">
            <option hidden disabled selected value></option>
            <option value="Airline" >Airline</option>
            <option value="Passengers" >Passengers</option>
            <option value="Flight" >Flight</option>
            <option value="FlightTicket" >FlightTicket</option>
          </select>
        </td>
        <td>
          <div>
            <input type="submit" value="REMOVE">
          </div>
        </td>
      </tr>
    </table>
  </form>
  <br/>
  <form  action="changeTime.php" method="POST">
    <table align="center">
      <tr>
        <td align="right">Update time of a flight</td>
        <td>
          <div>
            <input type="submit" value="UPDATE">
          </div>
        </td>
      </tr>
  </form>
  <form  action="changeSeat.php" method="POST">
      <tr>
        <td align="right">Update seat of a passenger</td>
        <td>
          <div>
            <input type="submit" value="UPDATE">
          </div>
        </td>
      </tr>
    </table>
  </form>
  <br/>
  <form  action="searchPassengers.php" method="POST">
    <table align="center">
      <tr>
        <td align="right">Search passengers</td>
        <td>
          <div>
            <input type="submit" value="SEARCH">
          </div>
        </td>
      </tr>
  </form>
  <form  action="searchFlights.php" method="POST">
      <tr>
        <td align="right">Search flights</td>
        <td>
          <div>
            <input type="submit" value="SEARCH">
          </div>
        </td>
      </tr>
    </table>
  </form>
</body></html>
