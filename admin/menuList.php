<?php
include "menuList.html";
include './config.php';
require_once "./class/PDODatabase.class.php";
require_once "./class/DBController.class.php";

try{
	//データベースに接続する
$dbh = new PDODatabase(_DB_HOST, _DB_USER, _DB_PASS, _DB_NAME , _DB_TYPE);
	//SQL文を発行して、ログイン・パスワードが適切かどうかを確認
	
}catch(Exception $e){
	exit($e->getMessage());
}
$itm    = new Item( $dbh );
$delete_flg=0;
$item_data = $itm->getAllItemList($delete_flg);
//var_dump($item_data);
//echo "<br><br>";
//foreach ($item_data as $key => $value){
//	$obj->item_id = $key;
//}
//var_dump($key);

//array_keys($itm->getAllItemList($delete_flg));
//var_dump($itm);
//$item_id = 1;
//insertしてくれる関数に飛ばす
//$ins = $itm->editData($item_id,htmlspecialchars($_POST["item_name"]),htmlspecialchars($_POST["detail"]),htmlspecialchars($_POST["price"]), $_FILES["image"]["name"],htmlspecialchars($_POST["ctg_id"]),htmlspecialchars($_POST["delete_flg"]));
?>