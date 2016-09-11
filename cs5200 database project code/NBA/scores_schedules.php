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
      <h1 class="col-sm-8">NBA Scores&Schedules </h1>
      <nav class="col-sm-4">
      	<p><a href="index.html">Home</a></p>
        <p><a href="teams.php">Teams</a></p>
        <p><a href="players.php">Players</a></p>
		    <p><a href="coaches.php">Coaches</a></p>
        <p><a href="standings.php">Standings</a></p>
		    <p><a href="honors.php">Honors</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
    <table class="col-sm-6">
      <caption>2015-16 SEASON</caption>
      <tr>
        <th>Date</th>
        <th>Type</th>
        <th>Home Team</th>
        <th>Scores</th>
        <th>Guest Team</th>
      </tr>
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $query="SELECT * FROM score ORDER BY gamedate";
        $result=mysqli_query($dbc, $query);

        while ($row = mysqli_fetch_array($result)) {
          $gamedate = $row['gameDate'];
          $type= $row['type'];
          $guest = $row['guest'];
          $score = $row['score'];
          $home = $row['home'];

          echo "<tr>";
          echo "<td>".$gamedate."</td>";
          echo "<td>".$type."</td>";
          echo "<td>".$home."</td>";
          echo "<td>".$score."</td>";
          echo "<td>".$guest."</td>";
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