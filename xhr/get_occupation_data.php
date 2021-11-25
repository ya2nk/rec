<?php 
if ($f == "get_occupation_data") {
	$db->where('user_id', $_POST['user_id']);
	$data = $db->get ("wo_user_occupation");
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}