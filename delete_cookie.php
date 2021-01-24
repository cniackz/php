<?php

// This code will delete the cookie by setting an invalid password in the value
// when hola is set as the user password, then the cookie becomes invalid
// and hence the user cannot see comments and has to login again
setcookie("usuario", "hola", time() + (86400 * 30), "/", 'cesarcelis.com');
header('Location: login.php');
?>
