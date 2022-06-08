<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

	require('connect.php');


	if(isset($_POST["edit_staff_details"]))  
	{  	
		$s_id = $_POST["edit_staff_details"];

		$teacher = $mysqli->query("SELECT * FROM teachers WHERE s_id = '$s_id'") or die($mysqli->error);
		$tea = $teacher->fetch_assoc();
		 

		$data = [];

		// // CONTINUE FROM HERE! GET DATA FROM ALL TABLES AND PUT THEM INTO DATA VARIABLE!
		$data += array('s_s_id' => $s_id);
		$data += array('t_fname' => $tea['t_fname']);
		$data += array('t_sname' => $tea['t_sname']);
		$data += array('t_grade' => $tea['t_grade']);
		$data += array('t_subject' => $tea['t_subject']);
		$data += array('t_id' => $tea['t_id']);

		echo json_encode($data);  
	}

	else if(isset($_POST["delete_staff_details"]))  
	{  	
		$data = [];

		$data += array('res' => "Done");

		$mysqli->query("SET AUTOCOMMIT=0");
  		$mysqli->query("START TRANSACTION");
		
		$s_id = $_POST["delete_staff_details"];
		$deleted_teachers = $mysqli->query("DELETE FROM teachers WHERE s_id = '$s_id'") or die($mysqli->error);

		$deleted_creds = $mysqli->query("DELETE FROM credentials WHERE s_id = '$s_id'") or die($mysqli->error);
		// $deleted_teachers = 1;
		// $deleted_creds = 1;

		if($deleted_teachers and $deleted_creds)
		{
			$mysqli->query("COMMIT");

			$_SESSION['message'] = "Record has been deleted!";
			$_SESSION['msg_type'] = "success";

		}
		else
		{        
			$mysqli->query("ROLLBACK");

			$_SESSION['message'] = "Record has not been deleted!";
			$_SESSION['msg_type'] = "danger";
		}

		echo json_encode($data);  
		// header("location: magizham/adminaccess.php"); 
	}















?>
