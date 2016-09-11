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
      <h1 class="col-sm-4">NBA STATS Admin</h1>
      <nav class="col-sm-8">
        <p><a href="index.html">Log out</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
      <div class="col-sm-12">
        <table class="table">
          <caption>Manage Teams</caption>
          <tr>
            <td><a href="admin_team_stat.php?name=Boston Celtics">Boston Celtics</a></td>
            <td><a href="admin_team_stat.php?name=Dallas Mavericks">Dallas Mavericks</a></td>
            <td><a href="admin_team_stat.php?name=Chicago Bulls">Chicago Bulls</a></td>
            <td><a href="admin_team_stat.php?name=Denver Nuggets">Denver Nuggets</a></td>
            <td><a href="admin_team_stat.php?name=Atlanta Hawks">Atlanta Hawks</a></td>
            <td><a href="admin_team_stat.php?name=Golden State Warriors">Golden State Warriors</a></td>
          </tr>
          <tr>
            <td><a href="admin_team_stat.php?name=Brooklyn Nets">Brooklyn Nets</a></td>
            <td><a href="admin_team_stat.php?name=Houston Rockets">Houston Rockets</a></td>
            <td><a href="admin_team_stat.php?name=Cleveland Cavaliers">Cleveland Cavaliers</a></td>
            <td><a href="admin_team_stat.php?name=Minnesota Timberwolves">Minnesota Timberwolves</a></td>
            <td><a href="admin_team_stat.php?name=Charlotte Hornets">Charlotte Hornets</a></td>
            <td><a href="admin_team_stat.php?name=Los Angeles Clippers">Los Angeles Clippers</a></td>
          </tr>
          <tr>
            <td><a href="admin_team_stat.php?name=New York Knicks">New York Knicks</a></td>
            <td><a href="admin_team_stat.php?name=Memphis Grizzlies">Memphis Grizzlies</a></td>
            <td><a href="admin_team_stat.php?name=Detroit Pistons">Detroit Pistons</a></td>
            <td><a href="admin_team_stat.php?name=Portland Trail Blazers">Portland Trail Blazers</a></td>
            <td><a href="admin_team_stat.php?name=Miami Heat">Miami Heat</a></td>
            <td><a href="admin_team_stat.php?name=Los Angeles Lakers">Los Angeles Lakers</a></td>
          </tr>
          <tr>
            <td><a href="admin_team_stat.php?name=Philadelphia 76ers">Philadelphia 76ers</a></td>
            <td><a href="admin_team_stat.php?name=New Orleans Pelicans">New Orleans Pelicans</a></td>
            <td><a href="admin_team_stat.php?name=Indiana Pacers">Indiana Pacers</a></td>
            <td><a href="admin_team_stat.php?name=Oklahoma City Thunder">Oklahoma City Thunder</a></td>
            <td><a href="admin_team_stat.php?name=Orlando Magic">Orlando Magic</a></td>
            <td><a href="admin_team_stat.php?name=Phoenix Suns">Phoenix Suns</a></td>
          </tr>
          <tr>
            <td><a href="admin_team_stat.php?name=Toronto Raptors">Toronto Raptors</a></td>
            <td><a href="admin_team_stat.php?name=San Antonio Spurs">San Antonio Spurs</a></td>
            <td><a href="admin_team_stat.php?name=Milwaukee Bucks">Milwaukee Bucks</a></td>
            <td><a href="admin_team_stat.php?name=Utah Jazz">Utah Jazz</a></td>
            <td><a href="admin_team_stat.php?name=Washington Wizards">Washington Wizards</a></td>
            <td><a href="admin_team_stat.php?name=Sacramento Kings">Sacramento Kings</a></td>
          </tr>
        </table>
      </div>
  </section>

  <section class="container" style="margin-top: 40px;">
    <div class="col-sm-12">
      <p style="color:rgb(150,50,50); font-weight:500;"> Manage Players</p>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="playername">Enter Player Name:</label>
        <input type="text" id="playername" name="playername" />
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
                                          or concat(first , ' ' , last)='$playername'";
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
              echo "<td><a href='admin_player_stat.php?name=".$first." ".$last."'>".$first." ".$last."</a></td>";
              echo "<td>".$dob."</td>";
              echo "<td>".$nbayears."</td>";
              echo "<td>".$position."</td>";
              echo "<td>".$teamname."</td>";
			        echo "<td>".$no."</td>";
              echo "</tr>";
            }
        }
      ?>
    </table>
  </section>
  
  <section class="container" style="margin-top: 40px;">
    <div class="col-sm-12">
    <p style="color:rgb(150,50,50); font-weight:500;"> Manage Scores</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="gamedate">Enter Game Date:</label>
      <input type="text" id="gamedate" name="gamedate" />
      <input type="submit" value="Search" name="score_submit"/>
    </form>
	  </div>
	
    <table class="col-sm-12">
      
    <?php
      if (isset($_POST['score_submit'])) {
		    echo "<caption>2015-16 SEASON</caption>";
        echo "<tr>";
        echo "<th>Date</th>";
        echo "<th>Type</th>";
        echo "<th>Home Team</th>";
        echo "<th>Scores</th>";
        echo "<th>Guest Team</th>";
		    echo "<th>Update Scores";
        echo "</tr>";
		
        $gamedate=$_POST['gamedate'];

        $query_score="SELECT * FROM score where gameDate='$gamedate'";
        $result=mysqli_query($dbc, $query_score);

        while ($row = mysqli_fetch_array($result)) {
          $scoreid=$row['id'];
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

          echo "<td><form method='post' action='score_update_action.php'>
                    <input type='hidden' id='scoreid' name='scoreid' value='$scoreid' />
					          <input type='text' id='new_score' name='new_score' />
                    <input type='submit' value='Update' name='score_update'/>
                    </form></td>";
          echo "</tr>";
        }
      }
      mysqli_close($dbc);
    ?>
    </table>
  </section>

  <section class="container" style="margin-top: 40px;">
    <div class="col-sm-12">
    <p style="color:rgb(150,50,50); font-weight:500;"> Manage player honors</p>
    <form method="post" action="honor_update.php">
      <label for="mvp">Enter MVP name:</label>
      <input type="text" id="mvp" name="mvp" /><br>
      <label for="roy">Enter ROY name:</label>
      <input type="text" id="roy" name="roy" /><br>
      <label for="dpoy">Enter DPOY name:</label>
      <input type="text" id="dpoy" name="dpoy" /><br>
      <label for="smoy">Enter SMOY name:</label>
      <input type="text" id="smoy" name="smoy" /><br>
      <label for="mip">Enter MIP name:</label>
      <input type="text" id="mip" name="mip" /><br>
      <input type="submit" value="update" name="honor_update_submit"/>
    </form>
    </div>
  </section>
  
  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>
