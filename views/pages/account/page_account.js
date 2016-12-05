/* CODE */
var logout = function (e) {

	var html = funcGetElement('.account-logout');
	var post = 'action=logout';
	var objAjax = new ClassAjax();

	var loading = function () {
		html.innerHTML ='<p>...</p>';
	}

	var loaded = function () {
		switch (objAjax.response()) {
			case '1':
				html.innerHTML ='<p>Erro ao sair.</p>';
				break;

			case '2':
				html.innerHTML ='<p>Sucesso.</p>';
				location.href = 'login';
				break;

			default:
				html.innerHTML ='<p>Erro não esperado: ' + objAjax.response() + '</p>';
				break;

		}
	}

	e.preventDefault();
	objAjax.load('controllers/controller_login.php', post, loaded, loading);
}
/* !CODE */



/* EVENTS ADDED */
funcAddEvent('.account-links a[href=login]', 'click', logout);
/* !EVENTS ADDED */