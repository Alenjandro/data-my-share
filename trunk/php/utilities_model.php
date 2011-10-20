<?php
 class Utilities_model extends Model {	
    function Utilities_model() 
    {
        parent::Model();        		
    }//Controller End	
	function ChangeMarked($string){
		$mark_vietnamese=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
		"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
		,"ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
		,"ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ",
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
		,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
		,"Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ");
		
		
		$mark_simple=array("a","a","a","a","a","a","a","a","a","a","a"
		,"a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o"
		,"o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d",
		"A","A","A","A","A","A","A","A","A","A","A","A"
		,"A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O"
		,"O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D");
		return str_replace($mark_vietnamese,$mark_simple,$string);
	}
    static function utf8_substr($str,$from,$len) {
		
		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                        '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                        '$1',$str);
	}
     static function substr($str, $len) {
	
		$s = self::utf8_substr($str, 0, $len);
		$l = strlen($s);
		if ($l <= 0) return $s;
		if ($l >= strlen($str)) return $s; // end of string
		if ($str{$l}==' ' || $str{$l-1}==' ') return trim($s); // end of word
		// find the previous space ' '
		while ($s{$l-1}!=' ') {
			if ($l<=0) return ''; // to the first of string
			$s = substr($str, 0, $l-1);
			$l = strlen($s);
		}
		return trim($s);
	}
    static function displayForm($st, $charset='utf-8') {	
		return htmlentities($st, ENT_QUOTES, $charset);
	}

    static function displayHTML($st, $encode=true, $charset='utf-8') {
	
		if ($encode)
			return nl2br(htmlentities($st, ENT_QUOTES, $charset));
		else
			return ($st);
	}
    static function SerializeObject($object) {
	
		$v=array();
		$v[0]=$object;  // don't serialize an object directly (a bug)
		return serialize($v);
	}
    static function UnserializeObject($str) {
	
		$v=unserialize($str);
		if(!is_array($v) || count($v)!==1)
			return false;
		return $v[0];
	}
}
