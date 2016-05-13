<?php
//セッションを開始
//session_start();

//DBXの読み込み
//----------------------------------------------------
// データベース関連
//----------------------------------------------------

include './config.php';
require_once "./class/PDODatabase.class.php";
require_once "./class/DBController.class.php";
//require_once "./class/Item.class.php";

try{
	//データベースに接続する
$dbh = new PDODatabase(_DB_HOST, _DB_USER, _DB_PASS, _DB_NAME , _DB_TYPE);
	//SQL文を発行して、ログイン・パスワードが適切かどうかを確認
	
}catch(Exception $e){
	exit($e->getMessage());
}
$itm    = new Item( $dbh );
$ins = $itm->insCartData($item_id,htmlspecialchars($_POST["item_name"]),htmlspecialchars($_POST["detail"]),htmlspecialchars($_POST["price"]), $_FILES["image"]["name"],htmlspecialchars($_POST["ctg_id"]),htmlspecialchars($_POST["delete_flg"]));


?>