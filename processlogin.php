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
      $attempts_left = $data['attempts']; 

      if($attempts_left > 0) // If there are attempts left!!
      {

        $passhash = $data['pass']; 

        // echo "<br>Hashed: ".$passhash;
        // echo "<br>password: ".$pass;

        if (!password_verify($pass, $passhash))
        {

          $new_attempts_left = $attempts_left - 1;

          $mysqli->query("UPDATE credentials SET attempts='$new_attempts_left' where uname='$uname'") or die($mysqli->error());

          if($new_attempts_left == 3)
          {

            // $mysqli->query("UPDATE credentials SET attempts='$new_attempts_left' where uname='$uname'") or die($mysqli->error());

            ?>
              <script type="text/javascript">
                alert("Wrong Password retry! Only 3 attempts left!");
                window.location = "login.php";
              </script>
            <?php
          }
          else if($new_attempts_left == 2)
          {
            ?>
              <script type="text/javascript">
                alert("Wrong Password retry! Only 2 attempts left!");
                window.location = "login.php";
              </script>
            <?php
          }
          else if($new_attempts_left == 1)
          {
            ?>
              <script type="text/javascript">
                alert("Wrong Password retry! Only 1 attempt left!");
                window.location = "login.php";
              </script>
            <?php
          }
          else if($new_attempts_left == 0)
          {
            ?>
              <script type="text/javascript">
                alert("Wrong Password! No attempts left! Please Contact Admin and Reset your password!");
                window.location = "login.php";
              </script>
            <?php
          }
          else
          {
            $temp_attempts_left = 0;
            $mysqli->query("UPDATE credentials SET attempts='$temp_attempts_left' where uname='$uname'") or die($mysqli->error());
            ?>
              <script type="text/javascript">
                alert("Wrong Password! Please Contact Admin and Reset your password!");
                window.location = "login.php";
              </script>
            <?php
          }

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
            


            if( $data['type'] == 'admin')
            {
                ?>    <script type="text/javascript">
                  //then it will be redirected to index.php
                  window.location = "adminaccess.php";
                    </script>
                <?php 
            }  

            else if( $data['type'] == 'teacher')
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
      else // if no attempts left !
      {

        ?>
          <script type="text/javascript">
            alert("0 remaining Attempts left! Please Contact Admin and Reset your password !!");
            window.location = "login.php";
          </script>
        <?php
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