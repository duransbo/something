<?php

	require_once(dirname(__DIR__).'/configs/config_paths.php');

	function inc($nameFile, $type = null) {

		switch ($type) {

			case 'config':
				$path = CONFIG.'config_'.$nameFile.'.php';
				break;

			case 'lib':
				$path = LIB.$nameFile.'.php';
				break;

			case 'model':
				$path = MODEL.'model_'.$nameFile.'.php';
				break;

			case 'controller':
				$path = CONTROLLER.'controller_'.$nameFile.'.php';
				break;

			case 'view':
				$path = VIEW.'view_'.$nameFile.'.php';
				break;

			case null:
				$path = $nameFile;
				break;

			default:
				die('Erro in inc "'.$nameFile.'" : No exist type |'.$type.'|');
				break;

		}

		require_once(PATH.$path);

	}

?>