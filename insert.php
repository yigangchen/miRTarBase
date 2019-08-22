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

$user = "chen";
$location = $_GET['loc'];
settype($location,"string");


//loc,
//'$_GET[loc]',
$sql= "INSERT INTO mirtarbase_training (user,pmid,Species_miRNA,Species_target,miRNA,official_miRNA_name,mature_miRNA_accession,mature_miRNA_sequence_1,mature_miRNA_sequence_2,gene_symbol,official_gene_symbol,entrez_gene_id,cell_line,loc,validated_method,prediction_tools,original_description,note,TF,disease,relationship_type,expression_pattern_of_mirna,description_of_mirna_disease_relationship) 
VALUES('$user','$_GET[pmid]','$_GET[species_mirna]','$_GET[species_target]','$_GET[mirna]','$_GET[official_mirna_name]','$_GET[mature_mirna_accession]','$_GET[mature_mirna_sequence_1]','$_GET[mature_mirna_sequence_2]','$_GET[gene_symbol]','$_GET[official_gene_symbol]','$_GET[entrez_gene_id]','$_GET[cell_line]','$location','$_GET[validated_method]','$_GET[prediction_tools]','$_GET[original_description]','$_GET[note]','$_GET[tf]','$_GET[disease]','$_GET[relationship_type]','$_GET[expression_pattern_of_mirna]','$_GET[dis_desc]')";
mysql_select_db('training',$conn);
if (mysql_query($sql,$conn)){
    echo "success";
}else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}

mysql_close($conn);
?>