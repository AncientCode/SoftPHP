<?php
class soft_html_header {
	/**
	 * HTML Doctype and and head tag
	 * @param string $lang in lower case
	 */
	function html($lang = 'en') {
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//'.strtoupper($lang).'"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang?>" lang="<?php echo $lang?>">
<head>';
	}
	
	/**
	 * Content-Type meta tag
	 * @param string $charset code like ISO-8859-1 and utf8
	 * @param string $type MIME Type
	 */
	function content_type($charset = 'utf8', $type = 'text/html') {
?>
	<meta http-equiv="Content-Type" content="<?php echo $type?>; charset=<?php echo $charset?>" />
<?php
	}
	
	/**
	 * Page Title Tag 
	 * @param String $title
	 */
	function title($title) {
		echo "\t<title>$title</title>";
	}
	
	/**
	 * Meta Description
	 * @param string $text comma seperated list is quotes
	 */
	function description($text) {
		?>	<meta name="Description" content="<?php echo $text;?>" />";<?php
	}
	
	/**
	 * Meta Description
	 * @param string $text comma seperated list is quotes
	 */
	function keyword($text) {
		?>	<meta name="Keywords" content="<?php echo $text;?>" />";<?php
	}
	
	/**
	 * CSS Import
	 * @param url $css Path to css file
	 */
	function css($css) {
		?>	<link rel="stylesheet" type="text/css" href="<?php echo $css?>" /><?php
	}
	
	/**
	 * JavaScript Import
	 * @param url $js Path to JavaScript File
	 */
	function js($js) {
		?>	<script src="<?php echo $js?>" type="text/javascript"></script><?php
	}
	
	/**
	 * HTML link tag,
	 * see http://www.w3schools.com/tags/tag_link.asp for detail
	 * @param string $rel Relationship with document
	 * @param string $type MIME Type
	 * @param string $href Location
	 */
	function link_tag($rel, $type, $href) {
		?>	<link rel="<?php echo $rel?>" type="<?php echo $type?>" href="<?php echo $href?>" /><?php 
	}
	
	/**
	 * HTML meta name tag,
	 * see http://www.w3schools.com/tags/tag_meta.asp for detail
	 * @param string $name
	 * @param string $content
	 */
	function meta_tag($name, $content) {
		?>	 <meta name="<?php echo $name?>" content="<?php echo $content?>" /><?php
	}
	
	/**
	 * HTML meta http-equiv tag,
	 * see http://www.w3schools.com/tags/tag_meta.asp for detail
	 * @param string $name
	 * @param string $content
	 */
	function equiv_tag($name, $content) {
		?>	 <meta http-equiv="<?php echo $name?>" content="<?php echo $content?>" /><?php
	}
	
	/**
	 * Print </head> and <body>
	 */
	function end() {
		?>
</head>
</body><?php
	}
	
	/**
	 * Put them all together
	 * @param string $title
	 * @param string $charset
	 * @param string $keyword
	 * @param string $description
	 * @param array $css array('css1', 'css2', ...);
	 * @param array $js array('js1', 'js2', ...);
	 * @param string $type
	 * @param array $link array('rel' => 'type|href', ...);
	 * @param array $meta array('name' => 'content', ...);
	 * @param array $equiv array('name' => 'content', ...);
	 */
	function all($title, $body = true, $charset = 'utf8', $keyword = '', $description = '', $css = array(), $js = array(), $lang = 'en', $type = 'text/html', $link = array(), $meta = array(), $equiv = array()) {
		$this->html($lang);
		$this->content_type($charset, $type);
		$this->title($title);
		if ($description) $this->description($description);
		if ($keywor) $this->keyword($keyword);
		if ($css) foreach ($css as $arr) $this->css($arr);
		if ($js) foreach ($js as $arr) $this->js($arr);
		if ($link) foreach ($link as $k => $v) {
			list($i, $j) = explode('|', $v);
			$this->link_tag($k, $i, $j);
		}
		if ($meta) foreach ($link as $k => $v) $this->meta_tag($k, $v);
		if ($equiv) foreach ($link as $k => $v) $this->equiv_tag($k, $v);
		if ($body) $this->end();
	}
}