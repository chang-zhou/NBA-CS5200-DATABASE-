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
		      $playerid = $_POST['playerid'];
          $gametype = $_POST['gametype'];
          $FG=$_POST['FG'];
          $TP=$_POST['TP'];
          $FT=$_POST['FT'];
          $TRB=$_POST['TRB'];
          $ORB=$_POST['ORB'];
          $DRB=$_POST['DRB'];
          $AST=$_POST['AST'];
		      $STL=$_POST['STL'];
          $BLK=$_POST['BLK'];
          $TOV=$_POST['TOV'];
          $PF=$_POST['PF'];  
          $PTS=$_POST['PTS'];

          $query_player_update="UPDATE playerstat SET FG='$FG',3P='$TP',FT='$FT',TRB='$TRB',ORB='$ORB',DRB='$DRB',
		      AST='$AST',STL='$STL',BLK='$BLK',TOV='$TOV',PF='$PF',PTS='$PTS' WHERE playerId='$playerid' and gameType='$gametype'";
          mysqli_query($dbc, $query_player_update);
          mysqli_close($dbc);
          echo "Update complete!";
        }
		
		if (isset($_POST['insert_submit'])) {	  
		      $playerid = $_POST['id'];
          $gametype = $_POST['gametype'];
          $FG=$_POST['FG'];
          $TP=$_POST['TP'];
          $FT=$_POST['FT'];
          $TRB=$_POST['TRB'];
          $ORB=$_POST['ORB'];
          $DRB=$_POST['DRB'];
          $AST=$_POST['AST'];
		      $STL=$_POST['STL'];
          $BLK=$_POST['BLK'];
          $TOV=$_POST['TOV'];
          $PF=$_POST['PF'];  
          $PTS=$_POST['PTS'];

          $query_player_insert="INSERT INTO playerstat SET FG='$FG',3P='$TP',FT='$FT',TRB='$TRB',ORB='$ORB',DRB='$DRB',
		      AST='$AST',STL='$STL',BLK='$BLK',TOV='$TOV',PF='$PF',PTS='$PTS', playerId='$playerid' , gameType='$gametype'";
          mysqli_query($dbc, $query_player_insert);
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
