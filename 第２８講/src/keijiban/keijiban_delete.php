<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try { 
    $dbh = new PDO($dsn, $user, $password);

    $number = $_POST["bangou"];  // 入力された削除する番号
    
    $dbh->query("DELETE FROM keijiban_tb1 WHERE bangou = {$number};");
        
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
