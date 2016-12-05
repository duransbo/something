<?php

	define("LANG_OPTION", false);
	define("LANG_DEFAULT", "pt-br");

	/* CLASS */
	class LanguageController {

		public function ini() {
			if(LANG_OPTION):
				if(empty($_GET['lang'])):
					$_GET['lang'] = LANG_DEFAULT;
				endif;
			else:
				$_GET['lang'] = LANG_DEFAULT;
			endif;
		}



		public function set($lang) {
			$_GET['lang'] = $lang;
		}

	}
	/* !CLASS */

?>