<?php

	/* CLASS */
	class BrowserController {

		public function set($browser) {
			$_SESSION['browser'] = $browser;
		}

	}
	/* !CLASS */

	session_start();

	if(!empty($_POST['browser'])):
		$browserController = new BrowserController();
		$browserController->set($_POST['browser']);
	endif;
?>