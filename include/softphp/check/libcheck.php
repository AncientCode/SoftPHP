<?php
// class style
class check {
	//email checker
	function email($email){
		if (strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/", $email)) {
			return true;
		} else {
			return false;
		}
	}
	//URL Checker
	function url($url){
		preg_match_all("/^(http(s)|ftp|gopher):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/", $url, $matches);
		if ($matches) {
			return true;
		} else {
			return false;
		}
	}

	//CLI Checker
	function cli() {
		if(php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
			return true;
		} else {
			return false;
		}
	}

	//Get IP

	//IP Checker
	function ip($ipaddr) {
		preg_match_all('/^([0-9]+)\.([0-9]+)\.([0-9]+)\.([0-9]+)/', $ipaddr, $matches);
		$isip = true;

		if ($matches) {
			for ($i=0; $i<4; $i++) {
				if ($matches[$i] < 256) {
					$isip = false;
					break;
				}
			}
			if ($isip) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
// procedure style
function is_email($email) {
	return check::email($email);
}

function is_url($url) {
	return check::url($url);
}

function is_cli() {
	return check::cli();
}

function is_ip($ip) {
	return check::ip($url);
}

