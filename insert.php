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
    $device = $_POST['device'];
    $clave = $_POST['clave'];
    $parent = $_POST['parent'];



    // This code is to get the clave from the cookie
    if(isset($_COOKIE['usuario'])) {
        $clave = $_COOKIE['usuario'];
    }


    if(empty($comentario)){
        echo "comentario is empty";
    } else {
        
        // Obten todos los usuarios para sacarles su password
        $query_para_obtener_las_passwords = "SELECT nombre, password FROM usuarios";
        $nombre_contrasena = $connection->query($query_para_obtener_las_passwords);
        $cookie_value = NULL;
        $sql = "INSERT INTO comentarios (comentario, nombre, device, parent) VALUES('";
        
        while( $row = $nombre_contrasena->fetch_assoc()){
            if($clave == $row['password']){
                $cookie_value = $row['password'];
                $sql = $sql . $comentario  .  "','" . $row['nombre'];

                 

                echo $sql;
                echo '<BR>'

                if(empty($parent)){
                    $sql = $sql . "','" . $device . "',NULL)";    
                }
                
                echo $sql;
                echo '<BR>'
                
                if(!empty($parent)){
                    $sql = $sql . "','" . $device . "','" . $parent . "')";
                }
                   
                
                echo $sql;
                echo '<BR>'
                
                // Insert the comment of the user
                $connection->query($sql);
            }
        }

        // This code is to set the cookie with the clave if clave is correct the first time
        if (!empty($cookie_value)) {
            $cookie_name = "usuario";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", 'cesarcelis.com');
        }
    }
}
mysqli_close($connection);
//header('Location: index.php');
?>
