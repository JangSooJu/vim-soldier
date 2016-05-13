<?php
//セッションを開始
session_start();

//DBXの読み込み
//----------------------------------------------------
// データベース関連
//----------------------------------------------------

// データベース接続ユーザー名
define("_DB_USER", "admin_user");

// データベース接続パスワード
define("_DB_PASS", "admin_pass");

// データベースホスト名
define("_DB_HOST", "localhost");

// データベース名
define("_DB_NAME", "admin_db");

// データベースの種類
define("_DB_TYPE", "mysql");

// データソースネーム
define("_DSN", _DB_TYPE . ":host=" . _DB_HOST . ";dbname=" . _DB_NAME. ";charset=utf8");

require_once "./class/BaseModel.php";

//login.htmlから受け取った値を変数に登録
$name = $_POST["name"];
$pass = $_POST["pass"];

//ログイン名・パスワードが入力されていることを確認
if(strlen($name) == 0 || strlen($pass)==0){//strlenは文字列のlength
	unset($_SESSION['name']);
	unset($_SESSION['pass']);
	exit("ログイン名・パスワードが入力されていません");
}
try{
	//データベースに接続する
//	BaseModel::db_connect();
$connect_db = new BaseModel();
	//SQL文を発行して、ログイン・パスワードが適切かどうかを確認
	$sql = "SELECT userName FROM member  WHERE userName = '{$name}' AND userPass = '{$pass}'";

	$state = $connect_db->pdo->query($sql);

	if($state->rowCount() > 0){
		echo "ログインに成功しました<br>";
		$name = $state->fetchColumn();
		$_SESSION['name']=$name;
		$_SESSION['pass']=$pass;
	}else{
	unset($_SESSION['name']);
	unset($_SESSION['pass']);
	exit("ログイン名・パスワードが適切ではありません。");
	}
}catch(Exception $e){
	exit($e->getMessage());
}
?>
<a href="login2.php">ログイン状態を確認する</a><br><br>
<input type="button" onclick="location.href='menuEdit.php'" value="商品の編集">