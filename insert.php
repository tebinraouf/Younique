<?php  session_start(); ?>
<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
} ?>
<?php $result=""; ?>
<?php include("header.php"); ?>
<?php include("kkTTDBA32W.php"); ?>

<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="manage_content.php">Manage Content</a></li> |
		<li><a href="log-out.php">Log Out</a></li>
	</ul>
</div>

<?php 
	
		
		

	if(isset($_POST['submit'])){
		$content = $_POST['quote'];
		$author = $_POST['author'];
		$content = mysqli_real_escape_string($connection,$content);
		$author = mysqli_real_escape_string($connection, $author);
		$query = "insert into quote (content, author) values ('{$content}','{$author}')";
		$result = mysqli_query($connection, $query);
	 if(!$result){
		 die("There is not result");
	 }
	}else{
		//$contentFromUser ="";
	}
?>

<?php 

?>

<div id="content">  
	<h1>Add a quote</h1>
	<form method="post" action="insert.php">
		<label>Quote</label><br />
		<textarea name="quote" rows="8" cols="40"></textarea><br />
		<label>Quote By:</label> <input type="text" name="author"  /> <br />
		<input name="submit" type="submit" value="Submit" />
	</form>
	
</div>
<?php if(isset($_POST['submit'])){
	//mysqli_free_result($result);
}



?>
			
<?php include("footer.php"); ?>