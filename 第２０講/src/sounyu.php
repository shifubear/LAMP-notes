<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try {
    $dbh = new PDO($dsn, $user, $password);  // 新しいPDOを作成する
    $dbh->query("INSERT INTO tb1 VALUES('K777', 'ピー太郎', 20)");  // 新レコード挿入のコマンドを実行する
    print "成功！";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();  // 接続が失敗したときにメッセージを表示する
}
?>
