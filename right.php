<?php require_once './inc/header.php'; require_once './inc/menu.php';?>

<?php 

    if (isset($_POST['new_score']))
      $_SESSION['score'] = $_POST['new_score'];

    if (isset($_POST['photo_url'])) $photo_url = $_POST['photo_url'];
    if (isset($_POST['friend_name'])) $friend_name = $_POST['friend_name'];
    if (isset($_POST['guess_name'])) $guess_name = $_POST['guess_name'];
    if (isset($_POST['actual_user'])) $_SESSION['actual_user'] = $_POST['actual_user'];
?>

<script>
  function goNext() {
    if (<?php echo $_SESSION['rounds']; ?> > 4)
      document.location.href = "final.php";
    else
      document.location.href = "index.php";
  }
</script>

<div id="container" class="row-fluid">
  <div id="score_div" class="score_results">Total score: <?php echo floor($_SESSION['score']); ?></div>
  <div id="try">
    <div class="span6"><img src="<?php echo $photo_url; ?>" style="display:inline;"/><br />
    </div>
    <div id="try_info" class="span6">
      <label for="try_name">You tried: </label>
      <label id="try_name"><?php echo $guess_name; ?></label><br />
      <label for="true_name">True name: </label>
      <label id="true_name"><?php echo $friend_name; ?></label><br />
      <?php
        if ($guess_name == $friend_name)
          echo "<img src='img/correct.png' />";
        else
          echo "<img src='img/wrong.png' />";
      ?>
      <br />
      <button id="new_game_button" onclick="goNext()">Another photo</button>
    </div>
  </div>
</div>

<?php require_once './inc/footer.php'; ?>