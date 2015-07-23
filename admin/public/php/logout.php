<?php session_start(); ?>
<?php
session_unset(); 

// destroy the session 
session_destroy();
echo "<script>window.location.assign('../../index.html');</script>";
?>