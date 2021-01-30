<?php

$connection = mysqli_connect('localhost', 'root', '', 'cesar');

if (!$connection) {

	echo "Error: Unable to connect to MySQL." . PHP_EOL;
 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 	exit;
}

$sql = 'SELECT * FROM cesar_juan';

$result = $connection->query($sql);

while( $row = $result->fetch_assoc()){

	echo $row['comentario'];

}

?>