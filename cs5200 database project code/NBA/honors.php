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
      <h1 class="col-sm-8">NBA Honors</h1>
      <nav class="col-sm-4">
      	<p><a href="index.html">Home</a></p>
        <p><a href="teams.php">Teams</a></p>
        <p><a href="players.php">Players</a></p>
		    <p><a href="coaches.php">Coaches</a></p>
		    <p><a href="scores_schedules.php">Scores&Schedules</a></p>
		    <p><a href="standings.php">Standings</a></p>
		
      </nav>
    </div>
  </header>

  <section class="container">
    <table class="col-sm-9">
	  <caption> 2015-16 SEASON</caption>
      <tr>
        <th>MVP</th>
		    <th>ROY</th>
		    <th>DPOY</th>
		    <th>SMOY</th>
		    <th>MIP</th>
      </tr>
	    <tr>
        <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $query1="SELECT * FROM honor where id='1'";
        $result1=mysqli_query($dbc, $query1);
        $row1 = mysqli_fetch_array($result1);

        $mvp=$row1['MVP'];
        $roy=$row1['ROY'];
        $dpoy=$row1['DPOY'];
        $smoy=$row1['SMOY'];
        $mip=$row1['MIP'];

        echo "<td><a href='team_stat.php?name=$mvp'>".$mvp."</a></td>";
        echo "<td><a href='team_stat.php?name=$roy'>".$roy."</a></td>";
        echo "<td><a href='team_stat.php?name=$dpoy'>".$dpoy."</a></td>";
        echo "<td><a href='team_stat.php?name=$smoy'>".$smoy."</a></td>";
        echo "<td><a href='team_stat.php?name=$mip'>".$mip."</a></td>";
        mysqli_close($dbc);
        ?>
      </tr>

	</table>
  </section>
	  
  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>