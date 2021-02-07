<?php

function get_db_connectio(){

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

	$connection = get_db_connectio();

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
echo check_password('cch1987');
?>