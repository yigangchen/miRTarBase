
<?php
$getname=$_POST["student_name"];
include "test_database_use.php";
$flipnamelist= array_flip($namelist);
$id=$flipnamelist[$getname];
$score=$scorelist[$id];
echo $score;
?>