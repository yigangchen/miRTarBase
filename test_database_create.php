<?php
$con= mysql_connect("localhost","chen","00000000");
if (!$con){
    die('Could not connect: '.mysql_error());
}
#if (mysql_query("CREATE DATABASE students",$con)){
#    echo "Database created";
#}
#else{
#    echo "Error creating database: ".mysql_error();
#}
//start creating table
mysql_select_db("students",$con);
$sql1 = "CREATE TABLE s_name
(
    ID varchar(20) NOT NULL,
    sName varchar(20),
    PRIMARY KEY(ID)
)";
$sql2 = "CREATE TABLE s_score
(
    ID varchar(20) NOT NULL,
    sScore varchar(20),
    PRIMARY KEY(ID)
)";
mysql_query($sql1,$con);
mysql_query($sql2,$con);

//input data
mysql_query("INSERT IGNORE INTO s_name (ID, sName) VALUES('117010034','ChenYigang')");
mysql_query("INSERT IGNORE INTO s_name (ID, sName) VALUES('117010217','')");
mysql_query("INSERT IGNORE INTO s_name (ID, sName) VALUES('117030000','WangZhe')");
mysql_query("INSERT IGNORE INTO s_score (ID, sScore) VALUES('117010034','90')");
mysql_query("INSERT IGNORE INTO s_score (ID, sScore) VALUES('117010217','80')");
mysql_query("INSERT IGNORE INTO s_score (ID, sScore) VALUES('117030000','100')");




mysql_close($con);
?>