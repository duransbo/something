<?php

	define("TEMPLATE_OPTION", false);
	define("TEMPLATE_DEFAULT", 'clear');

	/* CLASS */
	class TemplateController {

		public function ini() {
			if(TEMPLATE_OPTION):
				if(empty($_GET['template'])):
					$_GET['template'] = TEMPLATE_DEFAULT;
				endif;
			else:
				$_GET['template'] = TEMPLATE_DEFAULT;
			endif;
		}



		public function set($template) {
			$_GET['template'] = $template;
		}

	}
	/* !CLASS */

?>