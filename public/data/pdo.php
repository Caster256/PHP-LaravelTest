<?php  
	header('Content-Type:text/html;charset=utf-8');
	//連接帳號資料表，檢查帳密是否正確
	$hostname = "localhost"; //資料庫主機位置
	$username = "root"; //資料庫的使用帳號
	$password = "love0401"; //資料庫的使用密碼
	$database = "posts"; //資料庫名稱

	//PDO的連接語法
	try {
		//,array(PDO::ATTR_PERSISTENT => true)  => 若需要長時連結資料庫要加上這行
	    $link = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
	    $link->query('SET NAMES "utf8"');  //設定編碼
	    //echo "連結成功<br/>";	    
		
	    //$link = null;	//關閉資料庫
	} 
	catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
	
?>