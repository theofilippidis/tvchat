
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>TVchat.gr</title>
</head>


<frameset cols="200,*" frameborder="0" border="0" framespacing="0">
	<frame name="left" src="left.php" marginheight="0" marginwidth="0" scrolling="auto" noresize>
<frameset rows="150,*" frameborder="0" border="0" framespacing="0">
  	<frame name="top" src="top.php">
<?php
echo '<frame cols="500,*"name="chat" src="comments.php?chat='. $_GET["chat"] .'" marginheight="0" marginwidth="0" scrolling="auto" >';
?>
</frameset>

<noframes>
<img src="retro-tv-icon.jpg"><p>Συζήτηση σχετικά με το τι παρακολουθείτε στην τηλεόραση τώρα!</p>
</noframes>

</frameset>
</html>
