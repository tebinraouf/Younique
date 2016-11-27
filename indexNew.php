<?php include("kkTTDBA32W.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Younique</title>
	<link rel="stylesheet" href="animate.min.css">
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	<script type="text/javascript">
	$('#animated-tebeen').addClass('animated bounceOutLeft');
	</script>
	
</head>
<?php 
	$query = "Select * from quote ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($connection,$query);
	if(!$result){
		die("There is an error!");
	} 
?>
<body>

	<div id="publicWrapper">

		<div id="publicHeader">
	
			<ul>
					<li id="share">
						Get Inspired
					</li>
					<div id="dropdownQuote">
					
						You are unique.
					
					</div>
        	</div>
        </li>
			</ul>
		</div>
		<div id="publicContent">
			<?php 
				while($quote = mysqli_fetch_array($result)){
					$a = $quote['content'];
					$Love = strstr($a, 'Love', false);
					$love = strstr($a, 'love', false);
				if ($Love || $love) {
					
					$showQuote = "<div id=\"love\" class=\"animated fadeInUp\">";
					$showQuote .= "<p class=\"quotationMark\">";
					$showQuote .= $quote['content'];
					$showQuote .= "</p>";
					$showQuote .= "<span id=\"author\">";
					$showQuote .= $quote['author'];
					$showQuote .= "</span></div>";
					echo $showQuote;
				}else{
					$showQuote = "<div id=\"otherQuotes\" class=\"animated zoomIn\">";
					$showQuote .= "<p class=\"quotationMark\">";
					$showQuote .= $quote['content'];
					$showQuote .= "</p>";
					$showQuote .= "<span id=\"author\">";
					$showQuote .= $quote['author'];
					$showQuote .= "</span></div>";
					echo $showQuote;
					}
				}
			 ?>
			 <?php mysqli_free_result($result); ?>
		</div>

		<div id="publicFooter">
		
			<?php echo "&copy;" . date("Y",time()) . " Younique" ?>
				
			
	
		</div> 

		</div> 

	
</body>
</html>
<?php mysqli_close($connection); ?>