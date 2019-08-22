<?php
$dbhost = 'localhost';
$dbuser = 'chen';
$dbpass = '00000000';
$conn = mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
    die('fail to connect');
}
echo 'success<br/>';
echo $_GET['id'];
$user = "chen";
$location = $_GET['loc'];
settype($location,"string");


$sql = "UPDATE mirtarbase_training
SET user= '$user',
    pmid = '$_GET[pmid]',
    Species_miRNA ='$_GET[species_mirna]',
    Species_target = '$_GET[species_target]',
    miRNA = '$_GET[mirna]',
    official_miRNA_name = '$_GET[official_mirna_name]',
    mature_miRNA_accession = '$_GET[mature_mirna_accession]',
    mature_miRNA_sequence_1 = '$_GET[mature_mirna_sequence_1]',
    mature_miRNA_sequence_2 = '$_GET[mature_mirna_sequence_2]',
    gene_symbol = '$_GET[gene_symbol]',
    official_gene_symbol = '$_GET[official_gene_symbol]',
    entrez_gene_id = '$_GET[entrez_gene_id]',
    cell_line = '$_GET[cell_line]',
    loc = '$location',
    validated_method = '$_GET[validated_method]',
    prediction_tools = '$_GET[prediction_tools]',
    original_description = '$_GET[original_description]',
    note = '$_GET[note]',
    disease = '$_GET[disease]',
    relationship_type = '$_GET[relationship_type]',
    expression_pattern_of_mirna = '$_GET[expression_pattern_of_mirna]',
    description_of_mirna_disease_relationship = '$_GET[dis_desc]'
WHERE ID = '$_GET[id]'";
mysql_select_db('training',$conn);
if (mysql_query($sql,$conn)){
    echo "success";
}else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}

mysql_close($conn);
?>