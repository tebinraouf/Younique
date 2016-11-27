<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en-US">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Younique::Get Inspired</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
 $(document).ready(function() {
   //$("#ba").load("indexNew.php");
   //var refreshId = setInterval(function() {
      $("#ba").load('indexNew-working.php?randval='+ Math.random());
   }, 10000);
   $.ajaxSetup({ cache: false });
});
</script>
<noscript>Your browser does not support JavaScript!

<meta HTTP-EQUIV="REFRESH" content="0; url=http://www.tebeen.com/younique/javascript.html">

</noscript>
</head>
<body>
<div id="ba-title">
</div>
<div id="ba"></div>

</body>
</html>