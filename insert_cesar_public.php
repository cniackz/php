<?php
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    // This code is to get the comentario and clave from the main page
    $comentario = $_POST['comentario'];
    $nombre = $_POST['nombre'];

    if(empty($comentario) or empty($nombre)){
        echo "comentario is empty";
    } else {
        
        $sql = "INSERT INTO public_comments (comentario, nombre) VALUES('$comentario', '$nombre')";
        echo $sql;
        $connection->query($sql);
    }
}
mysqli_close($connection);
header('Location: cesar_public.php');
?>
