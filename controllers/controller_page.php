<?php

	define("PAGE_DEFAULT", 'login');

	/* CLASS */
	class PageController {

		public function ini() {
			if(empty($_GET['page'])):
				$_GET['page'] = PAGE_DEFAULT;
			else:
				if(!file_exists(PAGE.$_GET['page'].'/page_'.$_GET['page'].'.html')):
					$_GET['page'] = '404';
				endif;
			endif;
		}



		public function set($page) {
			$_GET['page'] = $page;
		}

	}
	/* !CLASS */

?>