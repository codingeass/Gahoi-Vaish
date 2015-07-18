<?php
	/**
 * MYSQL Cerendentials Include Page
 *
 * @author Amandeep Gupta <amandeeptheviper@gmail.com>
 */
        	$mysql=mysqli_connect("localhost","root","netbean","wordpress")
        				or die ("Cannot connect to database");
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
?>
