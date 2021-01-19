<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try { 
    $search = $_POST["search"];  // 入力された検索する文字列

    $re = $dbh->query("SELECT * FROM keijiban_tb1 WHERE message LIKE '%{$search}%';");
    print "検索結果を表示します<br>";
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
