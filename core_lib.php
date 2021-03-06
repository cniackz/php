<?php

function get_db_connection(){

	// To get db connection
	$connection = mysqli_connect('localhost', 'root', '', 'cesar');
	if (!$connection) {
	 echo "Error: Unable to connect to MySQL." . PHP_EOL;
	 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	 exit;
	}

	return $connection;

}

function check_password($password){
	// Return TRUE if password exist
	// Return FALSE if password does not exist

	$connection = get_db_connection();

	// Main logic
	$final_result = FALSE;
	$sql = "SELECT password FROM usuarios WHERE password = '$password'";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	if(isset($row['password'])){
		$final_result = TRUE;
	} else {
		$final_result = FALSE;
	}

	mysqli_close($connection);

	return $final_result;
}

function get_username($password){
	$final_result = FALSE;
	$connection = get_db_connection();
	$sql = "SELECT nombre FROM usuarios WHERE password='$password'";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	if(isset($row['nombre'])){
		$final_result = $row['nombre'];
	} else {
		$final_result = FALSE;
	}
	mysqli_close($connection);
	return $final_result;
}

?>