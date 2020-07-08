if (window.devtools.open)
	actionOnOpenDevtool();

window.addEventListener('devtoolschange', function (e) {        
	if (e.detail.open)
		actionOnOpenDevtool();            
});        

function actionOnOpenDevtool() {
	var span = $('<center><span id="closeredict">IM Software<br>Close developer console and refresh page</span></center>');
	$("html").replaceWith(span);
}

$(document).bind("contextmenu", function (e) {
	return false;
});

$(document).keydown(function (e) {
	if (e.which === 123) {
		return false;
	}        
	if (e.ctrlKey && (e.keyCode === 85)) {
		return false;
	}
	if (e.ctrlKey && e.shiftKey && (e.keyCode === 74 || e.keyCode === 73)) {
		return false;
	}
});
$(document).bind('keydown keypress', 'ctrl+s', function () {
        $('#save').click();
        return false;
    });