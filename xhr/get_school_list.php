<?php 
if ($f == "get_school_list") {
	$term = @$_GET['term'];
	$cols = Array ("school_name as label");
	$db->where ('school_name', "$term%",'like');
	$data = $db->get ("wo_school", null, $cols);
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}