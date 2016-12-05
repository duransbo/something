/* CLASSES */
var ClassLoad = function () {

	var mtdRow = function (prmFunc) {
		setTimeout(prmFunc, 0);
	}


	var mtdCss = function (prmUrl, prmCallback = function () {}) {

		var func = function () {
			var css = document.createElement('link');

			css.setAttribute('href', prmUrl );
			css.setAttribute('rel', "stylesheet" );
			css.setAttribute('type', "text/css" );
			css.onload = prmCallback;
			document.getElementsByTagName('head').item(0).appendChild(css);
		};

		mtdRow(func);

	};



	var mtdJs = function (prmUrl, prmCallback = function () {}) {

		var func = function () {
			var js = document.createElement('script');

			js.setAttribute('src', prmUrl );
			js.setAttribute('type', "text/javascript" );
			js.onload = prmCallback;
			document.getElementsByTagName('body').item(0).appendChild(js);
		};

		mtdRow(func);

	};



	return {
		css : mtdCss,
		js : mtdJs
	};
};
/* !CLASSES */