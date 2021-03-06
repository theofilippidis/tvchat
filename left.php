<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="300" >
</head>
<style>
#channels
{
width:200;
border-collapse:collapse;
}
#channels td, #channels th 
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#channels th 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#ffffff;
}
#channels tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
</style>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,greek-ext,greek,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

<body>
    
    <!-- Facebook Face Pile -->      
    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=441160562621946";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
<p align=left>
<img src="remote-control.jpg" width="200">
</p>

<?php

function strposnth($haystack, $needle, $nth=1, $insenstive=0)
{
   //if its case insenstive, convert strings into lower case
   if ($insenstive) {
       $haystack=strtolower($haystack);
       $needle=strtolower($needle);
   }
   //count number of occurances
   $count=substr_count($haystack,$needle);
   
   //first check if the needle exists in the haystack, return false if it does not
   //also check if asked nth is within the count, return false if it doesnt
   if ($count<1 || $nth > $count) return false;

   
   //run a loop to nth number of accurance
   //start $pos from -1, cause we are adding 1 into it while searchig
   //so the very first iteration will be 0
   for($i=0,$pos=0,$len=0;$i<$nth;$i++)
   {    
       //get the position of needle in haystack
       //provide starting point 0 for first time ($pos=0, $len=0)
       //provide starting point as position + length of needle for next time
       $pos=strpos($haystack,$needle,$pos+$len);

       //check the length of needle to specify in strpos
       //do this only first time
       if ($i==0) $len=strlen($needle);
     }
   
   //return the number
   return $pos;
}


$page = file_get_contents('http://tv.pathfinder.gr/now');
$page = iconv("ISO-8859-7","UTF-8", $page);

$page = substr ($page,strpos($page,'http://img.pathfinder.gr/Pathfinder/Tv/sections/now.gif'));

$page = substr($page,strpos($page,'<td width="1%" align="center">'));

$page = substr ($page, 0,strpos($page,'</table>'));

$offset=1;

//echo $page;

//echo "-------------------------------------------------</br>";

while (strposnth($page,'</td>',$offset)>0) {


$dt_end = strposnth($page,'</td>',$offset);
$dt_start = strrpos(substr($page,0,$dt_end),'<td width="1%" align="center">')+30;

$ti_end = strposnth($page,'</td>',$offset+1);
$ti_start = strpos($page,'>',$dt_end+5+1)+1;

if (strpos(substr($page,0,$ti_end),'>',$ti_start+1)>0) {
  $ti_start = strpos($page,'>',$ti_start+1)+1;
} 

if (strpos($page,'<',$ti_start)>0) {
 $ti_end = strpos($page,'<',$ti_start);
}

$ch_end = strposnth($page,'</td>',$offset+2);
$ch_start = strrpos(substr($page,0,$ch_end),'>', $ti_end+1)+1;
?>



    
<table id="channels"> 
<tr>
<th>
<p style="font-family: 'Orbitron', sans-serif;font-size:18px;">       
<?php
  //  echo ' @ ';
echo substr($page, $dt_start, $dt_end - $dt_start);
?>
</th></tr>
<tr>
<td align="center">
<?php
switch (substr($page, $ch_start, $ch_end - $ch_start))
{
case "Mega":
    echo '<img src="channels/mega.jpg"<></img>';
    break;
case "Ant1":
    echo '<img src="channels/ant1.jpg"<></img>';
    break;
case "Alpha":
    echo '<img src="channels/alpha.jpg"<></img>';
    break;
case "Star":
    echo '<img src="channels/star.jpg"<></img>';
    break;
case "ΣΚΑΪ":
    echo '<img src="channels/skai.jpg"<></img>';
    break;
case "Κανάλι της Βουλής":
    echo '<img src="channels/vouli.jpg.png"<></img>';
    break;
case "Μακεδονία TV":
    echo '<img src="channels/makedonia.jpg"<></img>';
    break;
default:
    echo substr($page, $ch_start, $ch_end - $ch_start);
}
?>
</td>
</tr>
<tr><td align="center">
</p>
<p style="font-family: 'Roboto Condensed', sans-serif;font-size:18px;">   
<?php
echo substr($page, $ti_start, $ti_end - $ti_start);
?>
</p> 
</td></tr>
<tr  class="alt"><td align="center">
<p style="font-family: 'Fredoka One', cursive;font-size:18px;">  

<a href="https://apps.facebook.com/tvchatgr/chat.php?chat=<?php
echo 
date ('Y/m/d').' '.
substr($page, $ch_start, $ch_end - $ch_start)
.'@'
.str_replace(':',':',substr($page, $dt_start, $dt_end - $dt_start))
.' - '
.substr($page, $ti_start, $ti_end - $ti_start);

?>" target="_top">Chat Now <img src="chat.png" alt="Chat now!" height="18" width="18"></img>
</a>
</p> 
</td></tr>
</table>

<?php 
$offset = $offset +5;

}

//echo  $page;

?>

<div class="fb-facepile" data-app-id="441160562621946" data-width="200" data-max-rows="25" data-size="large"></div>
</body>
</html>
