<?php

$connection = mysqli_connect('localhost', 'root', '', 'cesar');

if (!$connection) {

	echo "Error: Unable to connect to MySQL." . PHP_EOL;
 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 	exit;
}

$sql = 'SELECT * FROM cesar_juan';

$result = $connection->query($sql);

echo '
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