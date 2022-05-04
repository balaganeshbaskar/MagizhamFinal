<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

require('connect.php');

// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));

$t_fname = '';
$t_sname = '';
$t_num = '';
$t_grade = '';
$t_subject = '';
$t_id = '';
$t_pass = '';
$t_repass = '';


if (isset($_POST['btnsignup'])) 
{

  $t_fname = trim($_POST['t_fname']);
  $t_sname = trim($_POST['t_sname']);
  $t_num = trim($_POST['t_num']);

  $t_grade = $_POST['t_grade'];
  $t_subject = $_POST['t_subject'];
  $t_id = trim($_POST['t_id']);
  $t_pass = trim($_POST['t_pass']);
  $t_repass = trim($_POST['t_repass']);

  if ($t_pass == '' or $t_repass == '')
  {
    ?>    
      <script type="text/javascript">
        alert("Password is missing!");
        window.location = "signup.php";
      </script>
    <?php
  }
  else
  {

      $mysqli->query("SET AUTOCOMMIT=0");
			$mysqli->query("START TRANSACTION");

      // $mysqli->query("SELECT * from ");

      $teachercheck = $mysqli->query("INSERT INTO teachers (t_fname, t_sname, t_num, t_grade, t_subject, t_id) VALUES ('$t_fname', '$t_sname', '$t_num', '$t_grade', '$t_subject', '$t_id')");


      
      if($teachercheck)
      {
        $tquery = $mysqli->query("SELECT * FROM teachers where t_id = '$t_id'");
        $temp = $tquery->fetch_array();
        $s_id = $temp['s_id'];

        $new_s_id = "978" + substr($s_id, -1);

        $teachercheckagain = $mysqli->query("UPDATE teachers SET s_id = '$new_s_id' where t_id='$t_id'") or die($mysqli->error());

        if($teachercheckagain)
        {
          $hash = password_hash($t_repass, PASSWORD_DEFAULT);

          $credcheck = $mysqli->query("INSERT INTO credentials (uname, pass, type, s_id) VALUES ('$t_id', '$hash', 'teacher', '$new_s_id')");
        }
      }

      if($teachercheck and $teachercheckagain and $credcheck)
      {
        $mysqli->query("COMMIT");
        echo "<br> Commit!";

        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";

      }
      else
      {        
        $mysqli->query("ROLLBACK");
        echo "<br> Rollback!";

        $_SESSION['message'] = "Record has not been updated!";
        $_SESSION['msg_type'] = "danger";
      }

      header("location: signup.php");
    
  }   

} 
 
?>