<?php
    session_start();
    
    if (isset($_SESSION['username']) == true) {
        session_destroy();
        header('Location:indexProyecto.php');
        die();
    }
?>