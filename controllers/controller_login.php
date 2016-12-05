<?php

	/* REQUIRE */
	require_once(dirname(__DIR__).'/libs/requirer.php');
	inc('users','model');
	/* !REQUIRE */



	/* CLASS */
	class LoginController {

		public function logout() {
			unset($_SESSION['user_id']);
			if (!empty($_SESSION['user_id'])) {
				echo '1';
			} else {
				echo '2';
			}
		}

		public function login($prmMail, $prmPass) {

			$userModel = new UsersModel();

			if (empty($prmMail) || empty($prmPass)) {
				echo '1';
			} else {
				if (!$userModel->exist($prmMail)) {
					echo '2';
				} else {
					if ($prmPass != $userModel->getPass($prmMail)) {
						echo '3';
					} else {
						echo '4';
						$_SESSION['user_id'] = $userModel->getId($prmMail);
					}
				}
			}

		}

	}
	/* !CLASS */



	/* CODE */
	session_start();

	$loginController = new LoginController();
	if ($_POST['action'] == 'login') {
		$loginController->login($_POST['mail'], $_POST['pass']);
	} else if ($_POST['action'] == 'logout') {
		$loginController->logout();
	} else {
		echo 'q q ta aconteno';
	}
	/* !CODE */

?>