<?php 
    session_start();
    session_unset(); // To desactivate session
    session_destroy(); // To destroy session
    setcookie('log', '', time()-1,"/", null, false, true); //destroy cookies 
    //time()-1, we can put what we want. We just need a negative number to reset the cookie.
    header('location: ../spaceMember/index.php');
    exit();

?>