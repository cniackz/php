<?php

$connection = mysqli_connect('localhost', 'root', '', 'cesar');

if (!$connection) {

    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



$sql = '
SELECT
    comentario
FROM
    public_comments
ORDER BY
    id DESC
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
  word-break: break-all;
}
</style>

<script>
    function focusInput() {
        document.getElementById("input1").focus();
    }
</script>


<body onload="focusInput()">
<FORM method="post" action="insert_cesar_public.php">


    <input name="comentario" type="text" id="input1"/>
    <input type="submit" style="position: absolute; left: -9999px"/>

</FORM>
<TABLE>';
while( $row = $result->fetch_assoc()){

echo '
    <TR>
        <TD>' . $row['comentario'] . '</TD>
    </TR>
';

}
echo '
</TABLE>
';

?>