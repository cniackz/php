<?php
require 'core_lib.php';
$connection = mysqli_connect('localhost', 'root', '', 'cesar');

if (!$connection) {

	echo "Error: Unable to connect to MySQL." . PHP_EOL;
 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 	exit;
}

$puede_continuar = FALSE;
if(get_username($_COOKIE['usuario'])=='cesar'){
	$puede_continuar = TRUE;
}
if(get_username($_COOKIE['usuario'])=='liz'){
	$puede_continuar = TRUE;
}
if($puede_continuar==FALSE){
	echo 'No tienes acceso';
	exit;
}

// CONVERT_TZ((coments.fecha),'+00:00','-06:00') AS fecha,
$sql = '
SELECT
	comentario,
	nombre,
	id,
	CONVERT_TZ((fecha),\'+00:00\',\'-05:00\') AS fecha
FROM cesar_liz 
ORDER BY id DESC
';

$result = $connection->query($sql);

echo '
<head></head>
<meta content=\'width=device-width, initial-scale=1\' name=\'viewport\'/>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<A HREF="index.php">Volver al grupo de la familia</A>
</BR>
</BR>
<FORM method="post" action="insert_cesar_liz.php">
<TEXTAREA type="text" name="comentario" class="textarea-comentario" id="textareaComentario"></TEXTAREA>
<BR>
<BR>
<INPUT type="submit" value="Enviar" class="botones" id="inputSubmit">
</FORM>
<TABLE>
	<TR>
		<TH>
			id
		</TH>
		<TH>
			fecha
		</TH>
		<TH>
			nombre
		</TH>
		<TH>
			comentario
		</TH>
	</TR>
';
while( $row = $result->fetch_assoc()){

echo '

	<TR>
		<TD>' . $row['id'] . '</TD>
		<TD>' . $row['fecha'] . '</TD>
		<TD>' . $row['nombre'] . '</TD>
		<TD>' . $row['comentario'] . '</TD>
	</TR>
';

}
echo '
</TABLE>
';

?>