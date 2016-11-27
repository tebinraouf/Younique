<?php 

	define('DBSERVER', 'localhost');
	define('DBNAME', 'your_db_name');
	define('DBUSER', 'your_db_username');
	define('DBPASS', 'your_db_password');
	
	$connection = mysqli_connect(DBSERVER,DBUSER,DBPASS,DBNAME);
	
 
 	if(mysqli_connect_errno()){
		die("There is no connection!");
	}
	
?>