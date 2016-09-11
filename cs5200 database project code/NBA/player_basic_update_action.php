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

        
        if (isset($_POST['basic_update_submit'])) {
          $id=$_POST['playerid'];
          $first=$_POST['first'];
          $last=$_POST['last'];
          $dob=$_POST['dob'];
          $nbayears=$_POST['nbayears'];
          $position=$_POST['position'];
          $teamname=$_POST['teamname'];
		      $no=$_POST['no'];

          $query1="SELECT * FROM team where teamName='$teamname'";
          $result1=mysqli_query($dbc, $query1);
          if($row1 = mysqli_fetch_array($result1)) {
            $teamid=$row1['id'];
          }
          else $teamid='0';
          

          $query_player_update="UPDATE player SET first='$first', last='$last', dob='$dob', exp='$nbayears',
          position='$position', worksIn='$teamid',uniformNo='$no' WHERE id='$id'";
          mysqli_query($dbc, $query_player_update);
          mysqli_close($dbc);
          echo "Update complete!";
        }
    ?>
  
  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>
