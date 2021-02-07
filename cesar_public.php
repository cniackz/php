<?php

$connection = mysqli_connect('localhost', 'root', '', 'cesar');

if (!$connection) {

	echo "Error: Unable to connect to MySQL." . PHP_EOL;
 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 	exit;
}


// CONVERT_TZ((coments.fecha),'+00:00','-06:00') AS fecha,
$sql = '
SELECT
	comentario,
	nombre,
	id,
	fecha
FROM public_comments 
ORDER BY id DESC
';



$result = $connection->query($sql);
// https://stackoverflow.com/questions/18777103/how-to-resize-html-pages-on-mobile-phones/18777292
// le puse el meta tag pa que se vea bien en el cel sin necesidad de usar js
echo '
<head></head>
<meta content=\'width=device-width, initial-scale=1\' name=\'viewport\'/>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>


</BR>
</BR>
<FORM method="post" action="insert_cesar_public.php">
<label for="nombre">Nombre:</label><br>
<input type="text" id="nombre" name="nombre" value=""><br><br>
<label for="comentario">Comentario:</label><br>
<TEXTAREA type="text" name="comentario" class="textarea-comentario" id="textareaComentario"></TEXTAREA>
<BR>
<BR>
<INPUT type="submit" value="Enviar" class="botones" id="inputSubmit"><BR><BR>
<button onClick="window.location.reload();">Actualizar</button>
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