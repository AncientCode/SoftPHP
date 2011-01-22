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
 * Usage:
 * $test = new soft_check_addr();
 * No argument ever required to create this class
 * 
 * You may also do this:
 * soft_check_addr::email($email);
 **********************************************************************/

class soft_check_addr { // Address Checking class
	/**
	 * Email Checking Function
	 * @param string $email
	 **/
	function email($email) {
		// A vaild email need to have at least 6 characters and look like this *@*.*
		if (strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/", $email)) {
			return true; // It's an email
		} else {
			return false; // It's not
		}
	}
	
	/**
	 * URL checking Function
	 * For http, https, ftp, ftps, gopher
	 * @param string $url
	 */
	function url($url) {
		preg_match_all("/^(http(s)|ftp(s)|gopher):\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/", $url, $matches);
		if ($matches[1]) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Mailto Address checking function, not normally needed.
	 * @param string $addr
	 */
	function mailto($addr) {
		$value = explode('mailto:', $addr);
		if ($value[0]) return false;
		if (!$this->email($value[1])) return false;
		return true;
	}
	
	/**
	 * Link checking function
	 * What I mean link is an address that is mailto: or protocol://something 
	 * @param string $addr
	 */
	function link($addr) {
		preg_match_all("/^(.*):\/\/(.*)$/", $addr, $matches);
		if ($matches[1]) {
			return true;
		} else {
			if ($this->mailto($addr)) return true;
		}
		return false;
	}
}