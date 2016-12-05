<?php

	$redirects = array('reloadless.esy.es');
	foreach($redirects as $redirect):
		if($_SERVER['SERVER_NAME'] == $redirect):
			header('location:http://www.'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
		endif;
	endforeach;

	$storage = '';
	$storages = array(
		'localhost' => 'gustavo/something/',
		'www.reloadless.esy.es' => '0/gustavo/something/'
	);
	foreach($storages as $host => $value):
		if($_SERVER['SERVER_NAME'] == $host):
			$storage = $value;
		endif;
	endforeach;

	define('HOST', $_SERVER['SERVER_NAME']);
	define('URL', 'http://'.HOST.'/'.$storage);
	define('URI',substr_replace($_SERVER['REQUEST_URI'],'',0,(strlen($storage) + 1)));

?>