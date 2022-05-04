<?php
	
	require('connect.php');


	if(isset($_POST["edit_data_modal"]))  
	{  	
		$s_id = $_POST["edit_data_modal"];

		$personal = $mysqli->query("SELECT * FROM personal WHERE s_id = '$s_id'") or die($mysqli->error);
		$per = $personal->fetch_assoc();

		$student = $mysqli->query("SELECT * FROM student WHERE s_id = '$s_id'") or die($mysqli->error);
		$stu = $student->fetch_assoc();

		$parent = $mysqli->query("SELECT * FROM parents where s_id = '$s_id'") or die($mysqli->error);
		$par = $parent->fetch_assoc();

		$credentials = $mysqli->query("SELECT * FROM credentials where s_id = '$s_id'") or die($mysqli->error);
		

		$data = [];

		// CONTINUE FROM HERE! GET DATA FROM ALL TABLES AND PUT THEM INTO DATA VARIABLE!
		$data += array('student_id' => $s_id);
		$data += array('name' => $per['name']);
		$data += array('gender' => $per['gender']);
		$data += array('dob' => $per['dob']);
		$data += array('age' => $per['age']);
		$data += array('aadhar' => $per['aadhar']);
		$data += array('grade' => $stu['grade']);
		$data += array('roll_number' => $stu['roll_no']);
		$data += array('country' => $per['country']);
		$data += array('religion' => $per['religion']);
		$data += array('address' => $per['address']);
		$data += array('lastschool' => $per['prevschool']);
		$data += array('mtongue' => $per['mothertongue']);
		$data += array('specialneeds' => $per['specialneeds']);
		// if specialneeds == 'no' else
		// $data += array('specialneedsfull' => $per['specialneedsfull']);
		$data += array('bloodtype' => $per['bloodgroup']);
		$data += array('siblings' => $per['siblings']);
		$data += array('photo_id' => $per['photo_id']);

		$data += array('doa' => $stu['doa']);

		if($par['gname'] != 'no')
		{
			$data += array('gaurdian' => 'yes');
		}
		else
		{
			$data += array('gaurdian' => 'no');
		}
		$data += array('gname' => $par['gname']);
		$data += array('gnum' => $par['gnum']);
		$data += array('gaddr' => $par['gaddr']);

		$data += array('fname' => $par['fname']);
		$data += array('fqual' => $par['fqual']);
		$data += array('focc' => $par['focc']);
		$data += array('fcomp' => $par['fcomp']);
		$data += array('fsal' => $par['fsal']);
		$data += array('fnum' => $par['fnum']);
		$data += array('fmail' => $par['fmail']);

		$data += array('mname' => $par['mname']);
		$data += array('mqual' => $par['mqual']);
		$data += array('mocc' => $par['mocc']);
		$data += array('mcomp' => $par['mcomp']);
		$data += array('msal' => $par['msal']);
		$data += array('mnum' => $par['mnum']);
		$data += array('mmail' => $par['mmail']);

		
		while($creds = $credentials->fetch_assoc())
		{
			if($creds['type'] == 'student')
			{
				$data += array('stu_uname' => $creds['uname']);
				$data += array('stu_pass' => $creds['pass']);
			}
			else if($creds['type'] == 'parent')
			{
				$data += array('par_uname' => $creds['uname']);
				$data += array('par_pass' => $creds['pass']);
			}
		}
		

		echo json_encode($data);  
	}

?>
