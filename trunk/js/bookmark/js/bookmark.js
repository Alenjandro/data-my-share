$(function(){
	$("a.bookmark").click(function(e) {
		if ($.browser.opera == false) {
				e.preventDefault();
				var url = this.href;  
				var title = this.title;

				if ($.browser.mozilla == true) {
						window.sidebar.addPanel(title, url, '');
						return false;
				} else if($.browser.msie == true) {  
						window.external.AddFavorite( url, title);
						return false;
				} else {
						alert('Please use CTRL + D to bookmark this website.');
				}


		}
	});
});


BookmarkApp = function () {
    var isIEmac = false; /*@cc_on @if(@_jscript&&!(@_win32||@_win16)&& 
(@_jscript_version<5.5)) isIEmac=true; @end @*/
    var isMSIE = (-[1,]) ? false : true;
    var cjTitle = document.title;
    var cjHref = location.href;

    function hotKeys() {
        var ua = navigator.userAgent.toLowerCase();
        var str = '';
        var isWebkit = (ua.indexOf('webkit') != - 1);
        var isMac = (ua.indexOf('mac') != - 1);

        if (ua.indexOf('konqueror') != - 1) {
            str = 'CTRL + B'; // Konqueror
        } else if (window.home || isWebkit || isIEmac || isMac) {
            str = (isMac ? 'Command/Cmd' : 'CTRL') + ' + D'; // Netscape, Safari, iCab, IE5/Mac
        }
        return ((str) ? 'Press ' + str + ' to bookmark this page.' : str);
    }

    function isIE8() {
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null) {
                rv = parseFloat(RegExp.$1);
            }
        }
        if (rv > - 1) {
            if (rv >= 8.0) {
                return true;
            }
        }
        return false;
    }

    function addBookmark(a) {
        try {
            if (typeof a == "object" && a.tagName.toLowerCase() == "a") {
                a.style.cursor = 'pointer';
                if (window.opera) {
                    a.href = cjHref;
                    a.title = cjTitle;
                    a.rel = 'sidebar'; // Opera 7+
                    return true;
                }
            } else {
                throw "Error occured.\r\nNote, only A tagname is allowed!";
            }
        } catch (err) {
            alert(err);
        }

    }

    return {
        addBookmark : addBookmark
    }
}();