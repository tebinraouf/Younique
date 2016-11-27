<?php ob_start();?>
<?php  session_start(); ?>
<?php include("header.php"); ?>
<?php include("kkTTDBA32W.php"); ?>

<?php if(!isset($_SESSION['adminUserName'])){
	header("Location: index.php"); exit();
}?>

<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="manage_content.php">Manage Content</a></li> |
		<li><a href="manage_admins.php">Manage Admins</a></li> |
		<li><a href="log-out.php">Log Out</a></li>
	</ul>
</div>


<div id="content"> 
	<h1>Admin Area</h1>
	<h4>Welcome, <?php echo $_SESSION['adminUserName'];  ?></h4> 
	<h1><a href="insert.php">Add a quote</a></h1>
	<h1><a href="showall.php">Show all quotes</a></h1>
	
	
	
</div>
			
<?php include("footer.php"); ?>
<?php ob_end_flush();?>