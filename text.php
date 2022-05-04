<?php

    // echo "hello kids!";
    $password = "elaine1234";

    $hash = password_hash($password, PASSWORD_DEFAULT);
    // $sql = "INSERT INTO users (id, full_name, email, password, username, sign_up_date, activated) VALUES ('', '$full_name', '$email', '$hash', '$username', '$date', '1')";
    echo "<br>".$hash;


    if (!password_verify($password, $hash)) 
    {
        echo 'Invalid password.';
        // exit;
    }
    else
    {
        echo "<br>ok!";
    }

?>