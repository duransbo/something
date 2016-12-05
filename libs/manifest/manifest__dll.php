<?php
	header("Vary: Cookie");

	if(@$_COOKIE['offline'][$_GET['screen']][$_GET['zone']][$_GET['lang']][$_GET['page']] == 'remove'):
		header('HTTP/1.1 404 Not Found');
	elseif(@$_COOKIE['offline'][$_GET['screen']][$_GET['zone']][$_GET['lang']][$_GET['page']] == 'noupdate'):
    	header('HTTP/1.1 304 Not Modified');
  	else:
    	header('Content-type: text/cache-manifest');
		include('../../view/'.$_GET['screen'].'/'.$_GET['zone'].'/'.$_GET['lang'].'/'.$_GET['page'].'/'.$_GET['page'].'.appcache');
	endif;
?>