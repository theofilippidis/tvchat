<html>
<head>
<meta charset="UTF-8">
<title>TVchat.gr</title>

</head>
<body>

<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

<table border="0">
<tr>
<td>
<a href="https://apps.facebook.com/tvchatgr/chat.php" target="_top">
<img src="retro-tv-icon.jpg" alt="TVchat.gr" width="128" height="96">
<!-- <img src="tvchat.png"> -->
</a> 
</td>
<td>
<div style="font-family: 'Fredoka One', cursive;font-size:400%;color:rgb(208,124,54);">TVchat.gr</div>
</td>
<td>
<div style="font-size:x-small;font-family: 'Orbitron', sans-serif;color:#A9A9A9;">v1.08</div>
</td>
</tr>
</table>
<?php


   $app_id = "441160562621946";
   $app_secret = "79b785ec4ed3530fb0cd9965fa9320e2";
   $my_url = "https://apps.facebook.com/tvchatgr/chat.php";

session_start();

 $code = $_REQUEST["code"];

 //  if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
     $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
       . "&client_secret=" . $app_secret . "&code=" . $code;

     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);

     $_SESSION['access_token'] = $params['access_token'];

setcookie('ACCESS_TOKEN',$params['access_token']);

 //echo("<script> top.location.href='apex/f?p=111'</script>");
  // 
  // }
   //else {
   //  echo("The state does not match. You may be a victim of CSRF.");
  // }

?>    

</body>
</html>
