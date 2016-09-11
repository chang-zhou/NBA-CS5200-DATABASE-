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

  <section class="container">
    <table class="col-sm-6">
      <caption>2015-16 SEASON</caption>
      <tr>
        <th>Date</th>
        <th>Type</th>
        <th>Guest Team</th>
        <th>Scores</th>
        <th>Home Team</th>
      </tr>
    <?php
      define('DB_HOST', 'localhost');
      define('DB_USER', 'root');
      define('DB_PASS', '');
      define('DB_NAME', 'mynba');

      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if (isset($_POST['score_update'])) {
        $gamedate=$_POST['gamedate'];

        $query_score="SELECT * FROM scores where gamedate='$gamedate'";
        $result=mysqli_query($dbc, $query_score);

        while ($row = mysqli_fetch_array($result)) {
          $gamedate = $row['gamedate'];
          $type= $row['type'];
          $guest = $row['guest'];
          $score = $row['score'];
          $home = $row['home'];

          echo "<tr>";
          echo "<td>".$gamedate."</td>";
          echo "<td>".$type."</td>";
          echo "<td>".$guest."</td>";
          echo "<td>".$score."</td>";
          echo "<td>".$home."</td>";
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
