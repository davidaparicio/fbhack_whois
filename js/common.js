  var points = 500.0;
  var blur = 25.0;
  var rotdeg = 3780;
  var actualUserName;
  var chosenFriendName;
  var chosenFriendPhoto;
  var friendsList = new Array();

  $('#container').hide();

  window.onload = function() {
    $('#name').focus();
    $('#name').bind('keypress',function (event){
      if (event.keyCode === 13){
	if($('#name')[0].value != ""){
	  $('#guess_button').click();	
	}
        else{
          document.getElementById('#name').focus();
        }
      }
    });

  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '272152229588551', // App ID
    channelUrl : '//whois.aparicio.eu/index.php', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  FB.Event.subscribe('auth.authResponseChange', function(response) {
    if (response.status === 'connected') {       
      $("#container").show();
      $(".fb_iframe_widget").hide();
      
      updateScore();
      pickFriend();
      //hideExtras();
      FB.api('/me', function(response) {
        actualUserName = response.name;
      });

      $( "#guess_name" ).autocomplete({
        source: friendsList
      });

    } else if (response.status === 'not_authorized') {
      FB.login();
    } else {
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
      return;
    }
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  } (document) );

  function loadFriendsList(friends) {
    for(i = 0; i < friends.length; i++) {
      friendsList[i] = friends[i].name;
    }
  }

  var count = 0;
  function updateBlur() {
    if (blur > 0) {
      $("#friendImg").css('-webkit-filter', 'blur(' + blur + 'px)');
      blur = blur - 0.1;
      points = points - 2;
      $("#points").html("Points: " + points);
      setTimeout('updateBlur()', 100);
    }
    else {
      window.location.reload();
    }
  }

  function updateRotate(){
    if (points > 0) {
      $("#friendImg").css('-webkit-transform', 'rotate(' + rotdeg + 'deg)');

      rotdeg = rotdeg - points;
      points = points - 0.2;
      $("#points").html("Points: " + Math.floor(points));
      setTimeout('updateRotate()', 10);
    }
    else {
      window.location.reload();
    }  
  }

   function hideExtras(){
       $('.fb_iframe_widget').css('visibility', 'hidden');
   }

  function updateScore() {
    $("#score_div").html("Total score: " + ourscore);
  }

  function pickFriend() {
    $("#points").html("Points: " + points);
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me/friends', function(response) {

      loadFriendsList(response.data);

      var friendChosen = Math.floor(Math.random() * response.data.length);
      var friendID = response.data[friendChosen].id;
      chosenFriendName = response.data[friendChosen].name;
      var profilePicURL = '/' + friendID + '/picture?type=large';

      FB.api(profilePicURL, function(response) {
        document.getElementById('debug_div').innerHTML = "<img id='friendImg' src='" + response.data.url + "' style='background: #fff; padding: 10px 10px 15px; color: #333; font-size: 18px; -webkit-box-shadow: 0 3px 6px rgba(0,0,0,.25); -moz-box-shadow: 0 3px 6px rgba(0,0,0,.25);' />";
        $("img").mousedown(function(){return false;});

        var f = 'updateBlur()';
        if (Math.random() > 0.5)
          f = 'updateRotate()';

        setTimeout(f, 200);
        chosenFriendPhoto = response.data.url;
      });
    });
  }
