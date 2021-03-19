# 第３９講

## ファイルの準備

それでは最初にプロジェクトに必要なファイルを用意しましょう。ファイル構造はそれぞれ少しずつ変わると思いますが、大きな形としては以下のようになると思います。

```
├── html/ 
│   ├── project_name/
│   │   ├── index.html
│   │   ├── db_info.php
│   │   ├── kinou.php
│   │   ├── ... 
```

メインディレクトリになる`project_name`はそれぞれのプロジェクト名を入れましょう。その中に、今回使用すると計画で予測するファイルを作成しておきましょう。各ファイルのテンプレは以前と似てるものを使います。掲示板と同じようにスタート地点として使ってください。

`index.html`

```html
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

    <form method="POST" action="practice1.php">
        <div>あなたの名前と年齢を教えてください。</div>
        <input>
    </form>

</body>
</html>
```

`db_info.php`

```php
<?php

$dsn = 'sqlite:./db/db_file.sqlite3';

?>
```

`php`ファイル

```php
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
    </style>
</head>
<body>

<?php 
/* Connect to a MySQL database using driver invocation */
require_once('db_info.php');

try { 
    $dbh = new PDO($dsn);
    
    // この下にプログラムを書きましょう。

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>

</body>
</html>
```

## データベースの作成

次は計画にそってデータベースを作成しましょう。KAGOYAのサーバーの状況を考えて、MySQLでは無く、SQLiteで作成します。クエリに使うコマンドの書式は同じですが、テーブルの作成の手順は少し違います。

```sh
$ cd /var/www/html/project_name
$ mkdir db
$ touch db/db_file.sqlite3
$ sudo chmod 777 db
$ sudo chmod 776 db_file.sqlite3
$ sqlite3 db/db_file.sqlite3
sqlite> CREATE TABLE ________ (____, ____, ...); 
```

SQLiteのテーブルはデータ型が少しだけ違います。よく使うもので違うものは文字列型を`VARCHAR`ではなく`TEXT`と指定すること、数値型は`INTEGER`型と指定することです。他はほとんど似ているので、テーブルの作成さえ終了できればMySQLを使っていた時と同じような感覚で使って問題はありません。テーブルの作成が終わったら、PHPのファイルをブラウザで開いて動作の確認をしてみましょう！

## 準備完了

これでプログラムを書き始めるための準備は完了です！もちろんプロジェクトを進めていく中で、データベースを少し変更する必要が出たり、より良いファイル構造が思いついたりすることがあります。そういう時はプロジェクトの進み具合などを考えながら変更するのは自由です。

あとはみんながイメージしているサイトを作るための作業を進めていきましょう！この先の授業は最初の１５分程は各自で作業を進め、必要な場合は先生に質問をしたり相談をしてください。その後は一人ずつ先生が進み具合を確認したり、困ってる部分を一緒に解決する時間を順番に持ちながら進めていこうと思ってます。その後はまた自由に作業をしてもらって、わからないところなどがある場合は先生と一緒に考えていきましょう！
