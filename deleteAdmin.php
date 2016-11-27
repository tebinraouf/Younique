<?php  session_start(); ?>
<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
} ?>
<?php include("kkTTDBA32W.php"); ?>
<?php function redirect($string){ header("Location:" .$string ); exit();} ?>
<?php 
	if(isset($_GET['id'])){
		$query = "DELETE from admins where id={$_GET['id']}";
		$result = mysqli_query($connection,$query);
		if($result){
			redirect("manage_admins.php");
		}else{
			die("failed 2012");
		}
	}
	


?>

<?php mysqli_close($connection); ?>