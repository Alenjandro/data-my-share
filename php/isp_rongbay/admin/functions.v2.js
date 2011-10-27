<!--function refresh(){window.location.href=window.location;}
function confirmDelete(URL,OBJ){if(confirm(OBJ)){window.location=URL+"&confirm=yes";}}
var code="images/";function openAWindow(pageToLoad,winName,width,height,center,scroll){xposition=0;yposition=0;if((parseInt(navigator.appVersion)>=4)&&(center)){xposition=(screen.width-width)/2;yposition=(screen.height-height)/2;}
args="width="+width+","+"height="+height+","+"location=0,"+"scrollbars="+scroll+","+"screenx="+xposition+","+"screeny="+yposition+","+"left="+xposition+","+"top="+yposition;window.open(pageToLoad,winName,args);}
function view(ID){what=ID;what1="_bg_"+ID;what2="_plus_"+ID;what3="_minus_"+ID;need=document.getElementById(what);need1=document.getElementById(what1);need2=document.getElementById(what2);need3=document.getElementById(what3);if(need.style.display=="none"){need.style.display="";need1.style.background="#FFFFF2";need2.style.display="none";need3.style.display="";}
else{need.style.display="none";need1.style.background="#D7D7D7";need2.style.display="";need3.style.display="none";}}
var DHTML=(document.getElementById||document.all||document.layers);function ap_getObj(name){if(document.getElementById){return document.getElementById(name).style;}
else if(document.all){return document.all[name].style;}
else if(document.layers){return document.layers[name];}}
function ap_showWaitMessage(div,flag){if(!DHTML)return;var x=ap_getObj(div);x.visibility=(flag)?'visible':'hidden'
if(!document.getElementById)if(document.layers)x.left=280/2;return true;}
function ap_showMainPage(div,flag){if(!DHTML)return;var x=ap_getObj(div);x.visibility=(flag)?'visible':'hidden';}
function show_hide_layer(div,flag){if(!DHTML)return;var x=ap_getObj(div);x.display=(flag)?'':'none';}
function goto(url){window.location.href=url;}
code+="banner";function hovering(which){obj=document.getElementById('hoveringID');if(which==1){obj.innerHTML="<img src='images/layout_images/active.gif' border=0>";}
else{obj.innerHTML="";}}
code+=".gif";function is_empty(fieldID){if(document.getElementById(fieldID).value==""){document.getElementById(fieldID).style.background='#ff0000';document.getElementById(fieldID).focus();return false;}
else{document.getElementById(fieldID).style.background='';}}

function checkTimeout(){tmr++;var timeout=30;if(tmr>timeout){document.getElementById('docLoading').innerHTML="<span style=\"font-size: 14px\">Đã quá "+tmr+" giây để truyền tải dữ liệu.<br>Có thể đường truyền của bạn đang gặp sự cố, bạn có thể đợi thêm vài giây hoặc <a href=\"javascript:void(0)\" onclick=\"self.location.reload()\">[F5]</a> để bắt đầu lại.</span>";}}