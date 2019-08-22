<?php
$namelist=array();
$scorelist=array();

$con = mysql_connect("localhost","chen","00000000");
if (!$con){
    die('Could not connect: ' . mysql_error());
}

mysql_select_db('students',$con);
//create name array
$result = mysql_query('SELECT * FROM s_name');

while($row = mysql_fetch_array($result)){
    $namelist[$row['ID']]=$row['sName'];
}
//create score array
$result = mysql_query('SELECT * FROM s_score');

while($row = mysql_fetch_array($result)){
    $scorelist[$row['ID']]=$row['sScore'];
}

//foreach($namelist as $x => $x_value){
//    echo $x. $x_value;
//}
?>

<form action='test_database_use.php' method='POST'>
    <select name='student_name'>
        <?php
        foreach($namelist as $x=>$x_value){
            echo "<option>$x_value";
        }
        ?>
    </select>
    <br>
    <input type="submit" value="OK">
</form>

<?php
$getname=$_POST["student_name"];

$flipnamelist= array_flip($namelist);
$id=$flipnamelist[$getname];
$score=$scorelist[$id];
echo $score;
?>


