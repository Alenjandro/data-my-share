/*
	Image Cross Fade Redux
	Version 1.0
	Last revision: 02.15.2006
	steve@slayeroffice.com

	Rewrite of old code found here: http://slayeroffice.com/code/imageCrossFade/index.html
*/

window.addEventListener?window.addEventListener('load',so_init1,false):window.attachEvent('onload',so_init1);

var d=document, imgs1 = new Array(), zInterval = null, current=0, pause=false;
var fadetime1 = 3000;
function so_init1()
{
	if(!d.getElementById || !d.createElement)return;

	imgs1 = d.getElementById('ja_header_jsfade1').getElementsByTagName('img');
	for(i=1;i<imgs1.length;i++) imgs1[i].xOpacity = 0;
	imgs1[0].style.display = 'block';
	imgs1[0].xOpacity = .99;

	setTimeout(so_xfade,fadetime);
}

function so_xfade()
{
	cOpacity = imgs1[current].xOpacity;
	nIndex = imgs1[current+1]?current+1:0;
	nOpacity = imgs1[nIndex].xOpacity;

	cOpacity-=.05;
	nOpacity+=.05;

	imgs1[nIndex].style.display = 'block';
	imgs1[current].xOpacity = cOpacity;
	imgs1[nIndex].xOpacity = nOpacity;

	setOpacity(imgs1[current]);
	setOpacity(imgs1[nIndex]);

	if(cOpacity<=0)
	{
		imgs1[current].style.display = 'none';
		current = nIndex;
		setTimeout(so_xfade,fadetime);
	}
	else
	{
		setTimeout(so_xfade,50);
	}

	function setOpacity(obj)
	{
		if(obj.xOpacity>.99)
		{
			obj.xOpacity = .99;
			return;
		}

		obj.style.opacity = obj.xOpacity;
		obj.style.MozOpacity = obj.xOpacity;
		obj.style.filter = 'alpha(opacity=' + (obj.xOpacity*100) + ')';
	}
}