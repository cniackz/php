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

// Punto inicial para obtener el comentario
$punto_a = 0;
// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $punto_a = $_GET['number_of_comments'] - 1;

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
display_comments_function($connection, 'pasado', $punto_a);

echo '<DIV id="moreComments' . ($_GET['number_of_comments'] - 10) . '"><BUTTON type="button" class="botones" id="boton_cargar_comentarios" onclick="carga_mas_comentarios_js();">Ver mas</BUTTON>

<!--

Este boton es para que aparezca el boton de arriba despues de que cargamos mas comentarios

-->
<BUTTON type="button" class="botones" onClick="document.getElementById(\'topid\').scrollIntoView();">
    Arriba
</BUTTON>



</DIV>';
//echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>

