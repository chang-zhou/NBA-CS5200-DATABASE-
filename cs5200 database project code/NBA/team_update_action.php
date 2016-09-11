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
        <p><a href="admin.php">Admin Home</a></p>
        <p><a href="index.html">Log out</a></p>
      </nav>
    </div>
  </header>
  <?php
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'nba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (isset($_POST['update_submit'])) {
          $teamid = $_POST['teamid'];
          $gametype = $_POST['gametype'];
          $fg=$_POST['fg'];
          $tp=$_POST['tp'];
          $ft=$_POST['ft'];
          $trb=$_POST['trb'];
          $orb=$_POST['orb'];
          $drb=$_POST['drb'];
          $ast=$_POST['ast'];
		      $stl=$_POST['stl'];
          $blk=$_POST['blk'];
          $tov=$_POST['tov'];
          $pf=$_POST['pf'];  
          $pts=$_POST['pts'];
		  
          $query_team_update="UPDATE teamstat SET FG='$fg',3P='$tp',FT='$ft',TRB='$trb',ORB='$orb',DRB='$drb',
		      AST='$ast',STL='$stl',BLK='$blk',TOV='$tov',PF='$pf',PTS='$pts' WHERE teamId='$teamid' and gameType='$gametype'";
          mysqli_query($dbc, $query_team_update);
          mysqli_close($dbc);
          echo "Update complete!";
        }
		
		if (isset($_POST['insert_submit'])) {
          $teamid = $_POST['teamid'];
          $gametype = $_POST['gametype'];
          $fg=$_POST['fg'];
          $tp=$_POST['tp'];
          $ft=$_POST['ft'];
          $trb=$_POST['trb'];
          $orb=$_POST['orb'];
          $drb=$_POST['drb'];
          $ast=$_POST['ast'];
		      $stl=$_POST['stl'];
          $blk=$_POST['blk'];
          $tov=$_POST['tov'];
          $pf=$_POST['pf'];  
          $pts=$_POST['pts'];
		  
          $query_team_insert="INSERT INTO teamstat SET teamId='$teamid', gameType='$gametype',FG='$fg',3P='$tp',FT='$ft',
          TRB='$trb',ORB='$orb',DRB='$drb', AST='$ast',STL='$stl',BLK='$blk',TOV='$tov',PF='$pf',PTS='$pts'";
          mysqli_query($dbc, $query_team_insert);
          mysqli_close($dbc);
          echo "Insert complete!";
        }
		

    ?>
  
  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>
