<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるため

/* データベース接続のためのデータを入力する */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try { 
    $dbh = new PDO($dsn, $user, $password);

    /********** 挿入用のボタンが押された時の処理 **********/
    if ($type == "ins") {  
        $name = $_POST["namae"];
        $message = $_POST["message"];

        $dbh->query("INSERT INTO keijiban_tb1 (namae, message) VALUES ('{$name}', '{$message}');");
    } 
    /********** 削除用のボタンが押された時の処理 **********/
    else if ($type == "del") {  // 削除用のボタンが押された時の処理
        $number = $_POST["bangou"];  // 入力された削除する番号
    
        $dbh->query("DELETE FROM keijiban_tb1 WHERE bangou = {$number};");    
    }

    $re = $dbh->query("SELECT * FROM keijiban_tb1;");

    /********** 検索用のボタンが押された時の処理 **********/
    if ($type == "ser") {
        $search = $_POST["search"];  // 入力された検索する文字列
        $re = $dbh->query("SELECT * FROM keijiban_tb1 WHERE message LIKE '%{$search}%';");
    }

    /********** データベースを表示する **********/
    while ($kekka = $re->fetch()) {
        print $kekka[0];
        print " | ";
        print $kekka[1];
        print " | ";
        print $kekka[2];
        print "<br>";
    }

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
