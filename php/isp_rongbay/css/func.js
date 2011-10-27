	var scrollers_list = [];
function check_search()
	{
		if(document.frmSearch.txtSearch.value == "")
		{
			alert('Vui long nhap noi dung can tim vao ! ');
			return;	
		}
		return true;
	}

	
	function check_frm_contact()
	{
		if(document.frmContact.contact_name.value=="")
		{
			alert("Vui long dien ho ten vao !");
			document.frmContact.contact_name.focus();
			return false;
		}
		if(document.frmContact.contact_company.value=="")
		{
			alert ("Vui long dien ten cong ty vao !");
			document.frmContact.contact_company.focus();
			return false;	
		}
		if(document.frmContact.contact_address.value=="")
		{
			alert ("Vui long dien dia chi vao !");
			document.frmContact.contact_address.focus();
			return false;	
		}
		if(document.frmContact.contact_telephone.value=="")
		{
			alert("Vui long dien so dien thoai vao !");
			document.frmContact.contact_telephone.focus();
			return false;	
		}
		if(document.frmContact.contact_email.value=="")
		{
			alert("Vui long dien dia chi email vao !");
			document.frmContact.contact_email.focus();
			return false;
		}
		
		if(document.frmContact.contact_detail.value=="")
		{
			alert("Vui long dien noi dung vao !");
			document.frmContact.contact_detail.focus();
			return false;	
		}
		return true;
	}
	
	
	function check_frm_faq()
	{
		if(document.frmFaq.user_name.value=="")
		{
			alert("Vui long dien ho ten !");
			document.frmFaq.user_name.focus();
			return false;	
		}
		if(document.frmFaq.user_email.value=="")
		{
			alert("Vui long dien email vao !");
			document.frmFaq.user_email.focus();
			return false;
		}
		else
		{
			if(!checkemail(document.frmFaq.user_email.value))
			{
				alert("Vui long nhap dia chi email dung vao !");
				document.frmFaq.user_email.focus();
				return false;	
			}
		}
		if(document.frmFaq.user_content.value=="")
		{
			alert("Vui long nhap noi dung cau hoi !");
			document.frmFaq.user_content.focus();
			return false;	
		}
		return true;
	}
	
	function CheckNumber(str)
	{
		for(var i = 0; i < str.length; i++)
		{	
			var temp = str.substring(i, i + 1);		
			if(!(temp == "," || (temp >= 0 && temp <=9)))
			{
					return false;
			}
		}
		return true;
	}
	function checkemail(theemail)
	{
		if (theemail=="") {return false;}
		if (theemail.indexOf(" ")>0) {return false;}
		if (theemail.indexOf("@")==-1) {return false;}
		if (theemail.indexOf(".")==-1) {return false;}
		if (theemail.indexOf("..")!==-1) {return false;}
		if (theemail.indexOf("@")!=theemail.lastIndexOf("@")) {return false;}
		var str="abcdefghijklmnopqrstuvwxyz-_@.0123456789";
		for (var j=1;j < theemail.length;j++){
		if (str.indexOf(theemail.charAt(j))==-1) {alert('Your Email invalid! Please enter email again!');document.frmContact.lienhe_email.focus();return false;}}
		return true;
	}
	
	function exp_res_img(div_id,img_name)
	{
		if(div_id.style.display == "inline")
		{ 	
			div_id.style.display = "none"; 
			if(img_name.src == btn_min.src) img_name.src = btn_max.src;
			else img_name.src = btn_min.src;
		}
		else
		{ 
			div_id.style.display = "inline";
			if(img_name.src== btn_min.src) img_name.src = btn_max.src;
			else img_name.src = btn_min.src;
		};
	}
	
	function exp_res(div_id)
	{
		if(div_id.style.display == "inline")
		{ 	
			div_id.style.display = "none"; 
		}
		else
		{ 
			div_id.style.display = "inline";
		}
}
	function GotoPage(iPage)
	{
	    document.frmPaging.curPg.value=iPage;
	    document.frmPaging.submit();
	}
	function weblink(value)
	{
		if(value != "")
			window.open(value);	
		
	}
	function fillup(){
	
	if (iedom){
		cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2;
		cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3;
		cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide
		actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth;
		cross_slide2.style.left=actualwidth+slideshowgap+"px";
	}
	else if (document.layers){
		ns_slide=document.ns_slidemenu.document.ns_slidemenu2
		ns_slide2=document.ns_slidemenu.document.ns_slidemenu3
		ns_slide.document.write(leftrightslide)
		ns_slide.document.close()
		actualwidth=ns_slide.document.width
		ns_slide2.left=actualwidth+slideshowgap
		ns_slide2.document.write(leftrightslide)
		ns_slide2.document.close()
	}
	lefttime=setInterval("slideleft()",20)
}

function slideleft(){
	if (iedom){
		if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))
			cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed2+"px"
		else
			cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"
			
		
		if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))
			cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed2+"px"
		else
			cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"

	}
	else if (document.layers){
		if (ns_slide.left>(actualwidth*(-1)+8))
			ns_slide.left-=copyspeed2
		else
			ns_slide.left=ns_slide2.left+actualwidth+slideshowgap

		if (ns_slide2.left>(actualwidth*(-1)+8))
			ns_slide2.left-=copyspeed2
		else
			ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
	}
}
