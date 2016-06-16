<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

// 添加图片
if(! empty($_FILES)) {
	$keys = array_keys($_FILES);
	if(! empty($keys)) {
		$key = $keys[0];
	} else {
		$key = null;
	}
} else {
	// 删除图片时的参数
	$pathinfo = pathinfo($_SERVER['REQUEST_URI']);
	if(! empty($pathinfo['filename'])) {
		$dirname = preg_match('/^\?(.*)=.*$/', $pathinfo['filename'], $match);
		if(! empty($match[1]) && $match[1] != 'fields') {
			$key = $match[1];
		} else {
			$key = null;
		}
	}	else {
		$key = null;
	}
}
// echo '<pre>';print_r($_SERVER);
// echo '<pre>';print_r($_FILES);print_r(pathinfo($_SERVER['REQUEST_URI']));
$upload_handler = new UploadHandler($key);
