<?php ob_start();?>
<?php include("activeAction.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Area || Younique</title>
<link href="AdminStyle/loginstyle.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$("img[name=infoIcon], #info").hover(function() {
				$("#info").slideDown(500);
				//$("#info").animate({width:"400px"});
				$("#info").css("width","400px");				
			});
			$("#info").mouseleave(function(){
				$("#info").hide(1000);
				});			
		});
</script>
</head>
<body>
<div id="wrapperLogin">
	<header>
    	<img src="info.png" width="10" height="20" align="right" name="infoIcon">
        <div id="info">
        	
            <header>
            	<h2 class="head">Why this Website?</h2>
                <p class="head">This is a friendly display-screen website to give you the felexibility of showing the world how you think. Through meaningful sentences, express your feelings.</p>
            </header>
        
        </div>       
        <hgroup>
          <h2>Younique || Login Area</h2>
        </hgroup>
    </header>
    <section>
  		<form action="" method="POST">
        	<table align="center">
                  <tr>
                    <td>Username</td>
                    <td><span id="sprytextfield1">
                    <input type="text" placeholder="your username" name="username" value="<?php echo $username;  ?>" autofocus required />
                    <span class="textfieldRequiredMsg">*</span></span></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><span id="sprytextfield2">
                      <input type="password" name="password" required />
                    <span class="textfieldRequiredMsg">*</span></span></td>
                  </tr>
                  <tr><?php echo $_SESSION['loginError'];?></tr>
                  <tr><td colspan="2">
				  <?php   require_once('recaptchalib.php');
				  	$publickey = "6LfQwfsSAAAAAHXPEJhUAiH__Mpl8QxflSEol3nY";
					echo recaptcha_get_html($publickey); 
				  ?>
                  </td></tr>
                  <tr>
                    <td><input type="submit" value="Login" name="submit" /></td>
                    <td><button name="infoButton" id="retrievePassword">Retrieve Password</button></td>
                  </tr>
            </table>
      </form>
    </section>
	<footer>
    	<p>&#169; Younique <?php echo date('Y'); ?></p>
    </footer>
    </div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>