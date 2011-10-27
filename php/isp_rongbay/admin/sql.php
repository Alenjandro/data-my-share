<?php
function num_page()  {
    global $n_record;//lay bien toan cuc
    global $p;
    if($n_record%$p==0)    {
      $n_page=$n_record/$p;
      return $n_page;
    }
    else   {
      $n_page=($n_record-($n_record%$p))/$p+1;
      return $n_page;
    }
}
function view_page($link)    {

    global $n_record,$i,$links;
	$next=@$_GET['page']+1;
	$back=@$_GET['page']-1;
	$page=@$_GET['page'];
	if($back<=1) $back=1;
	if($next>num_page()) $next=num_page();		
	if(@$_GET['page']>num_page()) $page=num_page();  
		
	echo "<b>Trang </b>(";
	
	echo @$_GET['page'] == ''?1:@$_GET['page'];
	echo '/'.num_page().'):';
	
    for($i=1;$i<=num_page();$i++)
    {
	
	           if($i < @$_GET['page']+4 && $i > @$_GET['page']-4) {
     				 echo "<a href=\"$link&page=$i\" style=".($i==@$_GET['page']?'color:#FF0000;font-weight:bold':'color:#000000;font-weight:normal')."  >&nbsp;".$i."&nbsp;</a>";
			   }		 
    }
	echo '...';
	
	echo "<a href=\"$link&page=1\" style=".($i==@$_GET['page']?'color:#FF0000;font-weight:bold':'color:#000000;font-weight:normal')."  >&nbsp;&laquo; Trang đầu&nbsp;</a>";
	
	echo " | <a href=\"$link&page=".num_page()."\" style=".($i==@$_GET['page']?'color:#FF0000;font-weight:bold':'color:#000000;font-weight:normal')."  >&nbsp;Trang cuối &raquo;&nbsp;</a>";
   
}

function view_page_view($link,$id_1)    {

    global $n_record,$i,$links,$vip;
	$next=$id_1+1;
	$back=$id_1-1;
	$page=$id_1;
	if($back<=1) $back=1;
	if($next>num_page()) $next=num_page();		
	if($id_1>num_page()) $page=num_page(); 
	
	echo "<b>Trang </b>(";
	
	echo $id_1 == ''?1:$id_1;
	echo '/'.num_page().'):';
	
	for($i=1;$i<=num_page();$i++)
    {
	
	           if($i < $id_1+4 && $i > $id_1-4) {
     				 echo "<a href=\"$link/$i$vip\" style=".($i==$id_1?'color:#FF0000;font-weight:bold;text-decoration:none':'color:#000000;font-weight:normal;text-decoration:none')."  >&nbsp;".$i."&nbsp;</a>";
			   }		 
    }
	echo '...';
	
	echo "<a href=\"$link/1$vip\" style=".($i==$id_1?'color:#FF0000;font-weight:bold;text-decoration:none':'color:#000000;font-weight:normal;text-decoration:none')."  >&nbsp;&laquo; Trang đầu&nbsp;</a>";
	
	 echo " | <a href=\"$link/".num_page()."$vip\" style=".($i==$id_1?'color:#FF0000;font-weight:bold;text-decoration:none':'color:#000000;font-weight:normal;text-decoration:none')."  >&nbsp;Trang cuối &raquo;&nbsp;</a>";
	
	
}
function view_page_link($link)    {

    global $n_record,$i,$links,$vip;
	$ch = explode("/trang-",str_replace($vip,"",$_SERVER['REQUEST_URI']));
	$id_1=$ch[1];
	$next=$id_1+1;
	$back=$id_1-1;
	$page=$id_1;
	if($back<=1) $back=1;
	if($next>num_page()) $next=num_page();		
	if($id_1>num_page()) $page=num_page(); 
	
	echo "<b>Trang </b>(";
	
	echo $id_1 == ''?1:$id_1;
	echo '/'.num_page().'):';
	
	for($i=1;$i<=num_page();$i++)
    {
	
	           if($i < $id_1+4 && $i > $id_1-4) {
     				 echo "<a href=\"$link/trang-$i$vip\" style=".($i==$id_1?'color:#FF0000;font-weight:bold;text-decoration:none':'color:#000000;font-weight:normal;text-decoration:none')."  >&nbsp;".$i."&nbsp;</a>";
			   }		 
    }
	echo '...';
	
	echo "<a href=\"$link/trang-1$vip\" style=".($i==$id_1?'color:#FF0000;font-weight:bold;text-decoration:none':'color:#000000;font-weight:normal;text-decoration:none')."  >&nbsp;&laquo; Trang đầu&nbsp;</a>";
	
	 echo " | <a href=\"$link/trang-".num_page()."$vip\" style=".($i==$id_1?'color:#FF0000;font-weight:bold;text-decoration:none':'color:#000000;font-weight:normal;text-decoration:none')."  >&nbsp;Trang cuối &raquo;&nbsp;</a>";
	
	
}

   
 ?>