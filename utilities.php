<?php
////////////////////////////////////////////////////////////////////////////////
///// May 2019
///// Utilities.php
/////
/////
///// Sterling Lutes 
/////
///// Library of common functions
///// 
////////////////////////////////////////////////////////////////////////////////
function pageis($page){
    return strpos($_SERVER['SCRIPT_NAME'], $page) !== false;
}
function getIP(){
    if ($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){
		$ip = 'SET YOUR IP';
	} else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function serverTimeCorrected($datetime, $timezone){
	$userTimezone = new DateTimeZone($timezone);
	$serverTimezone = new DateTimeZone('America/New_York');
	$serverDateTime = new DateTime($datetime, $serverTimezone);
	$serverDateTime->setTimezone($userTimezone);
	return $serverDateTime;
}
function removeSpecialChars($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function getLocation(){
	return json_decode(file_get_contents("https://tools.keycdn.com/geo.json?host=" . getIP()));
}
function prettyAlert($alert, $pos = '50%'){
	echo "<h2 style='position: fixed; top: $pos; left: 50%; transform: translate(-50%, -50%);'>".$alert."</h2>";
}
function isUUID($value){
	$format = '/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i';
	return preg_match($format, $value);
}
function IFSET(&$value, $returnValue = ''){
	return isset($value) ? $value : $returnValue;
}
function DEBUG($val){
	echo '<pre>'; 
	print_r(var_dump($val));
	echo '</pre>';
}
?>
