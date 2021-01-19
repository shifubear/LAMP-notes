<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try { 
    $dbh = new PDO($dsn, $user, $password);

    $name = $_POST["namae"];  // 入力された名前
    $message = $_POST["message"];  // 入力されたメッセージ
    
    $dbh->query("INSERT INTO keijiban_tb1 (namae, message) VALUES ('{$name}', '{$message}');");
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
