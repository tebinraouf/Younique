<?php ob_start();?>
<?php  session_start(); ?>
<?php function redirect($string){ header("Location: " . $string); exit(); }?>
<?php include("header.php"); ?>
<?php include("kkTTDBA32W.php"); ?>
<?php $username=""; ?>
<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="login.php">Login</a></li>
	</ul>
</div>




<?php 
	if(isset($_POST['submit'])){
		  $username = $_POST['username'];
		  $password = $_POST['password'];
		  $username = mysqli_real_escape_string($connection,$username);
		  $password = mysqli_real_escape_string($connection, $password);
		  //$hash = password_hash($password, PASSWORD_DEFAULT);
		  $query = "Select * from admins";
		  $result = mysqli_query($connection, $query);
		  while($properAdmin = mysqli_fetch_assoc($result)){
			  if($username===$properAdmin['userName'] && password_verify($password,$properAdmin['passWord'])){
				  $_SESSION['adminUserName'] = $properAdmin['userName'];
				  redirect("manage_content.php");
			  }else{
				  $_SESSION['loginError'] = "Fail! Please try again!";
			  }
		  }
	   if(!$result){
		   die("There is not results");
	   }
	}else{
		//print_r(error_get_last());
	}
?>



<div id="content">  
	<h1>Please login<?php if(isset($_POST['submit'])){echo ": ". $_SESSION['loginError'];}  ?></h1>
	<div>
	<form method="POST" action="login.php">

	<label>Username: </label> <input type="text" name="username" value="<?php echo $username;  ?>" />
	</br>
	<label>Password: </label> <input type="password" name="password" value=""/>
	<br/>
	<input type="submit" name="submit" value="Submit" />


</form>
</div>

</div>

<?php include("footer.php");?>
<?php ob_end_flush();?>