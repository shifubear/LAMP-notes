<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=db1;host=localhost';
$user = 'root';
$password = 'password';

try { 
    $dbh = new PDO($dsn, $user, $password);

    $re = $dbh->query("SELECT * FROM keijiban_tb1;");
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
