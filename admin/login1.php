<?php
//セッションを開始
session_start();

//login.htmlから受け取った値を変数に登録
$login = $_POST["login"];
$password = $_POST["password"];

//ログイン名・パスワードが入力されていることを確認
if(strlen($login) == 0 || strlen($password)==0){//strlenは文字列のlength
	unset($_SESSION['login']);
	unset($_SESSION['name']);
	exit("ログイン名・パスワードが入力されていません");
}

//ログイン名・パスワードが適切かどうかを確認
if($login == "yamada" && $password == "himitu"){
	echo "ログイン」に成功しました<br>";
	$_SESSION['login'] = $login;
	$_SESSION['name'] = "山田";
}else{
	unset($_SESSION['login']);
	unset($_SEESION['name']);
	exit("ログイン名・パスワードが適切ではありません。");
}
?>
<a href="login2.php">ログイン状態を確認する</a>
