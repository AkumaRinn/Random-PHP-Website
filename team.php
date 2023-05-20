<?php
session_start();
include("connect.php");
include("functions.php");
?>
<html>
    <head>
        <title>Almost The Beatles-Team</title>

        <style>
    
        ul {
          list-style-type: none;
        }
        #menu li{
          display: inline;
          margin-right: 10px;
        }
  </style>
    </head>
<body>
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

<?php
  //read the members from the db and echo them to the Team page
  $query = "select * from membri";
  $result = mysqli_query($con,$query);
  $user_data = check_user($con);
  $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }
  

echo "<h2>Meet the Team</h2>";
echo "<ul>";
foreach ($rows as $row) {
    
    echo "<li>" . "<h3>" . $row['nume'] ." ". $row['prenume']."</h3>" . " " . $row['data_nastere'] . "</li>";
    echo "<p>" . $row['description'] . "</p>" . "<br>". "<br>";
       
}
echo "</ul>";

?>

<?php
  if($user_data['user_name']==="admin")
{
  ?>
  <div style = "background-color: gray">
      <p>Insert new member</p>
      <form method="post" action="insertMember.php">
        <label for = "nume">Nume:</label>
        <input type="text" name = "nume" id="nume" required><br><br>

        <label for = "prenume">Prenume:</label>
        <input type="text" name="prenume" id="prenume" required><br><br>

        <label for="data_nastere">Data nastere:</label>
        <input type="date" name="data_nastere" id="data_nastere" required><br><br>

        <label for="description">Descriere: </label>
        <input type="text" name="description" id="description" required><br><br>

        <input type="submit" value="Submit">
      </form>
  </div>
  <div>
    <p>Delete member</p>
    <form method="post" action="deleteMembru.php">
      <label for="numeDel">Nume: </label>
      <input type="text" name="numeDel" id="numeDel"><br><br>

      <input type="submit" value="Submit">
    </form>
  </div>
  <div style = "background-color: gray">
    <p>Update member</p>
    <form method="post" action="updateMembru.php" >
      <label for="nume_curent">Current name:</label>
      <input type="text" name="nume_curent" id="nume_curent" required><br><br>

      <label for="nume_nou">New name:</label>
      <input type="text" name="nume_nou" id="nume_nou"><br><br>

      <label for="prenume_nou">New surname:</label>
      <input type="text" name="prenume_nou" id="prenume_nou"><br><br>

      <label for="data_nastere_noua">New b-day:</label>
      <input type="date" name="data_nastere_noua" id="data_nastere_noua" ><br><br>

      <label for="descriere_noua">New description:</label>
      <input type="text" name="descriere_noua" id="descriere_noua" ><br><br>

      <input type="submit" value="Submit">

    </form>
  </div>
  <?php
  }
?>
<div>
    <a href = "logout.php">Logout</a>
</div>
        
</body>
</html>