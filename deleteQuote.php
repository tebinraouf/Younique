<?php  session_start(); ?>
<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
} ?>
<?php include("kkTTDBA32W.php"); ?>
<?php function redirect($string){ header("Location:" .$string ); exit();} ?>
<?php 
	if(isset($_GET['id'])){
		$query = "DELETE from quote where id={$_GET['id']}";
		$result = mysqli_query($connection,$query);
		if($result){
			redirect("showall.php");
		}else{
			die("failed");
		}
	}
	


?>

<?php mysqli_close($connection); ?>