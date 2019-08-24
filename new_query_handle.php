<?php
include_once("../inc/inc.php");
$link = select_DB("miRTarBase");
include_once("./validate.php");
$id = $_GET['id'];
$sql = "SELECT * from mirna_target_exp_final_yigang WHERE id = $id ";
$result = DBquery($link,$sql);
foreach($result as $b){
	$checked = $b["checked"];
	$revised = $b["reviced"];
	$check_note = $b["check_note"];
}

	


?>
<html>
<head>
<title>query_handle</title>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<h2>check point</h2>
<p>
if there are mistakes in this input, scrutator can check the "checked" and note the "check note"<br>
if students finish the revise, please mark the "revise"<br>
if you are student, don't click the checkbox<br>
</p>

<form action="query_update.php" method="get">
<input name="id" type="text" readonly="readonly" value= <?php echo $id?> />
<script>
        
        $(function(){
          $("input[type='checkbox'][value=<?php echo $checked?>]").attr("checked", "checked")
        });
      
</script>
	<div>
        <label for="checked">you have some problems</label>
        <input name="checked" id="checked" value="TRUE" type="checkbox">
	</div>	
	<div>
		<label for="revised"> revised </label> 
		<input id="revised" type="text" name="revised" value= <?php echo $revised?> >
	</div>
	<div>
        <label for="check_note"> NOTE</label>
        <textarea name="check_note" cols="60" rows="5" ><?php echo $check_note?></textarea>
    </div>
	<div>
    <input type="submit" value="Save">
    </div>

    </form>
    </body>
</html>
	
	