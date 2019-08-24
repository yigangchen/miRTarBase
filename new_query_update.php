<?php
include_once("../inc/inc.php");
$link = select_DB("miRTarBase");
include_once("./validate.php");
$checked = $_GET['checked'];
$revised = $_GET['revised'];
$check_note = $_GET['check_note'];
$id = $_GET['id'];
$sql = "UPDATE mirna_target_exp_final_yigang SET checked='$checked', reviced='$revised', check_note='$check_note' WHERE id=$id";
if(mysqli_query($link,$sql)){
	echo "<a href='query.php'>succeed,you can jump back";
}
?>