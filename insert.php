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
    $clave = $_POST['clave'];

    // This code is to get the clave from the cookie
    if(isset($_COOKIE['usuario'])) {
        $clave = $_COOKIE['usuario'];
    }


    if(empty($comentario)){
        echo "comentario is empty";
    } else {
        $cookie_value = NULL;
        $sql = "INSERT INTO comentarios (comentario, nombre) VALUES('"
        if ($clave == 'jacl1960') {
            $cookie_value = 'jacl1960';
            $sql = $sql . $comentario  .  "','juan')";
            $result = $connection->query($sql);
        }
        if ($clave == 'cch1987') {
            $cookie_value = 'cch1987';
            $sql = $sql . $comentario  . "','cesar')";
            $result = $connection->query($sql);
        }
        if ($clave == 'ejch1994'){
            $cookie_value = 'ejch1994';
            $sql = $sql . $comentario  . "','gogo')";
            $result = $connection->query($sql);
        }
        if ($clave == 'larh1989'){
            $cookie_value = 'larh1989';
            $sql = $sql . $comentario  . "','liz')";
            $result = $connection->query($sql);
        }

        // This code is to set the cookie with the clave if clave is correct the first time
        if (!empty($cookie_value)) {
                $cookie_name = "usuario";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", 'cesarcelis.com');
        }
    }
}
mysqli_close($connection);
header('Location: index.php');
?>
