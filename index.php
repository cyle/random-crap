<?php

// show random image from given directory
// fill page with it... yeah, awesome
// if you want just gifs, append this URL with ?gif
// if you want a JSON doc with the image path, append this url with ?json

// EDIT THESE
$the_dir = '/path/to/random crap/';
$url_base = 'http://your-host.com/randomcrap/';
// OK DONE EDITING YAY

$files = scandir($the_dir);

if (isset($_GET['gif'])) {
	$image_extensions = array('gif');
} else {
	$image_extensions = array('jpg', 'jpeg', 'gif', 'png');
}
$images = array();
$extension = '';

foreach ($files as $file) {
	if ($file == '.' || $file == '..' || $file == '.DS_Store') {
		continue;
	}
	if (is_dir($the_dir . $file)) {
		continue;
	}
	$extension = strtolower(substr($file, strrpos($file, '.') + 1));
	if (!in_array($extension, $image_extensions)) {
		continue;
	}
	$images[] = $file;
}

//echo '<pre>'.print_r($images, true).'</pre>';

$file_path = $url_base.$images[mt_rand(0, count($images) - 1)];

if (isset($_GET['json'])) {
	header('Access-Control-Allow-Origin: *');
	echo json_encode(array('image' => $file_path));
	die();
}

?><!doctype html>
<html>
<head>
<title>random crap</title>
<style type="text/css">
* {
	padding: 0;
	margin: 0;
}
body {
	background-color: black;
	color: #ccc;
	font-family: monospace;
}
html, body, table, tr, td {
	width: 100%;
	height: 100%;
}
td {
	vertical-align: middle;
	text-align: center;
}
div#wut {
	position: absolute;
	top: 5px;
	left: 5px;
}
</style>
</head>
<body>
<div id="wut"><?php echo count($images); ?> images, lol</div>
<table>
<tr><td><img src="<?php echo $file_path; ?>" /></td></tr>
</table>
</body>
</html>
