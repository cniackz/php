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
require 'core_lib.php'; // <---- Al parece necesito esto para que display_comments_function pueda usar get_username

// Starting point to get the comment
$punto_a = 0;
// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $punto_a = $_GET['number_of_comments'];

}

// Get db connection
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// Display comments
display_comments_function($connection, 'futuro', $punto_a); // <--- Esta funcion esta fallando con 500 en Marzo 3

//echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>

