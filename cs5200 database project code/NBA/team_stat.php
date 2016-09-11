<!DOCTYPE html>
<html>
<head>
  <title>NBA</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<?php
  $teamname= $_GET['name'];
?>

<body>
  <header class="container">
    <div class="row">
      <h1 class="col-sm-8"><?php echo $teamname ?></h1>
      <nav class="col-sm-4">
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
    <table class="col-sm-9" border="1">
      <caption><?php echo $teamname ?>  INFO 2015-16</caption>
      <tr>
        <th>Conference</th>
		    <th>Division</th>
		    <th>Arena</th>
		    <th>Location</th>
		    <th>Playoffs</th>
		    <th>Champions</th>
        <th>Head Coach</th>
      </tr>
	  
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $query1="SELECT * FROM team where teamName='$teamname'";
        $result1=mysqli_query($dbc, $query1);
        $row1 = mysqli_fetch_array($result1);

        $teamid=$row1['id'];
        $location=$row1['location'];
        $conference=$row1['conference'];
        $champions=$row1['championships'];
        $coachid=$row1['isCoachedBy'];
		    $division=$row1['division'];
		    $arena=$row1['arena'];
		    $playoff=$row1['playoffAppearances'];

        $query_coach="SELECT * FROM coach where id='$coachid'";
        $result_coach=mysqli_query($dbc, $query_coach);
        $row_coach=mysqli_fetch_array($result_coach);
        $coach_first_name=$row_coach['first'];
        $coach_last_name=$row_coach['last'];

        echo "<tr>";
        echo "<td>".$conference."</td>";
        echo "<td>".$division."</td>";
		    echo "<td>".$arena."</td>";
		    echo "<td>".$location."</td>";
		    echo "<td>".$playoff."</td>";
		    echo "<td>".$champions."</td>";
        echo "<td>".$coach_first_name." ".$coach_last_name."</td>";
        echo "</tr>";

      ?>
    </table>
  </section>

  <section class="container">
    <table class="col-sm-9" border="1">
      <caption><?php echo $teamname ?> STATS 2015-16 </caption>
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
        $query="SELECT * FROM teamstat where teamid='$teamid'";
        $result=mysqli_query($dbc, $query);
         
        while ($row = mysqli_fetch_array($result)) {
          $gametype=$row['gameType'];
          $fg=$row['FG'];
          $tp=$row['3P'];
          $ft=$row['FT'];
          $trb=$row['TRB'];
		      $orb=$row['ORB'];
		      $drb=$row['DRB'];
          $ast=$row['AST'];
          $stl=$row['STL'];
		      $blk=$row['BLK'];
          $tov=$row['TOV'];
          $pf=$row['PF'];
          $pts=$row['PTS'];
            
          echo "<tr>";
          echo "<td>".$gametype."</td>";
          echo "<td>".$fg."</td>";
          echo "<td>".$tp."</td>";
          echo "<td>".$ft."</td>";
          echo "<td>".$trb."</td>";
		      echo "<td>".$orb."</td>";
		      echo "<td>".$drb."</td>";
          echo "<td>".$ast."</td>";
          echo "<td>".$stl."</td>";
		      echo "<td>".$blk."</td>";
          echo "<td>".$tov."</td>";
		      echo "<td>".$pf."</td>";
		      echo "<td>".$pts."</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </section>

  <section class="container">
    <table class="col-sm-9" border="1">
      <caption><?php echo $teamname ?>  Players List 2015-16 </caption>
      <tr>
		    <th>Name</th>
        <th>BirthDate</th>
        <th>NBAYears</th>
        <th>Position</th>
		    <th>Uniform Number</th>
      </tr>
	  
     <?php     
        $query2="SELECT * FROM player where worksIn='$teamid'";
        $result2=mysqli_query($dbc, $query2);
    
        while ($row = mysqli_fetch_array($result2)) {
          $first=$row['first'];
          $last=$row['last'];
          $age=$row['dob'];
          $nbayears=$row['exp'];
          $position=$row['position'];
          $no=$row['uniformNo'];
  
          echo "<tr>";
          echo "<td><a href='player_stat.php?name=".$first." ".$last."'>".$first." ".$last."</a></td>";
          echo "<td>".$age."</td>";
          echo "<td>".$nbayears."</td>";
          echo "<td>".$position."</td>";
		      echo "<td>".$no."</td>";
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