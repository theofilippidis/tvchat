<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=441160562621946";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
include 'greeklish.php';

echo '<p style="font-family:verdana;font-size:26px;">'.str_replace('@','<.br>',$_GET["chat"]).'</p>';

if (empty($_GET["chat"])) {
 echo '<div class="fb-comments" data-href="https://apps.facebook.com/tvchatgr/" data-width="560" data-num-posts="50"></div>';
} else {
  echo '<div class="fb-comments" data-href="https://apps.facebook.com/tvchatgr/index.php?chat='.$_GET["chat"].'" data-width="560" data-num-posts="50"></div>';
}
?>
</body>
</html>


