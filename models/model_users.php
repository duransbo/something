<?php

	/* REQUIRE */
	inc('db','config');
	inc('old','lib');
	/* !REQUIRE */



	/* CLASS */
	class UsersModel {

		public function add($prmMail, $prmPass) {
			inserir('tab_users','user_mail, user_pass', '"'.$prmMail.'","'.$prmPass.'"');
		}

		public function delete() {}

		public function exist($prmMail) {
			if (recupera('tab_users','user_mail="'.$prmMail.'"','user_id') == 0) {
				return false;
			} else {
				return true;
			}
		}

		public function getId($prmMail) {
			return recupera('tab_users','user_mail="'.$prmMail.'"','user_id');
		}

		public function getPass($prmMail) {
			return recupera('tab_users','user_mail="'.$prmMail.'"','user_pass');
		}

		public function setPass() {}

	}
	/* !CLASS */



	/* CODE */
	conectaBanco();
	/* !CODE */

?>