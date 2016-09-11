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
      	<p><a href="admin.php">Admin Home</a></p>
        <p><a href="index.html">Log out</a></p>
      </nav>
    </div>
  </header>

  <section class="container">
    <table class="col-sm-8">
      <caption>Player Basic Info</caption>
      <tr>
        <th>Name</th>
        <th>BirthDate</th>
        <th>NBAYears</th>
        <th>Position</th>
        <th>Team</th>
		    <th>Uniform Number</th>
      </tr>
	  
      <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $query="SELECT * FROM player where concat(first , ' ' , last)='$playername'";
			       
            $result=mysqli_query($dbc, $query);
             
            while ($row = mysqli_fetch_array($result)) {
			        $playerid=$row['id'];
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
              echo "<td>".$first." ".$last."</td>";			  
			        echo "<td>".$dob."</td>";
              echo "<td>".$nbayears."</td>";
              echo "<td>".$position."</td>";
              echo "<td>".$teamname."</td>";
			        echo "<td>".$no."</td>";
              echo "</tr>";
            }		
      ?>
    </table>
  </section>

  <section class="container">
    <div >
      <form method="post" action="player_basic_update_action.php">
        <label for="playername">Update Player Infos:</label></br>
		    <input type="hidden" id="editor" value="<?php echo $playerid ?>" name="playerid" />
        <input type="text" id="editor"  value="<?php echo $first ?>" name="first" />
        <input type="text" id="editor"  value="<?php echo $last ?>" name="last"/>
        <input type="text" id="editor"  value="<?php echo $dob ?>" name="dob"/>
        <input type="text" id="editor"  value="<?php echo $nbayears ?>" name="nbayears"/>
        <input type="text" id="editor"  value="<?php echo $position ?>" name="position"/>
        <input type="text" id="editor"  value="<?php echo $teamname ?>" name="teamname"/>
		    <input type="text" id="editor"  value="<?php echo $no ?>" name="no"/>
        <input type="submit" value="Update" name="basic_update_submit"/>
      </form>
    </div>
  </section>

  <section class="container">
    <table class="col-sm-8">
      <caption>STATS 2015-16 SEASON</caption>
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
	      $query2="SELECT * FROM playerstat where playerId='$playerid'";
        $result2=mysqli_query($dbc, $query2);
            
        while ($row2 = mysqli_fetch_array($result2)) {	  
		      $gametype=$row2['gameType'];
		      $FG=$row2['FG'];
          $TP=$row2['3P'];
		      $FT=$row2['FT'];
          $TRB=$row2['TRB'];
		      $ORB=$row2['ORB'];
          $DRB=$row2['DRB'];
		      $AST=$row2['AST'];
          $STL=$row2['STL'];
		      $BLK=$row2['BLK'];
          $TOV=$row2['TOV'];
		      $PF=$row2['PF'];
          $PTS=$row2['PTS'];
              
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

  <section class="container">
    <div >
      <form method="post" action="player_update_action.php">
        <label for="playername">Update Player Stats:</label></br>
		    <input type="hidden" id="editor" value="<?php echo $playerid ?>" name="playerid" />
        <input type="text" id="editor"  value="<?php echo $gametype ?>" name="gametype" />
        <input type="text" id="editor"  value="<?php echo $FG ?>" name="FG"/>
        <input type="text" id="editor"  value="<?php echo $TP ?>" name="TP"/>
        <input type="text" id="editor"  value="<?php echo $FT ?>" name="FT"/>
        <input type="text" id="editor"  value="<?php echo $TRB ?>" name="TRB"/>
        <input type="text" id="editor"  value="<?php echo $ORB ?>" name="ORB"/>
		    <input type="text" id="editor"  value="<?php echo $DRB ?>" name="DRB"/>
        <input type="text" id="editor"  value="<?php echo $AST ?>" name="AST"/>
        <input type="text" id="editor"  value="<?php echo $STL ?>" name="STL"/>
        <input type="text" id="editor"  value="<?php echo $BLK ?>" name="BLK"/>
        <input type="text" id="editor"  value="<?php echo $TOV ?>" name="TOV"/>
        <input type="text" id="editor"  value="<?php echo $PF ?>" name="PF"/>
        <input type="text" id="editor"  value="<?php echo $PTS ?>" name="PTS"/>
        <input type="submit" value="Update" name="update_submit"/>
		    <input type="submit" value="Insert" name="insert_submit"/>

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

