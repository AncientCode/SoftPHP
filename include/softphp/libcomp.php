<?php
/*
 * Bcompile library that allows simple compilation of file
 * 
 * bool   bcomp($if, $of)
 * 
 * $if	PHP source file (*.php)
 * $of	PHP byte-code file (*.phb)
 * 
 */
function bcomp($if, $of) {
	if (!function_exists('bcompiler_write_file')) return false;
	$fh = fopen($of, "w");
	if (!bcompiler_write_header($fh)) return false;
	if (!bcompiler_write_file($fh, $if)) return false;
	if (!bcompiler_write_footer($fh)) return false;
	fclose($fh);
	return true;
}