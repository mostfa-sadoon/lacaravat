<?php
 if($page_title=="logout")
 {
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    header("location:product.php?page_title=".$redirect);
 }
?>