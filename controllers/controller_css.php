<?php

	header('Content-Type: text/css');

	/* REQUIRE */
	require_once(dirname(__DIR__).'/libs/requirer.php');
	inc('assets','config');
	/* !REQUIRE */



	/* CLASS */
	class CssController {

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
	$cssController = new CssController();
	$cssController->render($_GET['file']);
	/* !CODE */

?>