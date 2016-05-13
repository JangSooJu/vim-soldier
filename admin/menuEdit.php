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
$item_id = 1;
//insertしてくれる関数に飛ばす
$ins = $itm->editData($item_id,htmlspecialchars($_POST["item_name"]),htmlspecialchars($_POST["detail"]),htmlspecialchars($_POST["price"]), $_FILES["image"]["name"],htmlspecialchars($_POST["ctg_id"]),htmlspecialchars($_POST["delete_flg"]));

//updataを使って情報編集をしてくれる関数に飛ばす
//$edit = $itm->editData(3,"tako","test-now",40,"test.jpg",4,0);

//商品削除のとき論理削除する関数に飛ばす
//$del = $itm->delCartData(3);

echo htmlspecialchars($_POST["item_name"]);
echo "<br>";
echo htmlspecialchars($_POST["detail"]);
echo "<br>";
echo htmlspecialchars($_POST["price"]);
echo "<br>";
echo $_FILES["image"]["name"];
echo htmlspecialchars($_POST["ctg_id"]);
echo "<br>";

if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "files/" . $_FILES["image"]["name"])) {
    chmod("files/" . $_FILES["image"]["name"], 0644);
    echo $_FILES["image"]["name"] . "をアップロードしました。";
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}
echo htmlspecialchars($_POST["delete_flg"]);
?>