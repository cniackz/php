<?php

$mp3 ='abc.mp3';

if(file_exists($mp3)) {
  header('Content-Type: audio/mpeg');
  header('Content-Disposition: attachment; filename="mp3_file.mp3"');
  header('Content-length: '. filesize($mp3));
  header('Cache-Control: no-cache');
  header('Content-Transfer-Encoding: chunked'); 
  readfile($mp3);
  exit;
}

?>



