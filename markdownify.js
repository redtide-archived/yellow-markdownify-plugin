// Copyright (c) 2016 Andrea Zanellato
// This file may be used and distributed under the terms of the public license.

// Markdownify plugin 0.6.4
var initMarkdownifyFromDOM = function() {

    $('#yellow-pane-edit-page').markdownify();

    $(document).ready(function(){
        var cm = CodeMirror.fromTextArea(
        document.getElementById("yellow-pane-edit-page"), {
            lineNumbers:     true,
            autofocus:       true,
            autoRefresh:     true,
            styleActiveLine: true
        });
        cm.setValue(yellow.page.rawDataEdit);
        setTimeout(function() { cm.refresh(); }, 100);
    });
}

if(window.addEventListener) {
	window.addEventListener('load', initMarkdownifyFromDOM, false);
} else {
	window.attachEvent('onload', initMarkdownifyFromDOM);
}
