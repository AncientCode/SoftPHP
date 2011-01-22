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
 * This file is used to load the whole framework, please include this
 * file in your application's config file.
 * 
 * Load libraries like this:
 * soft_load('cat/lib');
 **********************************************************************/

// Get the installation directory
$softphp_dir = dirname(__FILE__);

// Get file extension because library can be bcompiled to .phb files
$temp = explode('/', __FILE__); // Get file name
$temp1 = explode('.', $temp[count($temp)-1]); // Get extension
$softphp_ext = $temp1[1]; // Set the extension in variable
$temp = $temp1 = NULL; // Clean up the tempory variables to save memory

/**
 * Library loading function
 * @param string $lib in catagory/lib form, without .php 
 */
function soft_load($lib) {
	require_once $softphp_dir . '/' . $lib . '.' . $softphp_ext;
}