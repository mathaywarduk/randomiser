<?php
	$defaultInputList = "e.g. red, green, blue, yellow";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$list = $_POST["inputList"];
		$chosen = file_get_contents("http://www.mathayward.com/randomiser/randomiser.php?l=" . urlencode($list));
	} elseif ($_GET['l'] != "") {
		$list = $_GET["l"];
		$chosen = file_get_contents("http://www.mathayward.com/randomiser/randomiser.php?l=" . urlencode($list));
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<title>The Randomiser by Mat Hayward</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="en-gb" />
	<meta name="Author" content="Mat Hayward" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/Archer.font.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <meta name="description" content="Supply a list, and get an item from the list at random" />
	<meta name="title" content="The Randomiser" />
	<meta name="keywords" content="random, generator, randomise" />
</head>
<!--[if lt IE 7]>
    <style type="text/css">
        body * { behavior: url(/iepngfix.htc);}
    </style>
<![endif]-->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-580668-17']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
<body>
	<div id="mainContainer">
		<div id="whatIsThis">
			<div class="content">
				<h1 class="cufon">What is this?</h1>
				<p>The Randomiser is a simple tool which can help you make those tough decisions.
				What should I have for lunch today? What should I call my first child? etc. Just
				enter the possibilities (separated by commas) and the Randomiser
				will choose for you!</p>
				<p>Give it a go!</p>
			</div>
			<div class="ads">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Randomiser -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:125px;height:125px"
				     data-ad-client="ca-pub-0635654529630253"
				     data-ad-slot="9298974107"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
		<h1><img src="images/title_randomiser.png" width="421" height="68" alt="the Randomiser" title="the Randomiser" /></h1>
		<form method="post" action="index.php">
			<div id="labelContainer">
				<label for="inputList" class="cufon">Enter your list</label>
				<span class="labelHelp">(separated by commas)</span>
				<div class="clearer"></div>
			</div>
			<div id="inputContainer">
				<input type="text" id="inputList" name="inputList" title="<?php echo $defaultInputList; ?>" value="<?php if ($list != "") { echo $list; } else { echo $defaultInputList; } ?>" />
				<input type="submit" value="Randomise!" id="submitButton" />
			</div>
		</form>
		<div id="output"<?php if ($chosen == "") { echo ' class="hidden"'; } ?>>
			<div id="working" class="cufon hidden"><img src="images/loader.gif" class="loadingImage" width="24" height="24" alt="..." title="..." />Randomising...</div>
			<div id="preResult" class="cufon <?php if ($chosen == "") { echo 'hidden'; } ?>">
				The randomiser has chosen:
			</div>
			<div id="result"><p><?php echo $chosen; ?></p></div>
		</div>
	</div>
	<div id="cantThink">
		<h2 class="cufon"><a href="javascript:void(0);">Not sure what to Randomise?</a></h2>
		<div class="suggestions">
			 <h3>Try these...</h3>
			 <ul>
			 	<li><a href="index.php?l=red, yellow, blue, green, orange, purple">Colours</a></li>
			 	<li><a href="index.php?l=new york, caribbean, maldives, china, australia, greece, spain, kenya">Holiday Destinations</a></li>
			 	<li><a href="index.php?l=jack, michael, joshua, daniel, alexander, oscar">Boys Names</a></li>
			 	<li><a href="index.php?l=emily, olivia, sophia, samantha, hannah, grace">Girls Names</a></li>
			 </ul>
		</div>
	</div>
	<div id="siteBy">the Randomiser by <a href="http://www.mathayward.com" target="_blank">Mat Hayward</a></div>
	<div id="followMe"><a href="http://www.twitter.com/mathaywarduk">Follow me</a></div>
</body>
</html>