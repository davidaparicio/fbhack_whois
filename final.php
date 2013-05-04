<?php require_once './inc/header.php'; require_once './inc/menu.php';?>

<?php 
    echo "Final Score: " . $_SESSION['score'];

    if (isset($_SESSION['actual_user'])) $actual = $_SESSION['actual_user'];

 $link = mysql_connect('localhost', 'whois', 'Wm2NuYwhEhWMqDyN');
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }

  mysql_select_db('whois');

  $sql = "SELECT * FROM rank WHERE user_name = '$actual'";
  $r = mysql_query($sql);
  $num_rows = mysql_num_rows($r);

  $score = $_SESSION['score'];
  if ($num_rows == 0) {
    $sql = "INSERT INTO rank VALUES('$actual', $score)";
    mysql_query($sql);
  }
  else {
    $row = mysql_fetch_row($r);
    $old_score = $row[1];

    if ($old_score < $score) {
      $sql = "UPDATE rank SET score = $score WHERE user_name = '$actual'";
      mysql_query($sql);
    }
  }
  mysql_close($link);

  session_destroy();
?>

<?php require_once './inc/footer.php'; ?>