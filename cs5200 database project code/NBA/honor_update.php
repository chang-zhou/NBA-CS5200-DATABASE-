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

        
        if (isset($_POST['honor_update_submit'])) {
          $mvp=$_POST['mvp'];
          $roy=$_POST['roy'];
          $dpoy=$_POST['dpoy'];
          $smoy=$_POST['smoy'];
          $mip=$_POST['mip'];
        }


        $query1="SELECT * FROM player where concat(first, ' ', last)='$mvp'";
        $result1=mysqli_query($dbc, $query1);
        $query2="SELECT * FROM player where concat(first , ' ' , last)='$roy'";
        $result2=mysqli_query($dbc, $query2);
        $query3="SELECT * FROM player where concat(first , ' ' , last)='$dpoy'";
        $result3=mysqli_query($dbc, $query3);
        $query4="SELECT * FROM player where concat(first , ' ' , last)='$smoy'";
        $result4=mysqli_query($dbc, $query4);
        $query5="SELECT * FROM player where concat(first , ' ' , last)='$mip'";
        $result5=mysqli_query($dbc, $query5);

        if ($row1=mysqli_fetch_array($result1) && 
            $row2=mysqli_fetch_array($result2) && 
            $row3=mysqli_fetch_array($result3) && 
            $row4=mysqli_fetch_array($result4) && 
            $row5=mysqli_fetch_array($result5)) {
              $honor_update="UPDATE honor SET MVP='$mvp', ROY='$roy', DPOY='$dpoy', SMOY='$smoy',
                             MIP='$mip' WHERE id='1'";
              mysqli_query($dbc, $honor_update);
              echo "Update complete!";
          }
        else echo "player not exist!";
        mysqli_close($dbc);
    ?>
  
  <footer class="container">
    <div class="row">
      <p class="col-sm-4">&copy; 2016 NBA</p>
      
    </div>
  </footer>
</body>

</html>
