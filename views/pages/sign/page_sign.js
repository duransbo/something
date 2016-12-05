/* CODE */
var validateSign = function (e) {

	var form = funcGetElement('.sign-form');
	var validate = funcGetElement('.sign-validate');
	var post = 'mail=' + funcGetElement('.sign-inputs input[name=mail]').value + '&pass=' + funcGetElement('.sign-inputs input[name=pass]').value + '&pass-confirm=' + funcGetElement('.sign-inputs input[name=pass-confirm]').value;
	var objAjax = new ClassAjax();

	var loading = function () {
		form.classList.add('sign-validating');
		validate.classList.remove('sucess', 'error');
		validate.innerHTML = '<p>...</p>';
	}

	var loaded = function () {
		form.classList.remove('sign-validating');
		validate.classList.add('error');
		switch (objAjax.response()) {
			case '1':
				validate.innerHTML = '<p>Todos os campos devem ser preenchidos.</p>';
				break;

			case '2':
				validate.innerHTML = '<p>Esse email já foi cadastrado.</p>';
				break;

			case '3':
				validate.innerHTML = '<p>As senhas devem ser iguais.</p>';
				break;

			case '4':
				validate.classList.remove('error');
				validate.classList.add('sucess');
				validate.innerHTML = '<p>Sucesso.</p>';
				break;

			default:
				validate.innerHTML ='<p>Erro não esperado: ' + objAjax.response() + '</p>';
				break;

		}
	}

	e.preventDefault();
	objAjax.load('controllers/controller_sign.php', post, loaded, loading);
}
/* !CODE */



/* EVENTS ADDED */
funcAddEvent('.sign-form', 'submit', validateSign);
/* !EVENTS ADDED */