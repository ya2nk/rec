<?php 
if ($f == "get_school_data") {
	$db->where('user_id', $_POST['user_id']);
	$data = $db->get ("wo_user_school");
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}