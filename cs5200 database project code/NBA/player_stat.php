<!DOCTYPE html>
<html>
<head>
  <title>NBA</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/players.css">
</head>

<?php
  $playername= $_GET['name'];
?>

<body>
  <header class="container">
    <div class="row">
      <h1 class="col-sm-6"> NBA PLAYER STATS</h1>
      <nav class="col-sm-6">
      	<p><a href="index.html">Home</a></p>
        <p><a href="teams.php">Teams</a></p>
        <p><a href="players.php">Players</a></p>
		    <p><a href="coaches.php">Coaches</a></p>
		    <p><a href="scores_schedules.php">Scores&Schedules</a></p>
        <p><a href="standings.php">Standings</a></p>
		    <p><a href="honors.php">Honors</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
    <table class="col-sm-10" border="1">
	  <caption><?php echo $playername ?>  2015-16 SEASON</caption>
      <caption>Per Game</caption>
      <tr>
        <th>Game Type</th>
		    <th>FG%</th>
        <th>3P%</th>
        <th>FT%</th>
        <th>TRB</th>
        <th>ORB</th>
        <th>DRB</th>
        <th>AST</th>
        <th>STL</th>
        <th>BLK</th>
        <th>TOV</th>
		    <th>PF</th>
        <th>PTS</th>
      </tr>
	  
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $query1="SELECT * FROM player where concat(first, ' ', last)='$playername'";
        $result1=mysqli_query($dbc, $query1);
        $row1 = mysqli_fetch_array($result1);
        $id=$row1['id'];

        $query="SELECT * FROM playerstat where playerId='$id'";
        $result=mysqli_query($dbc, $query);
            
        while ($row = mysqli_fetch_array($result)) {
          $gametype=$row['gameType'];
		      $FG=$row['FG'];
          $TP=$row['3P'];
		      $FT=$row['FT'];
          $TRB=$row['TRB'];
		      $ORB=$row['ORB'];
          $DRB=$row['DRB'];
		      $AST=$row['AST'];
          $STL=$row['STL'];
		      $BLK=$row['BLK'];
          $TOV=$row['TOV'];
		      $PF=$row['PF'];
          $PTS=$row['PTS'];
              
          echo "<tr>";
          echo "<td>".$gametype."</td>";
          echo "<td>".$FG."</td>";
          echo "<td>".$TP."</td>";
          echo "<td>".$FT."</td>";
          echo "<td>".$TRB."</td>";
          echo "<td>".$ORB."</td>";
		      echo "<td>".$DRB."</td>";
		      echo "<td>".$AST."</td>";
		      echo "<td>".$STL."</td>";
		      echo "<td>".$BLK."</td>";
		      echo "<td>".$TOV."</td>";
		      echo "<td>".$PF."</td>";
		      echo "<td>".$PTS."</td>";
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

