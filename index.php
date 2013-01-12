
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
echo '<frame name="chat" src="chat.php?chat='. $_GET["chat"] .'" marginheight="0" marginwidth="0" scrolling="auto" noresize>';
?>
</frameset>

<noframes>
<p>This section (everything between the 'noframes' tags) will only be displayed if the users' browser doesn't support frames. You can provide a link to a non-frames version of the website here. Feel free to use HTML tags within this section.</p>
</noframes>

</frameset>
</html>
