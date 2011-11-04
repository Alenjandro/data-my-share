/* ================================================================ 
This copyright notice must be untouched at all times.

The original version of this scriptt and the associated (x)html
is available at http://www.stunicholls.com/menu/pro_dropline_5.html
Copyright (c) 2005-2008 Stu Nicholls. All rights reserved.
This script and the associated (x)html may be modified in any 
way to fit your requirements.
=================================================================== */


	var getEls = document.getElementById('menu').getElementsByTagName("LI");
	var getListElts = document.getElementById('submenus').getElementsByTagName("UL");
	var getAgn = getEls;
	

	for (var i=0; i<getEls.length; i++) {
		getEls[i].onmouseover=function() {
		this.className = this.className == 'clicked' ? '' : 'clicked';

		for (var z=0; z<getAgn.length; z++) {
		if (this.id != getAgn[z].id){
				getAgn[z].className = '';
			}
		}


		ulId = this.id.replace("li", "ul");
		document.getElementById(ulId).className = document.getElementById(ulId).className == 'yes' ? 'none' : 'yes';

			for (var i=0; i<getListElts.length; i++) {
			if (ulId != getListElts[i].id && getListElts[i].className == "yes"){
					getListElts[i].className = "none";
				}
			}
		}
	}


