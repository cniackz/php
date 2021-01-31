<?php
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=abc.mp3"); 
echo $output;
die();
?>