<?

function check_password($connection, $password){
	// Return TRUE if password exist
	// Return FALSE if password does not exist
	$final_result = FALSE;
	$sql = 'SELECT password FROM usuarios WHERE password = $password';
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	if(isset($row['password'])){
		$final_result = TRUE;
	} else {
		$final_result = FALSE;
	}
	return $final_result;
}

?>