<?php

$connection = mysqli_connect('localhost', 'root', '', 'cesar');

if (!$connection) {

	echo "Error: Unable to connect to MySQL." . PHP_EOL;
 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 	exit;
}

if($_COOKIE['usuario']!='jacl1960' OR $_COOKIE['usuario']!='cch1987'){
	echo "Lo sentimos, pero no tienes acceso a este grupo";
	exit;
}

$sql = 'SELECT * FROM cesar_juan ORDER BY id DESC';

$result = $connection->query($sql);

echo '
<FORM method="post" action="insert_cesar_juan.php">
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