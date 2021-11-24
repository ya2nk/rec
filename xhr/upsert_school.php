<?php 
if ($f == "upsert_school") {
	//print_r($_POST); die;
	if (isset($_POST['user_id']) && is_numeric($_POST['user_id']) && $_POST['user_id'] > 0) {
		
		$data = array(
				'user_id' => $_POST['user_id'],
				'school_grade' => @$_POST['school_grade'],
				'school_name' => @$_POST['school_name'],
				'field_of_study' => @$_POST['field_of_study'],
				'school_completed' => isset($_POST['school_completed']) ? 1 : 0,
				'from_year' => isset($_POST['from_year']) ? (int)$_POST['from_year'] : date('Y'),
				'to_year' => isset($_POST['to_year']) ? (int)$_POST['to_year'] : date('Y'),
				'id' => $_POST['id']
			);
			
			
			
		if (isset($_FILES['file']['name'])) {
			$fileInfo = array(
				'file' => $_FILES["file"]["tmp_name"],
				'name' => $_FILES['file']['name'],
				'size' => $_FILES["file"]["size"],
				'type' => $_FILES["file"]["type"]
			);
			$media    = Wo_ShareFile($fileInfo);
			if (!empty($media)) {
				$mediaFilename    = $media['filename'];
				$data['school_attachment'] = $mediaFilename;
			}
		}
		
		
		
		
		
		$id = $db->replace ('wo_user_school', $data);
		
		header("Content-type: application/json");
		echo json_encode(array('error'=>false,'message' => $success_icon . $wo['lang']['setting_updated']));
		exit();
	}
	
}