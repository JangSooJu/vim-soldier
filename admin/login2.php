<?php
//セッションを確認
session_start();
//ログインされているかどうかを $_SESSION['login'] により確認
if(!isset($_SESSION['name']) || $_SESSION['pass'] == ""){
	echo "ログインされていません";
	exit();
}else{
	echo "正常にログインできています<br>";
	echo "あなたの名前は".$_SESSION["name"]."です。<br>";
}
echo "あなたのセッションIDは".session_id()."です。";
?>