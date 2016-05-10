<?php
//DBXクラス定義を読み込み（同フォルダ内にdbx.phpを設置）
require_once "dbx.php";
try{
	//データベースを接続する
	DBX::connect();
	//SQL文の作成
	$sql = "SELECT * FROM member";
	//SQL文の実行
	$state = DBX::$pdo->query($sql);
	//結果の取得
	$list = $state->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
	//例外処理
	exit($e->getMessage());	
}
?>
<html><body>
<table border="1">
<tr>
<th>UserName</th>
<th>UserPass</th>
</tr>
<?php
foreach ($list as $data){ ?>
<tr>
<td><?php echo $data["userName"]; ?></td>
<td><?php echo $data["userPass"]; ?></td>
</tr>

<?php } ?>
</table>
</body></html>