<?php

	define("MANIFEST_OPTION", false);



	/* REQUIRES */
	require_once(dirname(__DIR__).'/libs/requirer.php');
	inc('new','lib');
	inc('url','config');
	inc('assets','config');
	inc('language','controller');
	inc('template','controller');
	inc('page','controller');
	inc('show','view');
	/* !REQUIRES */



	/* CLASS */
	class ViewController {

		public function show() {

			session_start();
			//session_destroy();

			$languageController = new LanguageController();
			$templateController = new TemplateController();
			$pageController = new PageController();
			$showView = new ShowView();
			$languageController->ini();

			/* Caso o browser tenha sido verificado */
			if(!empty($_SESSION['browser'])):

				$templateController->ini();

				/* Caso o browser sejá ultrapassado */
				if($_SESSION['browser'] == 'close'):
					$pageController->set('close');

				/* Caso o browser sejá atualizado */
				elseif($_SESSION['browser'] == 'open'):

					$pageController->ini();

				/* Caso o browser não sejá verificado */
				else:
					die(utf8_decode('erro ao verificar |BROWSER|'));
				endif;

				if(MANIFEST_OPTION):
					if(isset($_COOKIE['offline'][$_GET['template']][$_GET['lang']][$_GET['page']])):
						$manifest = $_COOKIE['offline'][$_GET['template']][$_GET['lang']][$_GET['page']];
					endif;
				endif;

				$showView->render($_GET['template'], $_GET['page']);

			/* Caso o browser não tenha sido verificado */
			else:
				$showView->render('ini');
			endif;

		}

	}
	/* !CLASS */

?>