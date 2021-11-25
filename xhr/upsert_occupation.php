<?php 
if ($f == "upsert_occupation") {
	//print_r($_POST); die;
	if (isset($_POST['user_id']) && is_numeric($_POST['user_id']) && $_POST['user_id'] > 0) {
		
		$data = array(
				'user_id' => $_POST['user_id'],
				'company_name' => @$_POST['company_name'],
				'company_position' => @$_POST['company_position'],
				'company_city' => @$_POST['company_city'],
				'still_work' => isset($_POST['still_work']) ? 1 : 0,
				'job_description' => @$_POST['job_description'],
				'from_month' => @$_POST['from_month'],
				'to_month' => @$_POST['to_month'],
				'from_year' => isset($_POST['from_year']) ? (int)$_POST['from_year'] : date('Y'),
				'to_year' => isset($_POST['to_year']) ? (int)$_POST['to_year'] : date('Y'),
				'id' => $_POST['id']
			);
		
		$id = $db->replace ('wo_user_occupation', $data);
		
		header("Content-type: application/json");
		echo json_encode(array('error'=>false,'message' => $success_icon . $wo['lang']['setting_updated']));
		exit();
	}
	
}