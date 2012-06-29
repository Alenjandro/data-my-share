/* ================================================================ 
This copyright notice must be untouched at all times.

The original version of this script and the associated (x)html
is available at http://www.stunicholls.com/various/tabbed_pages.html
Copyright (c) 2005-2007 Stu Nicholls. All rights reserved.
This script and the associated (x)html may be modified in any 
way to fit your requirements.
=================================================================== */


onload = function() 
{
	var e, i = 0;
	while (e = document.getElementById('tabList').getElementsByTagName ('li') [i++])
	{
		e.onclick = function () 
		{
			var getEls = document.getElementById('tabContent').getElementsByTagName('div');
				for (var z=0; z<getEls.length; z++) {
				getEls[z].className=getEls[z].className.replace('show', 'hide');
				}
			var getTitle = document.getElementById('tabList').getElementsByTagName('li');	
			for (var n=0; n<getTitle.length; n++) {
				getTitle[n].className=getTitle[n].className.replace('Stay', '');
				}
			this.className=this.className.replace('Stay','').replace('Over','')+'Stay';
			var max = this.className.replace('Stay','').replace('Over','')+'Content';
			document.getElementById(max).className = "show";
		}
		e.onmousemove = function () 
		{
			var clssCur =this.className.replace('Stay','').replace('Over','');
			if(this.className!=clssCur+'Stay')
			{
				this.className=this.className.replace('Over','')+'Over';
			}
		}

		e.onmouseout = function () 
		{
			var clssCur =this.className.replace('Stay','').replace('Over','');
			if(this.className==clssCur+'Over')
			{
				this.className=this.className.replace('Over','').replace('Stay','');
			}
		}
	}
}