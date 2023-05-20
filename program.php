<?php
session_start();
include("connect.php");
include("functions.php");
$user_data = check_user($con);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Almost The Beatles - Program</title>

  <style>
    
    ul {
      list-style-type: none;
    }
    #menu li{
      display: inline;
      margin-right: 10px;
    }

  </style>
  <!-- Navigation Menu -->
  <div id="menu" style = "background-color: gray">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="team.php">Team</a></li>
      <li><a href="repertoriu.php">Repertory</a></li>
      <li><a href="program.php">Program</a></li>
      <li><a href="gallery.html">Gallery</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </div>
</head>
<body>

<?php
  include("connect.php");
  //read the program from the db and echo them to the program page
  $query = "select * from program";
  $result = mysqli_query($con,$query);

  $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }
  

echo "<h2>Shows Program</h2>";
echo "<ul>";
foreach ($rows as $row) {
    
    echo "<li>" . "<h3>" . $row['locatie'] ."</h3>" . "</li>";
    echo "<li>"."Data: " . $row['data_spectacol'] . "</li>";
    echo "<li>"."Ora: " . $row['ora_spectacol'] . "</li>";
    echo "<br>". "<br>";
       
}
echo "</ul>";

?>
<br><br>
<?php
  if($user_data['user_name']==="admin")
{
  ?>
  <div style = "background-color: gray">
      <p>Insert in Program</p>
      <form method="post" action="insertProgram.php">
      <label for = "locatie">Locatie:</label>
      <input type="text" name = "locatie" id="locatie" required><br><br>

      <label for = "data_spectacol">Data:</label>
      <input type="date" name = "data_spectacol" id="data_spectacol" required><br><br>

      <label for = "ora_spectacol">Ora:</label>
      <input type="text" name = "ora_spectacol" id="ora_spectacol" required><br><br>

      <input type="submit" value="Submit">
      </form>
    </div>
    <br><br>
    <div>
      <p>Delete from program</p>
      <form method="post" action="deleteProgram.php">
      <label for = "locatieDel">Locatie:</label>
      <input type="text" name = "locatieDel" id="locatieDel" required><br><br>

      <label for = "data_spectacolDel">Data:</label>
      <input type="date" name = "data_spectacolDel" id="data_spectacolDel" required><br><br>

      <label for = "ora_spectacolDel">Ora:</label>
      <input type="text" name = "ora_spectacolDel" id="ora_spectacolDel" required><br><br>

      <input type="submit" value="Submit">
      </form>
    </div>
    <br><br>
    <div style = "background-color: gray">
      <p>Update program</p>
      <form method="post" action="updateProgram.php">
      <label for = "locatie">Locatie:</label>
      <input type="text" name = "locatie" id="locatie" required><br><br>

      <label for = "data_spectacol">Data:</label>
      <input type="text" name = "data_spectacol" id="data_spectacol" required><br><br>

      <label for = "ora_spectacol">Ora:</label>
      <input type="text" name = "ora_spectacol" id="ora_spectacol" required><br><br>
      
      <label for = "locatie_noua">Locatie noua:</label>
      <input type="text" name = "locatie_noua" id="locatie_noua"><br><br>

      <label for = "data_spectacol_noua">Data noua:</label>
      <input type="date" name = "data_spectacol_noua" id="data_spectacol_noua" ><br><br>

      <label for = "ora_spectacol_noua">Ora noua:</label>
      <input type="text" name = "ora_spectacol_noua" id="ora_spectacol_noua"><br><br>

      <input type="submit" value="Submit">
      </form>
    </div>
    <?php
    }
    ?>






</body>
</html>