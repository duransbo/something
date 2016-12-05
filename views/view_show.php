<?php

	/* CLASS */
	class ShowView {

		private $styles = [];
		private $scripts = [];



		public function inc($nameFile, $type) {

			switch ($type) {

				case 'template':
					$path = TEMPLATE;
					break;

				case 'page':
					$path = PAGE;
					break;

				case 'component':
					$path = COMPONENT;
					break;

				default:
					die('Erro in incView "'.$nameFile.'" : No exist type |'.$type.'|');
					break;

			}
			$this->addJs($nameFile, $type);

			return $path.$nameFile.'/'.$type.'_'.$nameFile.'.html';
		}



		public function addCss($nameFile, $type, $p = 0) {

			switch ($type) {

				case 'asset':
					$path = CSS.$nameFile.'.css';
					break;

				case 'template':
					$path = TEMPLATE;
					$p = 1;
					break;

				case 'page':
					$path = PAGE;
					$p = 2;
					break;

				case 'component':
					$path = COMPONENT;
					$p = 3;
					break;

				default:
					die('Erro in addCss "'.$nameFile.'" : No exist type |'.$type.'|');
					break;

			}
			if ($type != 'asset') {
				$path .= $nameFile.'/'.$type.'_'.$nameFile.'.css';
			}

			if (file_exists(PATH.$path)) {
				$this->styles['n'][] = $path;
				$this->styles['p'][] = $p;
			}

		}



		public function addJs($nameFile, $type, $p = 0) {

			switch ($type) {

				case 'asset':
					$path = JS.$nameFile.'.js';
					break;

				case 'template':
					$path = TEMPLATE;
					$p = 1;
					break;

				case 'page':
					$path = PAGE;
					$p = 2;
					break;

				case 'component':
					$path = COMPONENT;
					$p = 3;
					break;

				default:
					die('Erro in addJs "'.$nameFile.'" : No exist type |'.$type.'|');
					break;

			}
			if ($type != 'asset') {
				$path .= $nameFile.'/'.$type.'_'.$nameFile.'.js';
			}


			if (file_exists(PATH.$path)) {
				$this->scripts['n'][] = $path;
				$this->scripts['p'][] = $p;
			}

		}



		public function css() {
			asort($this->styles['p']);
			foreach ($this->styles['p'] as $n => $p) {
				echo "\t\t".'<link rel="stylesheet" href="controllers/controller_css.php?file='.$this->styles['n'][$n].'">'."\n";
			}
		}



		public function js() {
			asort($this->scripts['p']);
			foreach ($this->scripts['p'] as $n => $p) {
				echo "\t\t".'<script src="controllers/controller_js.php?file='.$this->scripts['n'][$n].'" async></script>'."\n";
			}
		}



		public function render($template, $page = null, $data = null) {
			$showView = new ShowView();
			require($showView->inc($template,'template'));
		}

	}
	/* !CLASS */

?>