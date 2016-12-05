<?php

	$hosts = array(
		'localhost' => array(
			'host' => 'localhost',
			'user' => 'root',
			'pass' => '',
			'name' => 'simple'
		),
		'www.reloadless.esy.es' => array(
			'host' => 'mysql.hostinger.com.br',
			'user' => 'u409132283_admin',
			'pass' => 'K9a5K8B3Aqt',
			'name' => 'u409132283_fatos'
		)
	);

	foreach($hosts as $host => $config):
		if($_SERVER['SERVER_NAME'] == $host):
			define("DBHOST", $config['host']);
			define("DBUSER", $config['user']);
			define("DBPASS", $config['pass']);
			define("DBNAME", $config['name']);
		endif;
	endforeach;

?>