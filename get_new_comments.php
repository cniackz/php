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
require 'print_comentario.php';







$punto_a = 0;

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $punto_a = $_GET['number_of_comments'];

}


$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// Get my cookie
$number_of_hour = 6;
if($_COOKIE['usuario']=='cch1987'){
    $number_of_hour = 5; // Para tener la hora de toronto
}




/*
################################################################################
#
# Query para seleccionar los comentarios de la base de datos
#
################################################################################
*/
// Estamos usando una funcion core llamada get_comments, que es usada por otros
// modulos, reusando codigo core lib yes
$where_clause = 'WHERE id > ' . $punto_a . ' ';
$limit = '';
$result = get_comments($connection, $where_clause, $number_of_hour, $limit);




// From: https://www.w3schools.com/php/php_mysql_select.asp
// str_replace("\n", "<BR>", $row['comentario']) <--- Esto es para que respeto los enters que metimos en el comment
while( $row = $result->fetch_assoc()){
    print_real_comentario($connection, $row, $number_of_hour);
}
//echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>

