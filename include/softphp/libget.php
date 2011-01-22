<?php
class get {
	function ip() {
		include_once dirname(__FILE__).'/libcheck.php';
		if (is_cli()) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://www.softx.tk/ip.php?nologo=yes");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$addr = curl_exec($ch);
			curl_close($ch);
			return $addr;
		} else {
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}
	}
}
function get_ip(){
	return get::ip();
}