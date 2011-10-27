<?php
include "check.php";?>
<table cellpadding="3" cellspacing="3" align="left" style=" background-color:#EEEEEE;height:30px; border:#CCCCCC 1px solid;" width="100%">	

    <?php
if (@$_GET['menu']=="lookup_warranty") {?>
	<tr>
	<td width="64%"><a href="index.php?menu=lookup_warranty&site=lookup_warranty" >Tra cứu bảo hành</a></td>
	</tr>
	<?php
}?>


    <?php
if (@$_GET['menu']=="config") {?>
	<tr>
	<td><a href="index.php?menu=config&site=config" >Quản lý cấu hình hệ thống</a></td>
	<td width="2%">|</td>
	<td width="34%"><a href="index.php?menu=config&site=statis" >Thống kê truy cập</a></td>
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="policy") {?>
	<tr>
	<td><a href="index.php?menu=policy&site=policy" >Chính sách bán hàng</a></td>
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="team") {?>
	<tr>
	<td><a href="index.php?menu=team&site=team" >Quản lý quy định đăng tin</a></td>
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="teammember") {?>
	<tr>
	<td><a href="index.php?menu=teammember&site=teammember" >Quản lý quy chế thành viên</a></td>
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="members") {?>
	<tr>
	<td><a href="index.php?menu=members&site=members" >Quản lý thành viên</a></td>	
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="userport") {?>
	<tr>
	<td><a href="index.php?menu=userport&site=userport" >Quản lý tin đăng thành viên</a></td>
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="adv") {?>
	<tr>
	<td><a href="index.php?menu=adv&site=adv" >Liên hệ quảng cáo</a></td>
	</tr>
	<?php
}?>


	<?php
if (@$_GET['menu']=="ManagerProduct") {?>
	<tr>
	<td><a href="index.php?menu=ManagerProduct&site=MenuProduct" >Danh mục menu</a></td>		
    <td>|</td>
	<td><a href="index.php?menu=ManagerProduct&site=needs" >Quản lý danh mục chủng loại </a></td>		
	</tr>
	<?php
}?>

	
	<?php
if (@$_GET['menu']=="intro") {?>
	<tr>
	<td><a href="index.php?menu=intro&site=intro" >Quản lý giới thiệu</a></td>
	</tr>
	<?php
}?>

	
	
	<?php
if (@$_GET['menu']=="ManageMode") {?>
	<tr>
	<td><a href="index.php?menu=ManageMode&site=ManageMode" >Quản lý thành viên hệ thống</a></td>
	</tr>
	<?php
}?>
	
	<?php
if (@$_GET['menu']=="ManageCategory") {?>
	<tr>
	<td><a href="index.php?menu=ManageCategory&site=ManageCategory" >Quản lý nhóm danh mục</a></td>
	</tr>
	<?php
}?>
	
	  <?php
if (@$_GET['menu']=="slide") {?>
	<tr>
	<td><a href="index.php?menu=slide&site=slide" >Quản lý Slide</a></td>
	</tr>
	<?php
}?>
	
    
      <?php
if (@$_GET['menu']=="news") {?>
	<tr>
	<td><a href="index.php?menu=news&site=news" >Quản lý tin tức</a></td>
	</tr>
	<?php
}?>   
   
    
    <?php
if (@$_GET['menu']=="query") {?>
	<tr>
	<td><a href="index.php?menu=query&site=query" >Quản lý câu hỏi khách hàng</a></td>
	</tr>
	<?php
}?>
    
    <?php
if (@$_GET['menu']=="guide") {?>
	<tr>
	<td><a href="index.php?menu=guide&site=guide" >Quản lý hướng dẫn</a></td>
	</tr>
	<?php
}?>
    
     <?php
if (@$_GET['menu']=="province") {?>
	<tr>
	<td><a href="index.php?menu=province&site=province" >Quản lý tỉnh thành </a></td>
	</tr>
	<?php
}?>	
	
	
	<?php
if (@$_GET['menu']=="contact") {?>
	<tr>
	<td><a href="index.php?menu=contact&site=contact" >Quản lý liên hệ</a></td>
	</tr>
	<?php
}?>
	
	
	
	<?php
if (@$_GET['menu']=="change_pass") {?>
	<tr>
	<td><a href="index.php?menu=change_pass&site=change_pass" >Đổi mật khẩu</a></td>
	</tr>
	<?php
}?>	

	<?php
if (@$_GET['menu']=="manager_adverting") {?>
	<tr>
	<td><a href="index.php?menu=manager_adverting&site=manager_adverting" >Quản lý quảng cáo</a></td>		
	</tr>
	<?php
}?>

  <?php
if (@$_GET['menu']=="SupportOnline") {?>
	<tr>
	<td><a href="index.php?menu=SupportOnline&site=SupportOnline" >Hỗ trợ trực tuyến</a></td>		
	</tr>
	<?php
}?>
</table>	
	
