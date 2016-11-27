<?php include("kkTTDBA32W.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Younique</title>
  <link href="animate.min.css" rel="stylesheet">
  <link href="style.css" media="screen" rel="stylesheet" type="text/css">
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <script src="http://code.jquery.com/jquery-latest.min.js" type=
  "text/javascript"></script>
  <script src="script.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    setInterval(function(){
         $("#publicHeader").load(".animated");
    },3000);
    
    });
    $('#animated-tebeen').addClass('animated bounceOutLeft');
  </script>
</head>
<?php  
	$query = "Select * from quote";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("There is an error!");
    } 

        $myarray = array();
        while($all_quotes = mysqli_fetch_assoc($result)){
            $res = $all_quotes['content'];
            $myarray[] = $res;  
        }  
?>
<body>
  <div id="publicWrapper">
    <div id="publicHeader">
      <ul>
        <li id="share">Get Inspired</li>

        <li style="list-style: none; display: inline">
          <div id="dropdownQuote">
            You are unique.
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div id="publicContent">
  
   <?php 			$tag = "<p id='count'>";
                    $counter = rand(0,count($myarray));
                    //echo count($myarray)."My Array";
                    //echo $counter;
                	$tag .= "</p>";
                    //while($quote = mysqli_fetch_array($result)){
                        
                    //while($counter < count($myarray) ){
                        $a = $quote['content'];
                        $Love = strstr($a, 'Love', false);
                        $love = strstr($a, 'love', false);
                    if ($Love || $love) {
                        
                        $showQuote = "<div id=\"love\" class=\"animated fadeInUp\">";
                        $showQuote .= "<p class=\"quotationMark\">";
                        $showQuote .= $myarray[$counter];
                        $showQuote .= "</p>";
                        $showQuote .= "<span id=\"author\">";
                        $showQuote .= $quote['author'];
                        $showQuote .= "</span></div>";
                        echo $showQuote;
                        //echo $myarray[$counter];
                        //$counter++;
                    }else{
                        $showQuote = "<div id=\"otherQuotes\" class=\"animated zoomIn\">";
                        $showQuote .= "<p class=\"quotationMark\">";
                        $showQuote .= $myarray[$counter];
                        $showQuote .= "</p>";
                        $showQuote .= "<span id=\"author\">";
                        $showQuote .= $quote['author'];
                        $showQuote .= "</span></div>";
                        echo $showQuote;
                        //echo $myarray[$counter];
                        
                        }
                        $counter++;
                    //}
                 ?>
  
  
  
  
  
  <?php include("ranQuotes.php"); ?>
   </div>
<?php mysqli_free_result($result); ?>
  <div id="publicFooter">
    <?php echo "&copy;" . date("Y",time()) . " Younique" ?>
  </div><?php mysqli_close($connection); ?>
</body>
</html>