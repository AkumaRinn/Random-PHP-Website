<?php
session_start();
include("connect.php");
include("functions.php");
$user_data = check_user($con);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Almost The Beatles-Repertoriu</title>

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
  //read the members from the db and echo them to the Team page
  $query = "select * from repertoriu";
  $result = mysqli_query($con,$query);

  $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }
  

echo "<h2>Team Repertory</h2>";
echo "<ul>";
foreach ($rows as $row) {
    
    echo "<li>" . "<h3>" . $row['denumire'] ."</h3>" . "</li>";
    echo "<br>". "<br>";
       
}
echo "</ul>";

?>
<?php
  if($user_data['user_name']==="admin")
{
  ?>
    <div style = "background-color: gray">
      <p>Insert in repertory</p>
      <form method="post" action="insertRepertoriu.php">
      <label for = "denumire">Denumire:</label>
      <input type="text" name = "denumire" id="denumire" required><br><br>

      <input type="submit" value="Submit">
      </form>
    </div>
    <br><br>
    <div>
      <p>Delete from repertory</p>
      <form method="post" action="deleteRepertoriu.php">
      <label for = "denumireDel">Denumire:</label>
      <input type="text" name = "denumireDel" id="denumireDel" required><br><br>

      <input type="submit" value="Submit">
      </form>
    </div>
    <br><br>
    <div>
      <p>Update repertory</p>
      <form method="post" action="updateRepertoriu.php">
      <label for = "denumire">Denumire:</label>
      <input type="text" name = "denumire" id="denumire" required><br><br>

      <label for = "new_denumire">Denumire noua:</label>
      <input type="text" name = "new_denumire" id="new_denumire" required><br><br>

      <input type="submit" value="Submit">
      </form>
    </div>
    <?php
    }
    ?>

</body>
</html>