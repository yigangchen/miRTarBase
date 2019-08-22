<html>
<body>
<?php
echo "<table border='1'>";
$n= $_POST["n"];
for ($i=1; $i<=9; $i++)
{
    echo "<tr>";
    for ($j=1; $j<=$n; $j++)
    {
        echo "<td><font color=red>$j</font> * $i = " . ($i * $j) . "   " . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>





