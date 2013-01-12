<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_GET["chat"];  ?></title>
</head>
<body>

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

echo '<p style="font-family:verdana;font-size:26px;">'.str_replace('-','</br>',$_GET["chat"]).'</p>';

echo '<p align="right"><a href="https://apps.facebook.com/tvchatgr/index.php?chat='.$_GET["chat"].'"i target="_top"><img src="refresh.jpg"></a></p>';

if (empty($_GET["chat"])) {
 echo '<div class="fb-comments" data-href="https://apps.facebook.com/tvchatgr/" data-width="560" data-num-posts="50"></div>';
} else {
  echo '<div class="fb-comments" data-href="https://apps.facebook.com/tvchatgr/index.php?chat='.$_GET["chat"].'" data-width="560" data-num-posts="50"></div>';
}
?>
</body>
</html>


