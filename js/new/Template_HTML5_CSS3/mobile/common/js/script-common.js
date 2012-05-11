/*-- common javascript --*/
window.addEventListener('load',
function(){
	var url=location.hash;
	var check=url.search("#");		
	if(check!=0)
	{
		setTimeout(function(){
		scrollTo(0,1);	
		},100);	
	}	
}, false);