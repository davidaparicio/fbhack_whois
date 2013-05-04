<?php require_once './inc/header.php'; require_once './inc/menu.php';?>

<script type='text/javascript'>
  var ourscore = <?php echo $_SESSION['score']; ?>;
  updateScore();
</script>

<div id="points"></div>

<div id="container" class="row-fluid">
  <div id='debug_div' class="span6"></div>
  <div id='informations' class="span6">
    <div id="score_div"></div>
    <div id="fb-root"></div>
    <form id="guess_form" method='POST' action='right.php'>
      <label for="guess_name">Name: </label>
      <input id="guess_name" name="guess_name" />
      <input type="hidden" id='photo_url' name='photo_url' value=''>
      <input type="hidden" id='friend_name' name='friend_name' value=''>
      <input type="hidden" id='new_score' name='new_score' value=''>
      <input type="hidden" id='actual_user' name='actual_user' value=''> 
      <button id="guess_button" class="btn" onclick='guessWho()'>Guess Who?!</button>
    </form>
  </div>
</div>
<script>
  $("#container").hide();
</script>

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>

<script type='text/javascript'>

  function guessWho() {
    if (chosenFriendName == document.getElementById('guess_name').value) {
      ourscore = ourscore + points;
    }

    document.getElementById('new_score').value = ourscore;
    document.getElementById('photo_url').value = chosenFriendPhoto;
    document.getElementById('friend_name').value = chosenFriendName;
    document.getElementById('actual_user').value = actualUserName;
    $("#guess_form").submit(function() {
      return true;
    });
    updateSessionScore();
  }
</script>

<?php require_once './inc/footer.php'; ?>