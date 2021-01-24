<?php
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    // This code is to get the comentario and clave from the main page
    $usuario     = $_POST['usuario']; 
    $contrasenia = $_POST['contrasenia'];

    if(!empty($usuario)) {
        // Only do this if usuario is not empty
        // Obten todos los usuarios para sacarles su password
        $find_password = "SELECT password FROM usuarios WHERE nombre = '";
        $find_password = $find_password . $usuario . "'";
        echo $find_password;
        $password = $connection->query($find_password);
        //$cookie_value = NULL;
        //$row = $password->fetch_assoc())
    //    if ($row['password'] == $password) {
    //        setcookie("usuario", $password, time() + (86400 * 30), "/", 'cesarcelis.com');
    //    }
    }
}
mysqli_close($connection);
//header('Location: login.php');
?>
