<?php
if ($f == 'delete_occupation') {
	$db->where('id',$_POST['id']);
	$db->delete("wo_user_occupation");
	
	header("Content-type: application/json");
	echo json_encode(array('error'=>false,'message' => $success_icon . $wo['lang']['setting_updated']));
	exit();
}