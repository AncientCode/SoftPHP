<?php
class curl {
	protected $ch;

	function __construct($addr = NULL) {
		if (!is_null($addr)) {
			$this->ch = curl_init($addr);
		} else {
			$this->ch = curl_init();
		}
	}

	function setopt($option, $value) {
		return curl_setopt($this->ch, $option, $value);
	}

	function copy() {
		return curl_copy_handle($this->ch);
	}

	function errno() {
		return curl_errno($this->ch);
	}

	function error() {
		return curl_error($this->ch);
	}

	function exec() {
		return curl_exec($this->ch);
	}

	function getinfo($opt = 0) {
		return curl_getinfo($this->ch, $opt);
	}

	function setopt_array($options) {
		return curl_setopt_array($this->ch, $options);
	}
	
	function close() {
		return curl_close($this->ch);
	}
	
	function __destruct() {
		return $this->close();
	}
}