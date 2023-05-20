<?php
session_start();
include("connect.php");
include("functions.php");
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Almost The Beatles-Home</title>

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
    <div>
        Welcome to The Gotham Band, <?php echo $user_data['user_name'] ?>
    </div>
    <br>
    <div id="menu" style = "background-color: gray">
    <!-- Navigation Menu -->
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="team.php">Team</a></li>
        <li><a href="repertoriu.php">Repertory</a></li>
        <li><a href="program.php">Program</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
    </div>
    <div>
        <p>This is what you should actually know.</p>
    </div>
    <div id="descriere">
        <p>The Beatles were an English rock band, formed in Liverpool in 1960, that comprised John Lennon, Paul McCartney, George Harrison and Ringo Starr. They are regarded as the most influential band of all time[1] and were integral to the development of 1960s counterculture and popular music's recognition as an art form.[2] Rooted in skiffle, beat and 1950s rock 'n' roll, their sound incorporated elements of classical music and traditional pop in innovative ways; the band also explored music styles ranging from folk and Indian music to psychedelia and hard rock. As pioneers in recording, songwriting and artistic presentation, the Beatles revolutionised many aspects of the music industry and were often publicised as leaders of the era's youth and sociocultural movements</p>

    </div>     
    <div>
        <a href = "logout.php">Logout</a>
    </div>
</body>
</html>
