/* CODE */
var validateLogin = function (e) {

	var form = funcGetElement('.login-form');
	var validate = funcGetElement('.login-validate');
	var post = 'action=login&mail=' + funcGetElement('.login-inputs input[name="mail"]').value + '&pass=' + funcGetElement('.login-inputs input[name="pass"]').value;
	var objAjax = new ClassAjax();

	var loading = function () {
		form.classList.add('login-validating');
		validate.classList.remove('sucess', 'error');
		validate.innerHTML = '<p>...</p>';
	}

	var loaded = function () {
		form.classList.remove('login-validating');
		validate.classList.add('error');
		switch (objAjax.response()) {
			case '1':
				validate.innerHTML = '<p>Todos os campos devem ser preenchidos.</p>';
				break;

			case '2':
				validate.innerHTML = '<p>Não existe cadastro com esse email.</p>';
				break;

			case '3':
				validate.innerHTML = '<p>As informações de acesso não conferem.</p>';
				break;

			case '4':
				validate.classList.remove('error');
				validate.classList.add('sucess');
				validate.innerHTML = '<p>Sucesso.</p>';
				location.href = 'account';
				break;

			default:
				validate.innerHTML ='<p>Erro não esperado: ' + objAjax.response() + '</p>';
				break;

		}
	}

	e.preventDefault();
	objAjax.load('controllers/controller_login.php', post, loaded, loading);
}
/* !CODE */



/* EVENTS ADDED */
funcAddEvent('.login-form', 'submit', validateLogin);
/* !EVENTS ADDED */