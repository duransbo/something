<?php

	/* REQUIRE */
	require_once(dirname(__DIR__).'/libs/requirer.php');
	inc('users','model');
	/* !REQUIRE */



	/* CLASS */
	class SignController {

		public function validate($prmMail, $prmPass, $prmPassConfirm) {

			$userModel = new UsersModel();

			if (empty($prmMail) || empty($prmPass) || empty($prmPassConfirm)) {
				echo '1';
			} else {
				if ($userModel->exist($prmMail)) {
					echo '2';
				} else {
					if ($prmPass != $prmPassConfirm) {
						echo '3';
					} else {
						$userModel->add($prmMail, $prmPass);
						echo '4';
					}
				}
			}

		}

	}
	/* !CLASS */



	/* CODE */
	session_start();

	$signController = new SignController();
	$signController->validate($_POST['mail'], $_POST['pass'], $_POST['pass-confirm']);
	/* !CODE */

?>