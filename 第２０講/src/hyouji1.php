<?php
// header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try {
    $dbh = new PDO($dsn, $user, $password);  // 新しいPDOを作成する
    $re = $dbh->query("SELECT * FROM tb1");  // tb1のデータをSELECTします
    $kekka = $re->fetch();                   // $re の中身を配列型に抽出する
    print $kekka[0];
    print $kekka[1];
    print $kekka[2];
    print "成功！";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();  // 接続が失敗したときにメッセージを表示する
}
?>
