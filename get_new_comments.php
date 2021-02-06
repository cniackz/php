<!--
################################################################################
#
#                                   PHP
#
################################################################################
-->
<?php





// Aqui esta la funcion que tiene la query para traer los comentarios de la base de datos
require 'display_comments.php';







$punto_a = 0;

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $punto_a = $_GET['number_of_comments'];

}

// To get db connection
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// To display comments
display_comments_function($connection, 'futuro');

mysqli_close($connection);
?>

