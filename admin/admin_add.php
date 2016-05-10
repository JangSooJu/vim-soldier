<html>
<body>
商品の追加をするページ！
</body>
</html>
<?php
//セッションを開始
session_start();

//DBXの読み込み
//----------------------------------------------------
// データベース関連
//----------------------------------------------------

// データベース接続ユーザー名
define("_DB_USER", "shopping_user");

// データベース接続パスワード
define("_DB_PASS", "shopping_pass");

// データベースホスト名
define("_DB_HOST", "localhost");

// データベース名
define("_DB_NAME", "shopping_db");

// データベースの種類
define("_DB_TYPE", "mysql");

// データソースネーム
define("_DSN", _DB_TYPE . ":host=" . _DB_HOST . ";dbname=" . _DB_NAME. ";charset=utf8");

require_once "./class/BaseModel.php";

try{
	//データベースに接続する
$db = new BaseModel();
	//SQL文を発行して、ログイン・パスワードが適切かどうかを確認
	$select_sql = "SELECT * FROM item";
	$select_state = $db->pdo->query($select_sql);
	$select_list = $select_state->fetchAll(PDO::FETCH_ASSOC);
	var_dump($select_list);
	$table = "item";
	$preSt = "14,'test2','testtest',40,'test.jpg',3";
	//
	$insert_sql ="INSERT INTO"
		.$table
		.") VALUES (" 
		.      $preSt 
		 . ") " ;
	 $insert_state = $db->pdo->query( $insert_sql );
		
		
		//values(14,'test2','testtest',40,'test.jpg',3)";
//	$insert_state = $db->pdo->query($insert_sql);
//	$insert_list = $insert_state->fetchAll(PDO::FETCH_ASSOC);
//	var_dump($select_list);
	//
	
}catch(Exception $e){
	exit($e->getMessage());
}
?>