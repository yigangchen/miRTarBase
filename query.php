<!DOCTYPE html>
<html>
<head>
    <title>query</title>
</head>
<body>
<table style='text-align:left;' border='1'>
        <tr><th>id</th><th>user</th><th>time</th><th>pmid</th><th>Species_miRNA</th><th>Species_target</th><th>miRNA</th><th>official_miRNA_name</th><th>mature_miRNA_accession</th>
        <th>mature_miRNA_sequence_1</th><th>mature_miRNA_sequence_2</th><th>gene_symbol</th><th>official_gene_symbol</th><th>entrez_gene_id</th><th>cell_line</th>
        <th>location</th><th>validated_method</th><th>prediction_tools</th><th>original_description</th><th>note</th><th>tf</th><th>disease</th><th>relationship_type</th><th>expression_pattern_of_mirna</th><th>description_of_mirna_disease_relationship</th><th>delete</th></tr>
    <?php
    $con = mysql_connect("localhost","chen","00000000");
    if(!$con){
        die(mysql_error());
    }
    mysql_select_db("training",$con);
        //查询数据表中的数据
        $sql = "select * from mirtarbase_training WHERE user = '$_POST[user]'";
        $result = mysql_query($sql);
        $datarow = mysql_num_rows($result); 
            //循环遍历出数据表中的数据
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysql_fetch_assoc($result);
                $id = $sql_arr['ID'];
                $user = $sql_arr['user'];
                $time = $sql_arr['t'];
                $pmid = $sql_arr['PMID'];
                $Species_miRNA = $sql_arr['Species_miRNA'];
                $Species_target = $sql_arr['Species_target'];
                $miRNA = $sql_arr['miRNA'];
                $official_miRNA_name = $sql_arr['official_miRNA_name'];
                $mature_miRNA_accession = $sql_arr['mature_miRNA_accession'];
                $mature_miRNA_sequence_1 = $sql_arr['mature_miRNA_sequence_1'];
                $mature_miRNA_sequence_2 = $sql_arr['mature_miRNA_sequence_2'];
                $gene_symbol = $sql_arr['gene_symbol'];
                $official_gene_symbol = $sql_arr['official_gene_symbol'];
                $entrez_gene_id = $sql_arr['entrez_gene_id'];
                $cell_line = $sql_arr['cell_line'];
                $loc = $sql_arr['loc'];
                $validated_method = $sql_arr["validated_method"];
                $prediction_tools = $sql_arr['prediction_tools'];
                $original_description = $sql_arr['original_description'];
                $note = $sql_arr['note'];
                $tf = $sql_arr['TF'];
                $disease = $sql_arr['disease'];
                $relationship_type = $sql_arr['relationship_type'];
                $expression_pattern_of_mirna = $sql_arr['expression_pattern_of_mirna'];
                $description_of_mirna_disease_relationship = $sql_arr['description_of_mirna_disease_relationship'];
                echo "<tr><td><a href= 'modify.php?id=$id'>$id</a></td><td>$user</td><td>$time</td><td>$pmid</td><td>$Species_miRNA</td><td>$Species_target</td><td>$miRNA</td><td>$official_miRNA_name</td>
                <td>$mature_miRNA_accession</td><td>$mature_miRNA_sequence_1</td><td>$mature_miRNA_sequence_2</td><td>$gene_symbol</td><td>$official_gene_symbol</td><td>$entrez_gene_id</td>
                <td>$cell_line</td><td>$loc</td><td>$validated_method</td><td>$prediction_tools</td><td>$original_description</td><td>$note</td><td>$tf</td><td>$disease</td><td>$relationship_type</td>
                <td>$expression_pattern_of_mirna</td><td>$description_of_mirna_disease_relationship</td><td><a href= 'delete.php?id=$id'>delete</a></td></tr>";
            }
    mysql_close($con);
    ?>
</table>

<form action="modify.php" method="post">
    your id is: <input type="text" name="id"><br>
    <input type="submit">
</form>
        
</body>
</html>