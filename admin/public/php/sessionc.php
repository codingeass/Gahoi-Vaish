<?php session_start(); ?>
<?php
	if(!isset($_SESSION["email"]))
	{
			session_unset(); 
			session_destroy();
			echo "no";
	}
	else
	{
		echo "started";
	}
?>