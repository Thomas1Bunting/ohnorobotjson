<?php
	$files = htmlspecialchars_decode(file_get_contents('http://www.ohnorobot.com/index.pl?'.$_SERVER['QUERY_STRING']), ENT_QUOTES);
	$files = explode("<li>", $files);
	unset($files[0]);
	foreach($files as $file){
		echo json_encode(array(/* 'id'   => substr($file, (strpos($file, "comic=")+6), strpos($file, '">') - (strpos($file,  "comic=")+6)),*/
					'url'  => substr($file, (strpos($file, 'href="')+6), strpos($file, '">') - (strpos($file, 'href="')+6)),
					'text' => strip_tags(substr($file, (strpos($file, "blockquote>")+11), strpos($file, '<div class="tinylink">') - (strpos($file, "blockquote>")+11))))) . "\n\n\n";
	}
?>
