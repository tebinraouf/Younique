<?php  session_start(); ?>
<?php if(!isset($_SESSION['adminUserName'])){
	header("Location:" ."index.php" ); exit();
} ?>
<?php include("header.php"); ?>
<?php include("kkTTDBA32W.php"); ?>

<div id="nav">
	<ul>
		<li><a href="index.php">Home</a></li> |
		<li><a href="manage_content.php">Manage Content</a></li> |
		<li><a href="manage_admins.php">Manage Admins</a></li> |
		<li><a href="log-out.php">Log Out</a></li>
	</ul>
</div>


<?php 
	$query = "Select * from admins";
	$result = mysqli_query($connection,$query);
	if(!$result){
		die("Problem 10, no results");
		}
 ?>

<div id="content">  
	<table id="adminTable">
		<th>User Names</th>
		<th class="actions">Actions</th>
	<?php 	
		while($admins = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>";
			echo $admins['userName'];
			echo "</td>";
			echo "<td class=\"actions\">";
			echo "<a href=\"editAdmin.php?id={$admins['id']}\">Edit</a> <a href=\"deleteAdmin.php?id={$admins['id']}\">Delete</a>";
			echo "</td>";
			echo "</tr>";
		}
	 ?>	
	</table>
	
	<div id="createAdmin">
		<a href="insertAdmin.php">Create Admin</a>
	</div>
	
</div>

<?php include("footer.php"); ?>