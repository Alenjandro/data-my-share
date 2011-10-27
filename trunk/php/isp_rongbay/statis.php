<?php
if (!isset($_SESSION['online'])) {
    @mysql_query("INSERT INTO ".online." (session_id,activity,ip_address,refurl,
                 user_agent) VALUES ('" .session_id(). "', now(),
                 '{$_SERVER['REMOTE_ADDR']}', '{$_SERVER['HTTP_REFERER']}',
                 '{$_SERVER['HTTP_USER_AGENT']}')");
	mysql_query("update ".statis." set luottruycap=luottruycap+1");
    @$_SESSION['online'] = '1'; // đăng ký một biến session
} else {
    if (isset($_SESSION['idcus'])) {
        @mysql_query("UPDATE ".online." SET activity=now(),member='y'
        WHERE session_id='" .session_id(). "'");
    }else{
		@mysql_query("UPDATE ".online." SET activity=now(),member='n'
        WHERE session_id='" .session_id(). "'");
	} // endifelse
} // endifelse
if (isset($_SESSION['online'])) {  // nếu là registered. 
    @mysql_query("UPDATE ".online." SET activity=now()
    WHERE session_id='" .session_id(). "'");
}  // endif

      /* Sau 24h sẽ xóa nó. Vì table này sẽ phình ra rất lớn, so dump it. */
      if (date('H') == 00) { // 00-23 hours. or ‘D' == ‘Sun'
          @mysql_query("TRUNCATE TABLE ".online.""); 
          // Xóa tất cả bản ghi. Nhanh hơn dùng DELETE.
      } // endif
	  
	  
	  
//////////////////////////////Hien thi/////////////////////////////
$limit_time = time() - 300; // 5 phút time out. 60 * 5 = 300
$sql = mysql_query("SELECT * FROM ".online." WHERE
                  UNIX_TIMESTAMP(activity) >= $limit_time AND member='n'
                  GROUP BY ip_address") or die (mysql_error());
$sql_member = mysql_query("SELECT * FROM ".online." WHERE
                  UNIX_TIMESTAMP(activity) >= $limit_time AND member='y'
                  GROUP BY ip_address") or die (mysql_error());
$visits = mysql_num_rows($sql);
$members = mysql_num_rows($sql_member);

//Luu thong ke truy cap vao csdl
$sql=mysql_query("SELECT * FROM ".statis."");
    if(mysql_num_rows($sql)>0){
    $rs=mysql_fetch_array($sql);
		if($visits > $rs['khach']){
			mysql_query("update ".statis." set khack='".$visits."',ngay='".time()."'");
		}
		if($members > $rs['thanhvien']){
			mysql_query("update ".statis." set thanhvien='".$members."',ngay='".time()."'");
		}
		$visited = $rs['luottruycap'];
	}
?>