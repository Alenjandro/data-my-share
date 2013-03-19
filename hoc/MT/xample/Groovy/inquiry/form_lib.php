<?PHP
	if( !isset($_POST['mode']) ) exit;
	
	////  注意事項 
	/* /////////////////////////////////
	サーバー環境によっては”表示”などの文字が化ける時がある。
	その際は下記の箇所のコメント"#"を入れ替えてみる。
	58,59行目（付近）
	122,123行目（付近）
	126,127行目（付近）
	//////////////////////////////////// */
	
	//文字コード指定 ////////////
	mb_language("ja");
	mb_internal_encoding( "UTF-8");
	
	
	//FUNCTION /////////////////
	function issetwrite($item,$prefix,$postfix){
		if ( $item != "" ){
			echo $prefix.$item.$postfix;
		}
	}
	
	////投稿モード//////////////////////////////////////////////////////////////////////////////////
	if ( $_POST['mode'] == "fin" ){ 
		foreach ( $_POST['f'] as $key => $val ){
			if ( ! is_array($_POST['f'][$key])){
			$_POST['f'][$key] = htmlspecialchars($val);
			#$_POST['f'][$key] = stripslashes($val);
			}	
		}
		

		//メール送信パート ///////////////////////////////////////
			$m = "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
			$m.= "▼お問い合せ内容\n";
			$m.= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
			 foreach ( $_POST['f'] as $key=>$value ){
				$_POST['f'][$key] = stripslashes(htmlspecialchars($val));
				$m.="【".$e_list[$key]."】\n";
				$m.=$value."\n\n";
			}
			
		$m = mb_convert_encoding( $m, "ISO-2022-JP","UTF-8");
		#$mailsubject = mb_convert_encoding( $mailsubject,"ISO-2022-JP","SJIS");
		#$mailsubject = mb_encode_mimeheader($mailsubject);
		$header = mb_encode_mimeheader( "From: ".$mailfrom );
		mb_send_mail($mailto,$mailsubject,$m,$header)
			or DIE("メール送信に失敗しました。");
			
		//アフィリエイトリンクの場合
		if ( isset($_SESSION['aff'])){
			$m =$mailsubject= "アフィリエイト経由で問い合わせがありました[n-dsn]";
			$m.= date("Y/M/j h:m");
			$m = mb_convert_encoding( $m, "ISO-2022-JP","UTF-8");
			$header = mb_encode_mimeheader( "From: ".$mailfrom );
			mb_send_mail("kubo@tribes20.com",$mailsubject,$m,$header)
				or DIE("メール送信に失敗しました。");
		}
		unset($_SESSION);
		header ("Location: $thanxurl");
		exit;
		
		 ////確認モード////////////////////////////////////////////////////////////////////////
	}elseif ( $_POST['mode'] == "conf"){
		$errstr = "";
		
		#if (isset($_SESSION)) unset($_SESSION);
		
		
		//未入力項目のチェック//////////////////////////////////////////////////////
		foreach ( $require as $key=>$value ){
			if ( is_array($_POST['f'][$value])){ //二次元配列の場合（ラジオボタンなど）
				foreach( $_POST['f'][$value] as $value2 ){
					if ( $value2 == ""  or $value2 == "#" ){
						$errstr.= "<li>".$e_list[$value]."</li>\n";
						break;
					}
				}
			}elseif( isset($_FILES['f']['tmp_name'][$value]) ){ //画像の場合
				if ( $_FILES['f']['tmp_name'][$value]== NULL or $_FILES['f']['tmp_name'][$value]=="" ) $errstr.= "<li>".$e_list[$value]."</li>\n";
			}else{ //　一次元配列の場合（通常）
				if ( $_POST['f'][$value] == "" or $_POST['f'][$value] == "#" ) $errstr.= "<li>".$e_list[$value]."</li>\n";
			}
		}
		
		//改行の削除 //////////////////////////////////////////////////////////////
		foreach ( $isbr as $value ){
			//$_POST['f'][$value] = ereg_replace("(\n|\r|\r\n)","",$_POST['f'][$value]);
		}
		
		//チェックボックス項目をテキスト変数に ////////////////////////////////////
		foreach ( $is_checkbox as $value ){
			$temp = "";
			if ( !isset($_POST['f'][$value])) $_POST['f'][$value]=array("選択無し");
			foreach( $_POST['f'][$value] as $value2 ){
				$temp.= $value2." / ";
			}
			$_POST['f'][$value] = substr($temp,0,-3); //お尻のスラッシュを取る
		}
		
		//電話・郵便番号をハイフンで結合、テキスト変数に /////////////////////////
		foreach ( $is_phone as $value ){
			$temp = "";
			foreach( $_POST['f'][$value] as $value2 ){
				$temp.= $value2."-";
			}
			$_POST['f'][$value] = substr($temp,0,-1);
		}
		
		//日付を年月日で結合、テキスト変数に ////////////////////////////////////
		foreach ( $is_date as $value ){
			$temp = "";
			$i=0;
			$dem = array("年","月","日");
			foreach( $_POST['f'][$value] as $value2 ){
				$temp.= $value2.$dem[$i];
				$i++;
			}
			$_POST['f'][$value] = $temp;
		}
		
		//単純に結合、テキスト変数に ////////////////////////////////////////////
		foreach ( $simplejoin as $value ){
			$temp = "";
			foreach( $_POST['f'][$value] as $value2 ){
				$temp.= $value2;
			}
			$_POST['f'][$value] = $temp;
		}
		
		//複数入力チェックを実行、テキスト変数に////////////////////////////////////
		foreach ( $is_doublecheck as $value ){
			if ( $_POST['f'][$value][0] == $_POST['f'][$value][1] ){
				$_POST['f'][$value] = $_POST['f'][$value][0];
			}else{
				$errstr.= "<li>".$e_list[$value]."が一致しません</li>\n";
			}
		}
		
		//メールアドレス形式のチェック ////////////////////////////////////////////
		foreach ( $ismail as $key=>$value2 ){
			if($_POST['f'][$value2]!="" and !ereg("[a-zA-Z0-9_.￥-]+@[a-zA-Z0-9_.￥-]+",$_POST['f'][$value2])){
				 $errstr.="<li>メールアドレスの形式が不正です</li>\n";
			}
		}
		
		//単位の付加 ///////////////////////////////////////////////////////////////
		foreach ( $is_tani as $tani=>$tani_list ){
			foreach( $tani_list as $value ){
				$_POST['f'][$value]=$_POST['f'][$value].$tani;
			}
		}
		
		//画像処理（テンプフォルダに移動） //////////////////////////////////////////
		$uploaddir = 'uploads/';
		if ( !is_dir($uploaddir) ) mkdir($uploaddir,0777);
		$time=session_id();
		$num=1;
		foreach ( $is_upimg as $value ){
			#var_dump($_FILES['f']['type'][$value]);
			if ($_FILES['f']['error'][$value] == UPLOAD_ERR_OK ) {
				if ( mb_strpos($_FILES['f']['type'][$value],'jpeg')) {
					$newname = $uploaddir.$time."_".$num.".jpg";
					move_uploaded_file($_FILES['f']['tmp_name'][$value], $newname );
					chmod($newname,0777);
					$num++;
					$_POST['f'][$value] = $urlroot.$newname;
					$tempImg[$value] = "<img src=\"".$urlroot.$newname."\" width=\"100\" />";
				}else{
					$errstr.="<li>画像のファイル形式に問題があります</li>\n";
					break;
				}
			}
		}

		//エラー項目の表示 ///////////////////////////////////////////////////////////
		if ( $errstr != "" ){
			$errstr_temp = "<div class=\"form-error\"><p>以下の項目に未記入またはエラーがあります。<br /><br /></p>\n";
			$errstr_temp.= "<ul>$errstr</ul>";
			$errstr_temp.= "<p><br /><br />再度ご確認・ご記入下さい。</p></div>";
			$errstr = $errstr_temp;
		}
		
		//サニタイズ ///////////////////////////////////////////////////////////////////
		foreach ( $_POST['f'] as $key=>$val ){
			if ( is_array($val) ){
				foreach( $val as $key2 => $value2 ){
					$_POST['f'][$key][$key2] = htmlspecialchars(stripslashes($value2));
				}
			}else{
				$_POST['f'][$key] = htmlspecialchars(stripslashes($val));
			}
		}
		
	}
?>