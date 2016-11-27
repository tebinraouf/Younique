<?php session_start();  ?>
<?php include("header.php"); ?>
<?php include("kkTTDBA32W.php"); ?>

<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
} ?>
<?php

// function message(){
		
// 		if(isset($_SESSION['message'])){
// 			$output = "<div class=\"message\" > ";
// 			$output .= $_SESSION['message'];
// 			$output .= "</div>";
// 			$_SESSION['message'] = null;
// 			return $output;	 
// 		}
// 	}

?>

<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="manage_content.php">Manage Content</a></li> |
		<li><a href="log-out.php">Log Out</a></li>
	</ul>
	<a></a>
</div>

<?php 
		$query = "Select * from quote";
		$result = mysqli_query($connection, $query);
		if(!$result){
			die('Problem with query');
		}	 
?>


<div id="content">  
	<h1>All Quotes</h1>
	<h4><?php ///echo $_SESSION['message']; ?></h4>
	<ul>
	<?php 
		while($all_quotes = mysqli_fetch_assoc($result)){
			$res = '<li id="allQuoteList">';
			$res .= "<a class=\"editDelete\" href=\"editQuote.php?id={$all_quotes['id']}\">Edit </a>";
			$res .= "<a class=\"editDelete\" href=\"deleteQuote.php?id={$all_quotes['id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a>" . $all_quotes['content'];
			$res .= '</li>';
			echo $res;
		}
	 ?>
	 </ul>
	
</div>
<?php mysqli_free_result($result); ?>
			
<?php include("footer.php"); ?>