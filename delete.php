<?php
$dbhost = 'localhost';
$dbuser = 'chen';
$dbpass = '00000000';
$conn = mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
    die('fail to connect');
}
$sql = "DELETE FROM mirtarbase_training
        where  ID = '$_GET[id]'";
mysql_select_db('training',$conn);
if (mysql_query($sql,$conn)){
    echo "success";
}else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}

mysql_close($conn);
?>