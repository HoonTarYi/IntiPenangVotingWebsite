<?php

/* Get the devices ip address */
 function get_client_ip() {
$ipaddress = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
else
    $ipaddress = 'UNKNOWN';
return $ipaddress;
} 
/* Store ip adress in $ip */
$ip = get_client_ip();

/* Connect geoplugin to analyze the ip adress an convert into country name */
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));

$city = $addrDetailsArr['geoplugin_city'];

$country = $addrDetailsArr['geoplugin_countryName'];

echo '<prev>';
/* This line code is to show all details of the ip adress
print_r ($addrDetailsArr);
*/

/* Fetch Error if the city or country is undefined like localhost */
if(!$city) {
	$city = 'Not Define';
}if(!$country) {
	$country='Not Define';
}
?>