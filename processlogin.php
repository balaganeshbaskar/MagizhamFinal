<?php

require('session.php');
require('connect.php');

// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));


if (isset($_POST['btnlogin'])) 
{


  $uname = trim($_POST['uname']);
  $pass = trim($_POST['pass']);

  // $h_pass = sha1($pass);

  if ($pass == '')
  {
    ?>    
      <script type="text/javascript">
        alert("Password is missing!");
        window.location = "login.php";
      </script>
    <?php
  }
  else 
  {

    //create some sql statement        
    $result = $mysqli->query("SELECT * FROM credentials where uname='$uname'") or die($mysqli->error);   
    // $result = $mysqli->query("SELECT * FROM credentials where uname='$uname' and pass='$pass'") or die($mysqli->error);
    
    if ($result)
    {
      $data = $result->fetch_assoc();
      $passhash = $data['pass']; 

      // echo "<br>Hashed: ".$passhash;
      // echo "<br>password: ".$pass;

      if (!password_verify($pass, $passhash))
      {
        ?>    
          <script type="text/javascript">
            alert("Wrong Password retry!");
            window.location = "login.php";
          </script>
        <?php
      }
      else
      {
          $sss_id = $data['s_id'];

          if($data['type'] == 'teacher')
          {
              $for_name = $mysqli->query("SELECT * FROM teachers where s_id='$sss_id'") or die($mysqli->error);  
              $datass = $for_name->fetch_assoc();
    
              $t_fname = $datass['t_fname']; 
              $t_grade = $datass['t_grade']; 
              $t_subject = $datass['t_subject'];

              $_SESSION['T_GRADE'] = $t_grade; 
              $_SESSION['T_SUBJECT'] = $t_subject;
              $_SESSION['USER_NAME'] = $t_fname; 
          }
          else
          {
              $_SESSION['USER_NAME'] = $data['uname']; 
          }
          
          $_SESSION['MEMBER_ID']  = $data['s_id']; 
          $_SESSION['USER_TYPE'] = $data['type'];
          

          if( $data['type'] == 'teacher')
          {
              ?>    <script type="text/javascript">
                //then it will be redirected to index.php
                window.location = "adminpanel.php";
                  </script>
              <?php 
          }       

          else if( $data['type'] == 'student')
          {
              ?> 
              <script type="text/javascript">
                window.location = "studentprofile.php";
              </script> 
              <?php
          }  

          else if( $data['type'] == 'parent')
          {
              ?> 
              <script type="text/javascript">
                window.location = "studentprofile.php";
              </script> 
              <?php
          } 
      }

    } 
    else
    {
      ?>    <script type="text/javascript">
            alert("Username Not Registered! Contact Your administrator.");
            window.location = "login.php";
            </script>
          <?php
    }
    
  }       
} 

else
{

  if($_GET['from'] == 'teacher')
  {

    $_SESSION['TEACHER_ID']  = $_SESSION['MEMBER_ID'];
    $_SESSION['MEMBER_ID']  = $_GET['stu_id'];
    
    ?> 
    <script type="text/javascript">
      window.location = "studentprofile.php";
    </script> 
    <?php
  }

  if($_GET['from'] == 'student')
  {
    $_SESSION['MEMBER_ID']  = $_GET['stu_id'];
    
    ?> 
    <script type="text/javascript">
      window.location = "adminpanel.php";
    </script> 
    <?php
  }
    

}
 
?>