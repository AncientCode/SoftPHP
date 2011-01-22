<?php
/***********************************************************************
 * SoftPHP - Fast, simple, object-oriented, and powerful PHP Framework
 * Copyright (C) 2011 SoftX Technologies Inc.
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * This file include address checker for:
 * email
 * url
 * 
 * Checks if addresses is vaild, useful when submiting forms
 *
 **********************************************************************/

class soft_check_addr { // Address Checking class
	function email($email){
		if (strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/", $email)) {
			return true;
		} else {
			return false;
		}
	}
	
	function url($url){
		preg_match_all("/^(http(s)|ftp|gopher):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/", $url, $matches);
		if ($matches) {
			return true;
		} else {
			return false;
		}
	}
	
	function mailto($addr) {
		$value = explode('mailto:', $addr);
		if ($value[0]) return false;
		if (!$this->email($value[1])) return false;
		return true;
	}
}