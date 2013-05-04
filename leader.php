<?php require_once './inc/header.php'; require_once './inc/menu.php';?>

<?php session_destroy(); ?>

<img src="./img/trophy.png" class="pull-left">
<h1>Leaderboard</h1>
<!--a class="btn btn-primary" href="#"><i class="icon-refresh icon-spin"></i> Synchronizing the leaderboard...</a><br/-->
<a class="btn btn-success" href="#">✓ Leaderboard successfull updated</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Score</th>
    </tr>
  </thead>
  <tbody>

<?php
$link = mysql_connect('localhost', 'whois', 'Wm2NuYwhEhWMqDyN');
if (!$link) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('whois');
$sql = "SELECT * FROM rank ORDER BY score DESC LIMIT 50";
$r = mysql_query($sql);
$num_rows = mysql_num_rows($r);
for($i = 1; $i<= $num_rows; $i++) {
  $row = mysql_fetch_row($r);
  //print_r($row);
  echo "<tr><td>".$i."</td><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
}
?>
  </tbody>
</table>

<?php require_once './inc/footer.php'; ?>