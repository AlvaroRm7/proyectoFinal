<?php

    require 'configP.php';
    $username = '@'. mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $nombres = mysqli_real_escape_string($con, $_POST['nombres']);

    $password = sha1($password);

    $query="SELECT 
                nombres,username,password
            FROM 
                Usuarios u
            WHERE
                u.username like '".$username."' 
            AND u.password like '".$password."'
            ";

    echo $query;
    
    $resp = mysqli_query($con, $query);
    
    if(mysqli_num_rows($resp) == 1){
        
        session_start();
        
        while($row = mysqli_fetch_array($resp)){
            $_SESSION['username'] = $row['username'];
//            $_SESSION['nombres']    = $row['nombres'];
        }
                
        
    }else{
        console.log("No agarra esta chingadera");
        echo "Error";
    }
    
?>