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
      <h1 class="col-sm-8">NBA Coaches</h1>
      <nav class="col-sm-4">
      	<p><a href="index.html">Home</a></p>
        <p><a href="teams.php">Teams</a></p>
		    <p><a href="players.php">Players</a></p>
		    <p><a href="scores_schedules.php">Scores&Schedules</a></p>
        <p><a href="standings.php">Standings</a></p>
		    <p><a href="honors.php">Honors</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
  	<div class="searchbox">
  		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  			<label for="coachname">Enter Coach Name:</label>
  			<input type="text" id="coachname" name="coachname" />
  			<input type="submit" value="Search" name="submit"/>
      </form>
  	</div> 
	
    <table class="col-sm-8">
	  
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (isset($_POST['submit'])) {
			      echo "<caption>Coaches Search Results</caption>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>BirthDate</th>";
			      echo "<th>Team</th>";
            echo "</tr>";
			
            $coachname = $_POST['coachname'];
            $query="SELECT * FROM coach where first='$coachname' 
                                         or last='$coachname' 
                                         or concat(first , ' ' , last)='$coachname'
										 or concat(first,last)='$coachname'";
            $result=mysqli_query($dbc, $query);
            
            while ($row = mysqli_fetch_array($result)) {
              $first=$row['first'];
              $last=$row['last'];
              $dob=$row['dob'];
			        $teamId=$row['teamId'];

              $query_team="SELECT * FROM team where id = '$teamId'";
              $result_team=mysqli_query($dbc, $query_team);
              if ($row_team = mysqli_fetch_array($result_team)) {
                  $teamname=$row_team['teamName'];
              }
              else $teamname='free';
              
              echo "<tr>";
              echo "<td>".$first." ".$last."</td>";
              echo "<td>".$dob."</td>";
              echo "<td><a href='team_stat.php?name=$teamname'>".$teamname."</a></td>";
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