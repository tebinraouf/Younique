<?php function redirect($string){ header("Location:" .$string ); exit();}?>
<?php  session_start(); ?>
<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
}?>
<?php include("header.php");?>
<?php include("kkTTDBA32W.php");?>

<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="manage_content.php">Manage Content</a></li> |
		<li><a href="log-out.php">Log Out</a></li>
	</ul>
</div>

<?php 
	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($connection,$username);
		$password = mysqli_real_escape_string($connection, $password);
		$hash = password_hash($password, PASSWORD_DEFAULT);

		$query = "insert into admins (userName, passWord) values ('{$username}','{$hash}')";
		$result = mysqli_query($connection, $query);
	 if($result){
		 redirect("manage_admins.php");
	 }
	}else{
		//print_r(error_get_last());
	}?>



<div id="content">  
	<h1>Add Admin</h1>
	<div>
	<form method="POST" action="insertAdmin.php">

	<label>Username: </label> <input type="text" name="username" value="" />
	</br>
	<label>Password: </label> <input type="password" name="password" value=""/>
	<br/>
	<input type="submit" name="submit" value="Submit" />


</form>
</div>

</div>
		
<?php include("footer.php"); ?>