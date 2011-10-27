<link rel="stylesheet" type="text/css" href="css/style_edocom.css">
<?php
include ("define_data.php");
include ("config.php");

$parent = $_REQUEST['categories'];
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td nowrap=\"nowrap\" width=143><div align=\"left\"><strong> Nhu cầu:&nbsp;&nbsp;</strong></div></td>
            <td>";
echo "<select name=\"needs\" class=\"Contact_text\">";
$query = "SELECT * FROM ".menu_product." WHERE parent='".intval($parent)."' ORDER BY stt";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
echo "<option value=\"".$row['id']."\">".$row['category']."</option>";
}
echo "</select></td></tr>
      <tr>
            <td><div align=\"left\"><strong> Chủng loại:&nbsp;&nbsp;</strong></div></td>
            <td>";
	  $sqlstr=mysql_query("SELECT * FROM ".menu_service." WHERE status='true' AND parent='".intval($parent)."' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {

echo "<select name=\"type\" class=\"Contact_text\">";
while($row=mysql_fetch_array($sqlstr)){
echo "<option value=\"".$row['id']."\">".$row['category']."</option>";
}
echo "</select>";
}else{
	echo "<select name=\"type\" class=\"Contact_text\" disabled=\"disabled\">";
	echo "<option value=\"0\">--- Chọn chủng loại ---</option>";
	echo "</select>";
}
    echo "</td></tr></table>";
?>