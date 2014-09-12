<?php

$list = rtrim($_GET['l'], ',');
$listArray = explode(',', $list);
$randomNumber = rand(0,(count($listArray) - 1));

$result = ltrim($listArray[$randomNumber], ' ');

//read xml file
$xmlFile = "randomised.xml";
//$handler = fopen($xmlFile, 'r');
$lines = file($xmlFile);
$i = 0;
foreach ($lines as $line_num => $line) {
	if ($i < 22) {
	    $fullData .= $line;
	}
	$i++;
}
//fclose($handler);


$stringData = "<lists>\n<item>\n<fulllist><![CDATA[" . $list  . "]]></fulllist>\n<result><![CDATA[" . $result  . "]]></result>\n</item>";
$fullData = str_replace("</lists>", "", str_replace("<lists>", $stringData, $fullData)) . "</lists>";

//append list to xml
$handler = fopen($xmlFile, 'w');
fwrite($handler, $fullData);
fclose($handler);


// output
echo stripslashes($result);


?>