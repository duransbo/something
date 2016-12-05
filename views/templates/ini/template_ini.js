var html = document.getElementById('load');
var ajax;
var post;


if (
	Modernizr.rgba
	&& Modernizr.multiplebgs
	&& Modernizr.backgroundsize
	&& Modernizr.borderradius
	&& Modernizr.boxshadow
	&& Modernizr.textshadow
	&& Modernizr.opacity
	&& Modernizr.cssanimations
	&& Modernizr.cssgradients
	&& Modernizr.csstransitions
	&& Modernizr.fontface
	&& Modernizr.video
	&& Modernizr.audio
	&& Modernizr.csscalc
){
	post = 'browser=open';
} else {
	post = 'browser=close';
}

if (XMLHttpRequest) {
	ajax = new XMLHttpRequest();
} else {
	ajax = new ActiveXObject("Microsoft.XMLHTTP"); //IE
}

ajax.open("POST", 'controllers/controller_browser.php', true);
ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
ajax.setRequestHeader("Content-length", post.length);
ajax.setRequestHeader("Connection", "close");
ajax.onreadystatechange = function(){
	if(ajax.readyState == 4) {
		if(ajax.status == 200) {
			html.innerHTML = ajax.responseText;
			location.reload();
		} else {
			html.innerHTML = 'erro';
		}
	}
}
ajax.send(post);