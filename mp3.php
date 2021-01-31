<?php
//https://coursesweb.net/php-mysql/output-force-download-mp3-php#:~:text=Force%20Download%20MP3%20file%20with%20PHP&text=header('Content%2DDisposition%3A%20attachment,%22attachment%22%20to%20force%20download.
// Force Download MP3 file with PHP

$mp3 ='abc.mp3'; // path to mp3, so here

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



