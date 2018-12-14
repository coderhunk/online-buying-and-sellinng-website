
var scripts = document.getElementsByTagName('script');
var lastScript = scripts[scripts.length-1];
var myScript = lastScript.src;
var myScriptSrc = myScript.replace(/iiitolx.js/, '');

/*-------------------------------------------
	File Includes
---------------------------------------------*/

// CSS STYLESHEETS
document.write(unescape('%3Clink rel="stylesheet" media="all" href="' + myScriptSrc + 'css/bootstrap.css"%3E'));
document.write(unescape('%3Clink rel="stylesheet" media="all" href="' + myScriptSrc + 'css/style.css"%3E'));
document.write(unescape('%3Clink rel="stylesheet" media="all" href="' + myScriptSrc + 'css/megamenu.css"%3E'));
document.write(unescape('%3Clink rel="stylesheet" media="all" href="' + myScriptSrc + 'css/flexslider.css"%3E'));
document.write(unescape('%3Clink rel="stylesheet" media="all" href="' + myScriptSrc + 'css/mystyles.css"%3E'));

// FAV ICON
document.write(unescape('%3Clink rel="icon" media="all" href="' + myScriptSrc + 'img/rgu.png"%3E'));

// JAVASCRIPT FILES
!window.jQuery && document.write(unescape('%3Cscript src="' + myScriptSrc + 'js/jquery.min.js"%3E%3C/script%3E'));
!window.jQuery && document.write(unescape('%3Cscript src="' + myScriptSrc + 'js/megamenu.js"%3E%3C/script%3E'));
!window.jQuery && document.write(unescape('%3Cscript src="' + myScriptSrc + 'js/responsiveslides.min.js"%3E%3C/script%3E'));
!window.jQuery && document.write(unescape('%3Cscript src="' + myScriptSrc + 'js/jquery.flexisel.js"%3E%3C/script%3E'));
!window.jQuery && document.write(unescape('%3Cscript src="' + myScriptSrc + 'scripts.js"%3E%3C/script%3E'));

// Mobile viewport optimized
document.write(unescape('%3Cmeta name="viewport" content="width=device-width, initial-scale=1.0"%3E'));

/*-------------------------------------------
	Fin
---------------------------------------------*/
