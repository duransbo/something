<?php

	header('Content-Type: text/javascript');

	/* REQUIRE */
	require_once(dirname(__DIR__).'/libs/requirer.php');
	inc('assets','config');
	/* !REQUIRE */



	/* CLASS */
	class JsController {

		public function render($nameFile) {

			if (file_exists(PATH.$nameFile)) {
				require(PATH.$nameFile);
			} else {
				echo '//404';
			}

		}

	}
	/* !CLASS */



	/* CODE */
	$jsController = new JsController();
	$jsController->render($_GET['file']);
	/* !CODE */

?>