<?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	font-style: italic;
	font-weight:normal;
}
-->
</style>
<script type="text/javascript" src="<?php echo $domain?>/css/mudim.js"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
   <tr >
     <td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" width="11" height="9" />&nbsp;&nbsp;Gửi câu hỏi </td>   
   </tr>    
    <tr >
       <td  class="proCenter" >
		<div align="center" style="color:#FF0000">
		  <?php
if($_POST['Send']) {
                
            if($_POST['email']=='') {
                echo "Mời bạn nhập địa chỉ Email";}
            
            elseif($_POST['question']=='') {
                echo "Mời bạn nhập nội dung câu hỏi";}
            else {
            
            mysql_query("INSERT INTO ".query." SET email='".$_POST['email']."'
            ,question='".$_POST['question']."',postdate = '".time()."'");
            
            echo "<script>alert('Nội dung câu hỏi đã gửi tới chúng tôi. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất');location.href='".$domain."';</script>";
            }	
        }
        ?>	   
	      </div>
		<form name="form1" method="post" action="">
         <table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
           
           <tr>
             <td width="15%">&nbsp;</td>
             <td width="4%">&nbsp;</td>
             <td width="81%"><div id="settyper" align="center">Chọn kiểu gõ &nbsp;&nbsp;<input value="1" name="typer" onClick="return Mudim.SetMethod(4);" type="radio">&nbsp;Tự động &nbsp;&nbsp;<input checked="checked" value="1" name="typer" onClick="return  Mudim.SetMethod(2);" type="radio">&nbsp;Telex &nbsp;&nbsp;<input value="1" name="typer" onClick="return  Mudim.SetMethod(1);" type="radio">&nbsp;VNI &nbsp;&nbsp;<input value="0" name="typer" onClick="return Mudim.SetMethod(0);" type="radio">&nbsp;Tắt</div></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td><span class="style1">
              Các trường 
              <?php echo $require?> 
             buộc phải nhập vào</span> </td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td><div align="right"><strong>
               <?php echo $require?>
             Email :</strong></div></td>
             <td>&nbsp;</td>
             <td><input name="email" type="text" id="email" style="width:600px;"></td>
           </tr>
           
           <tr>
             <td height="54"><div align="right"><strong>
               <?php echo $require?>
             Câu hỏi : </strong></div></td>
             <td>&nbsp;</td>
             <td><textarea name="question" rows="7" id="question" style="width:600px; cursor:pointer;"></textarea></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td colspan="3" align="center"><input name="Send" type="submit" id="Send" value="Gửi câu hỏi">
             &nbsp;&nbsp;
             <input type="reset" name="Submit2" value="Viết lại"></td>
           </tr>
         </table>
         </form>      </td>
  </tr>
    <tr>
                <td class="proBottom">&nbsp;</td>
  </tr>
</table>
<script type="text/javascript" src="<?php echo $domain?>/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>