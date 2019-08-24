<!DOCTYPE html>
<html>
<head>
    <title>query</title>
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>

<table style='text-align:left;' border='1'>
        <tr><th>checked</th><th>revised</th><th>check_note</th><th>id</th><th>user</th><th>time</th><th>pmid</th><th>miRNA</th>
        <th>gene_symbol</th><th>cell_line</th><th>original_description</th><th>detail</th><th>revise</th></tr>
		
    <?php
    include_once("../inc/inc.php");
	$link = select_DB("miRTarBase");
	include_once("./validate.php");
	//group by
	$sql = "SELECT
            min(id) id,
            pmid,
            creator,
            mirna_name
        FROM
            mirna_target_exp_final_yigang
		WHERE 
			creator = '".$username."'
        GROUP BY
            pmid,
            creator,
            mirna_name
        HAVING
            count(*) >= 1";
	$id_start = array();
	$query = mysqli_query($link,$sql);
	if (mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_assoc($query)){
			array_push($id_start,$row["id"]);
		}
	}

	$group = array();
	foreach($id_start as $value){
		$group[$value]=array();
	}
	//
	$all_sql = array();
	$sql2 = "SELECT id, pmid, mirna_name from mirna_target_exp_final_yigang WHERE creator = '".$username."' ";
	$query2 = mysqli_query($link,$sql2);
	if (mysqli_num_rows($query2)>0){
		while($row2 = mysqli_fetch_assoc($query2)){
			$all_sql[$row2["id"]]=array("pmid"=>$row2["pmid"],"mirna_name"=>$row2["mirna_name"]);
		}
	}
	//
	
	
	foreach($id_start as $i){
		$i_pmid = $all_sql[$i]["pmid"];
		$i_mirna = $all_sql[$i]["mirna_name"];
		foreach($all_sql as $k =>$j){
			if($j["pmid"]==$i_pmid and $j["mirna_name"]==$i_mirna){
				array_push($group[$i],$k);
			}
		}
	}
	//up to now, we group all sqls into per insert.
	
	$sql3 = "SELECT * from mirna_target_exp_final_yigang WHERE creator = '".$username."' ";
	$result = DBquery($link,$sql3);
	
	foreach($id_start as $a){
		foreach($result as $b){
			if($a == $b['id']){
				$ids = implode("/",$group[$a]);
				$user = $b['creator'];
				$time = $b['add_date'];
				$pmid = $b['pmid'];
				$mirna = $b['mirna_name'];
				$gene_symbol = $b['gene_symbol'];
				$cell_line = $b['cell_line'];
				$original_description = $b['original_description'];
				$checked = $b['checked'];
				$revised = $b['reviced'];
				$check_note = $b['check_note'];
				echo "<tr><td>$checked</td><td>$revised</td><td>$check_note</td>
				<td>$ids</td><td>$user</td><td>$time</td><td>$pmid</td><td>$mirna</td>
				<td>$gene_symbol</td><td>$cell_line</td><td>$original_description</td>
				<td><a href='query_handle.php?id=$a'>check</a></td><td><a href='revise.php?ids=$ids'>revise</a></td></tr>";
                
			}
		}
	}
	mysqli_close($link);
	
    ?>
</table>

</body>
</html>







