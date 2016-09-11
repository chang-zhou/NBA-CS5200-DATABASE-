<!DOCTYPE html>
<html>
<head>
  <title>NBA</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
  <header class="container">
    <div class="row">
      <h1 class="col-sm-8">NBA Standings</h1>
      <nav class="col-sm-4">
      	<p><a href="index.html">Home</a></p>
        <p><a href="teams.php">Teams</a></p>
        <p><a href="players.php">Players</a></p>
		    <p><a href="coaches.php">Coaches</a></p>
        <p><a href="scores_schedules.php">Scores&Schedules </a></p>
		    <p><a href="honors.php">Honors</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
    <table class="col-sm-6">
      <caption>2015-16 East Conference</caption>
      <tr>
	    <th>Rank</th>
        <th>Team</th>
        <th>W</th>
        <th>L</th>
        <th>Percentage</th>
        <th>Game Behind</th>
      </tr>
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $query1="SELECT * FROM standing where conference='e' ORDER BY rank";
        $result1=mysqli_query($dbc, $query1);

        while ($row1 = mysqli_fetch_array($result1)) {
		      $rank = $row1['rank'];
          $teamname = $row1['team'];
          $win = $row1['win'];
          $lose = $row1['lose'];
          $gamebehind = $row1['gameBehind'];
          $percentage = round(($win / ($win + $lose) * 100), 1).'%';

          echo "<tr>";
		      echo "<td>".$rank."</td>";
          echo "<td>".$teamname."</td>";
          echo "<td>".$win."</td>";
          echo "<td>".$lose."</td>";
          echo "<td>".$percentage."</td>";
          echo "<td>".$gamebehind."</td>";
          echo "</tr>";

        }
      ?>
    </table>

    <table class="col-sm-6">
      <caption>2015-16 West Conference</caption>
      <tr>
	    <th>Rank</th>
        <th>Team</th>
        <th>W</th>
        <th>L</th>
        <th>Percentage</th>
        <th>Game Behind</th>
      </tr>
      <?php

        $query2="SELECT * FROM standing where conference='w' ORDER BY rank";
        $result2=mysqli_query($dbc, $query2);

        while ($row2 = mysqli_fetch_array($result2)) {
		      $rank2 = $row2['rank'];
          $teamname2 = $row2['team'];
          $win2 = $row2['win'];
          $lose2 = $row2['lose'];
          $gamebehind2 = $row2['gameBehind'];
          $percentage2 = round(($win2 / ($win2 + $lose2) * 100), 1).'%';

          echo "<tr>";
		      echo "<td>".$rank2."</td>";
          echo "<td>".$teamname2."</td>";
          echo "<td>".$win2."</td>";
          echo "<td>".$lose2."</td>";
          echo "<td>".$percentage2."</td>";
          echo "<td>".$gamebehind2."</td>";
          echo "</tr>";

        }
        mysqli_close($dbc);
      ?>
    </table>
  </section>

  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>