 <!DOCTYPE html>
<html>
<head>
  <title>NBA</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/players.css">
</head>

<body>
  <header class="container">
    <div class="row">
      <h1 class="col-sm-8">NBA Players</h1>
      <nav class="col-sm-4">
      	<p><a href="index.html">Home</a></p>
        <p><a href="teams.php">Teams</a></p>
        <p><a href="coaches.php">Coaches</a></p>
		    <p><a href="scores_schedules.php">Scores&Schedules</a></p>
        <p><a href="standings.php">Standings</a></p>
		    <p><a href="honors.php">Honors</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
  	<div class="searchbox">
  		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  			<label for="playername">Enter Player Name:</label>
  			<input type="text" id="playername" name="playername" />
  			<input type="submit" value="Search" name="submit"/>
      </form>
  	</div> 
	
    <table class="col-sm-10">
      
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (isset($_POST['submit'])) {
			      echo "<caption>Players Search Results</caption>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>BirthDate</th>";
            echo "<th>NBAYears</th>";
            echo "<th>Position</th>";
            echo "<th>Team</th>";
		        echo "<th>Uniform Number</th>";
            echo "</tr>";
			
            $playername = $_POST['playername'];
            $query="SELECT * FROM player where first='$playername' 
                                         or last='$playername' 
                                         or concat(first , ' ' , last)='$playername'
										 or concat(first,last)='$playername'";
            $result=mysqli_query($dbc, $query);
            
            while ($row = mysqli_fetch_array($result)) {
              $first=$row['first'];
              $last=$row['last'];
              $dob=$row['dob'];
              $nbayears=$row['exp'];
              $position=$row['position'];
              $worksIn=$row['worksIn'];
			        $no=$row['uniformNo'];


              $query_team="SELECT * FROM team where id = '$worksIn'";
              $result_team=mysqli_query($dbc, $query_team);
              if ($row_team = mysqli_fetch_array($result_team)) {
                  $teamname=$row_team['teamName'];
              }
              else $teamname='free';

              
              echo "<tr>";
              echo "<td><a href='player_stat.php?name=".$first." ".$last."'>".$first." ".$last."</a></td>";
              echo "<td>".$dob."</td>";
              echo "<td>".$nbayears."</td>";
              echo "<td>".$position."</td>";
              echo "<td><a href='team_stat.php?name=$teamname'>".$teamname."</a></td>";
			        echo "<td>".$no."</td>";
              echo "</tr>";
            }
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

