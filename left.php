<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<p align=center>
<img src="on-air.jpeg">
</p>

<?php
include 'greeklish.php';

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

<p style="font-family:verdana;font-size:13px;">
<a href="https://apps.facebook.com/tvchatgr/index.php?chat=<?php

echo 
date ('Y/m/d').' '.
substr($page, $ch_start, $ch_end - $ch_start)
.'@'
.str_replace(':',':',substr($page, $dt_start, $dt_end - $dt_start))
.' - '
.substr($page, $ti_start, $ti_end - $ti_start);

?>" target="_top">
<?php
echo substr($page, $ch_start, $ch_end - $ch_start);
echo ' @ ';
echo substr($page, $dt_start, $dt_end - $dt_start);
echo ' <br> ';
echo substr($page, $ti_start, $ti_end - $ti_start);
?>

</a>
</p>

<?php 
$offset = $offset +5;

}

//echo  $page;

?>
</body>
</html>
