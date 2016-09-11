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
        define('DB_NAME', 'mynba');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        
        if (isset($_POST['insert_submit'])) {
          $playerid = $_POST['id'];
          $gametype = $_POST['gametype'];
          $ppg=$_POST['ppg'];
          $rpg=$_POST['rpg'];
          $apg=$_POST['apg'];
          $spg=$_POST['spg'];
          $bpg=$_POST['bpg'];

          $query_player_insert="INSERT INTO playerstat (gametype, ppg, rpg, apg, spg, bpg, playerid)
          VALUES ('$gametype', '$ppg', '$rpg', '$apg', '$spg', '$bpg', '$playerid')";
          mysqli_query($dbc, $query_player_insert);
          mysqli_close($dbc);
          echo "New record created successfully!";
        }
    ?>
  
  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>
