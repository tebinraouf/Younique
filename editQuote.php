<?php ob_start();?>
<?php session_start();  ?>
<?php include("header.php"); ?>
<?php include("kkTTDBA32W.php"); ?>

<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
} ?>
<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="manage_content.php">Manage Content</a></li> |
		<li><a href="log-out.php">Log Out</a></li>
	</ul>
</div>

<?php 
	if(isset($_GET['id'])){
		$quoteID = $_GET['id'];
	}else{
		$quoteID = "";
	}
?>

<?php 
	function togetAll($qID){
		global $connection;
		$query = "SELECT * from quote WHERE id={$qID}";
		$result = mysqli_query($connection,$query);
		if(!$result){
			die("Problem 10: Not Query");
		}	
		if($resultOfQuote = mysqli_fetch_assoc($result)){
			return $resultOfQuote;
		}else{
			return NULL;
		}
	}
?>
<?php if($quoteID){
	$oneOne = togetAll($quoteID);
	
	}
?>


<?php function redirect($string){ header("Location:" .$string ); exit();} ?>

<?php 

	if(isset($_POST['submit'])){

		$content = $_POST['quote'];
		$author = $_POST['author'];
		$content = mysqli_real_escape_string($connection,$content);
		$author = mysqli_real_escape_string($connection,$author);

		$queryUpdate = "UPDATE quote SET content='{$content}', author='{$author}' WHERE id={$quoteID}";
		$resultQueryUpdate = mysqli_query($connection,$queryUpdate);
		if($resultQueryUpdate){
			redirect("showall.php");
			$_SESSION['message'] = "Quote is updated";
		}
	}
 ?>


<div id="content">  
	<h1>Edit Quote</h1>
	<form method="post" action="editQuote.php?id=<?php echo $oneOne["id"]?>">
		<label>Quote</label><br />
		<textarea name="quote" rows="8" cols="40"><?php echo $oneOne["content"];?></textarea><br />
		<label>Quote By:</label> <input type="text" name="author" value="<?php echo $oneOne["author"] ?>"  /> <br />
		<input name="submit" type="submit" value="Submit" />
	</form>
	
</div>







			

<?php if(isset($result)){ mysqli_free_result($result);} ?>
<?php if(isset($result)){ mysqli_free_result($resultQueryUpdate);} ?>
<?php include("footer.php"); ?>
<?php ob_end_flush();?>