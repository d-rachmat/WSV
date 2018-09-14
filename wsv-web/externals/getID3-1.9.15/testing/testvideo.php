<?php

include_once('../getid3/getid3.php');

$filename = "Video.mp4";

$getID3 = new getID3;
$file = $getID3->analyze($filename);
echo("Duration: ".$file['playtime_string'].
" / Dimensions: ".$file['video']['resolution_x']." wide by ".$file['video']['resolution_y']." tall".
" / Filesize: ".$file['filesize']." bytes<br />");

?>