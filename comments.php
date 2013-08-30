<html>
<head>
<meta charset="UTF-8">
<title>
<?php

if (empty($_GET["chat"])) {
    echo 'TVchat.gr';
    } else {

echo 'TVchat.gr : '.$_GET["chat"];
    }
?>    
</title>
<style>
.center
{
margin:auto;
width:90%;
align:center;
}
</style>
</head>
<body>
  
<!-- Google Analytics -->    
    
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2408143-12']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<!-- Facebook Comments -->

<div class="center" id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=441160562621946";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Google Adesnse -->

<div class="center">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-0132583951198869";
/* TVchat.gr */
google_ad_slot = "9051360238";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<div class="center">
<div class="fb-like" data-href="http://TVchat.gr" data-width="450" data-show-faces="true" data-send="true"></div>
</div>

<div class="center">
<?php
//include 'greeklish.php';

echo '<p style="font-family:verdana;font-size:26px;">'.str_replace('-','</br>',$_GET["chat"]).'</p>';

if (empty($_GET["chat"])) {
    echo '<p><a href="https://apps.facebook.com/tvchatgr/chat.php" target="_top"><img src="refresh.jpg"></a></p>';
    } else {

echo '<p><a href="https://apps.facebook.com/tvchatgr/chat.php?chat='.$_GET["chat"].'" target="_top"><img src="refresh.jpg"></a></p>';
    }
    
if (empty($_GET["chat"])) {
 echo '<div class="fb-comments" data-href="https://apps.facebook.com/tvchatgr/" data-width="800" data-num-posts="50"></div>';
} else {
  echo '<div class="fb-comments" data-href="https://apps.facebook.com/tvchatgr/chat.php?chat='.$_GET["chat"].'" data-width="800" data-num-posts="50"></div>';
}
?>
</div>

</body>
</html>


