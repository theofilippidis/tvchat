<html>
<head>
<title>TVchat.gr</title>
<meta name="google-site-verification" content="D2WpraUfY8F7c89KLUcTCZ9wSojHckAuS-T_Gkznwts" />
</head>
<body>    
 <?php

   $app_id = "441160562621946";
   $app_secret = "79b785ec4ed3530fb0cd9965fa9320e2";
   $my_url = "https://apps.facebook.com/tvchatgr/chat.php";

   session_start();

 $code = $_REQUEST["code"];

   if(empty($code)) {
     $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id="
       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
       . $_SESSION['state']; //. "&scope=email,user_likes,friends_likes";

     echo("<script> top.location.href='" . $dialog_url . "'</script>");
   }

?>
</body>
</html>
