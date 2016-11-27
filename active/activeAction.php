<?php
function redirect($string){ header("Location: " . $string); exit();} ?>
<?php include("../kkTTDBA32W.php"); ?>
<?php
  require_once('recaptchalib.php');
  $privatekey = "6LfQwfsSAAAAAK6LLJg7om5S3yvUdC_zmApuPsKL";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
?>
<?php  
	session_start(); 
	$username="";
	if(isset($_POST['submit'])){
		  $username = $_POST['username'];
		  $password = $_POST['password'];
		  $username = mysqli_real_escape_string($connection,$username);
		  $password = mysqli_real_escape_string($connection,$password);
		  //$hash = password_hash($password, PASSWORD_DEFAULT);
		  $query = "Select * from admins";
		  $result = mysqli_query($connection, $query);
		  while($properAdmin = mysqli_fetch_assoc($result)){
			  if($username===$properAdmin['userName'] && password_verify($password,$properAdmin['passWord'])){
				  $_SESSION['adminUserName'] = $properAdmin['userName'];
				  if (!$resp->is_valid) {
						$_SESSION['loginError'] = "The reCAPTCHA wasn't entered correctly. Please try again.";	 
					  } else {
						redirect("../manage_content.php");
					}
			  }else{
				  $_SESSION['loginError'] = "Username/Password was incorrect. Please try again!";
			  }
		  }
	   if(!$result){
		   die("There is not results");
	   }
	}else{
		//print_r(error_get_last());
	}
?>