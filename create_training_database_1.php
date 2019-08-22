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
$sql = "CREATE TABLE miRTarBase_training
(
    ID int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    t datetime,
    user VARCHAR(50),
    PMID int(11) ,
    Species_miRNA varchar(30) ,
    Species_target varchar(30) ,
    miRNA varchar(20) ,
    official_miRNA_name varchar(20), 
    mature_miRNA_accession varchar(50),
    mature_miRNA_sequence_1 varchar(50),
    mature_miRNA_sequence_2 varchar(50),
    gene_symbol varchar(100) ,
    official_gene_symbol varchar(100),
    entrez_gene_id varchar(100),
    cell_line varchar(100) ,
    loc varchar(100) ,
    validated_method varchar(100) ,
    prediction_tools varchar(100) ,
    original_description text,
    note text,
    TF varchar(10),
    disease varchar(20),
    relationship_type varchar(100),
    expression_pattern_of_mirna varchar(100),
    description_of_mirna_disease_relationship text,
    primary key (ID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";
mysql_select_db('training',$conn);
$retval = mysql_query($sql,$conn);
if(!$retval)
{
    die('fail to create list'.mysql_error($conn));
}
echo "success\n";
mysql_close($conn);
?>