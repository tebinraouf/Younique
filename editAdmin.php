<?php ob_start();?>
<?php  session_start(); ?>
<?php if(!isset($_SESSION['adminUserName'])){
	header("Location: index.php" ); exit();
} ?>
<?php include("kkTTDBA32W.php"); ?>
<?php function redirect($string){ header("Location: {$string}"); exit();} ?>
<?php include("header.php"); ?>

<?php 
$outcome = "<div id=\"nav\">";
$outcome .=	"<ul>";
$outcome .=		"<li><a href=\"index.php\">Home</a></li> | ";
$outcome .=		" <li><a href=\"manage_content.php\">Manage Content</a></li> | ";
$outcome .=		" <li><a href=\"manage_admins.php\">Manage Admins</a></li> | ";
$outcome .=		" <li><a href=\"log-out.php\">Log Out</a></li> ";
$outcome .=	"</ul>"; 
$outcome .= "</div>";
$outcome .= "<div id=\"content\">"; 
echo $outcome; 
?>
<?php 
	if(isset($_GET['id'])){
		$ida = $_GET['id'];
	}
 ?>


 <?php 
	function togetAllAdmins($qID){
		global $connection;
		$query = "SELECT * from admins WHERE id={$qID}";
		$result = mysqli_query($connection,$query);
		if(!$result){
			die("Problem 10: Not Query");
		}	
		if($resultOfAdmin = mysqli_fetch_assoc($result)){
			return $resultOfAdmin;
		}else{
			return NULL;
		}
	}
?>


<?php 	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($connection,$username);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$updateAdminQuery = "UPDATE admins SET userName='{$username}', passWord='{$hash}' WHERE id={$ida}";
		$resultOfAdminQuery = mysqli_query($connection,$updateAdminQuery);
		if($resultOfAdminQuery){
			redirect("manage_admins.php");
		}
	}
 ?>

<?php 	
		if($ida){
			$allAdmins = togetAllAdmins($ida); 
		}
?>

<div>
<form method="POST" action="editAdmin.php?id=<?php echo $allAdmins['id']?>">

	<label>Username: </label> <input type="text" name="username" value="<?php echo $allAdmins['userName']; ?>" />
	</br>
	<label>Password: </label> <input type="password" name="password" value=""/>
	<br/>
	<input type="submit" name="submit" value="Submit" />


</form>
</div>

</div>
<?php if(isset($_POST['submit'])){
	mysqli_free_result($resultOfAdminQuery);
} ?>
<?php include("footer.php"); ?>
<?php ob_end_flush();?>