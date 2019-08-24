<?php
include_once("../inc/inc.php");
$link = select_DB("miRTarBase");
include_once("./validate.php"); 


if ($login_state){
  $addTime = date("Y-m-d H:i:s");  // format  2009-09-28 16:25:35

  $sql_validate = "SELECT name FROM validation_method order by name";

  $validate = DBQuery($link,$sql_validate);

  $sql_tool = "SELECT name FROM target_tool order by name";
  
  $tool = DBQuery($link,$sql_tool);

  $sql_species = "SELECT organism, common_name, name, `order` FROM species order by `order`, common_name, name;";
  $species = DBQuery($link,$sql_species);
//
$ids = $_GET['ids'];
$id_array=explode("/",$ids);
$id = min($id_array);
$sql="select * from mirna_target_exp_final_yigang WHERE id=$id";
$result=DBQuery($link,$sql);

$tpl->assign("ids",$ids);
$tpl->assign("pmid",$result[0]["pmid"]);
$tpl->assign("species_mirna",$result[0]["species_mirna"]);
$tpl->assign("species_target",$result[0]["species_target"]);
$tpl->assign("oMirna",$result[0]["oMirna"]);
$tpl->assign("gene_symbol",$result[0]["gene_symbol"]);
$tpl->assign("cell_line",$result[0]["cell_line"]);
$tpl->assign("validation_method",$result[0]["validation_method"]);
$tpl->assign("tools",$result[0]["tool"]);
$tpl->assign("original_description",$result[0]["original_description"]);
$tpl->assign("note",$result[0]["note"]);
$tpl->assign("tf",$result[0]["tf"]);
$tpl->assign("disease",$result[0]["disease"]);
$tpl->assign("dis_relation",$result[0]["dis_relation"]);
$tpl->assign("mir_expression",$result[0]["mir_expression"]);
$tpl->assign("dis_desc",$result[0]["dis_desc"]);
  

  $tpl->assign("user", $_COOKIE['ID_my_site']);
  $tpl->assign("tool", $tool);
  $tpl->assign("validate", $validate);
  $tpl->assign("species", $species);

  $tpl->display("revise.html");
 }
close_DB($link);
?>
