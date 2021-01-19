# 第２８講

## 簡単掲示板

それではここまで復習した内容を使って第２２講で始めた掲示板を完成させましょう。

まずはその掲示板の概要を復習しましょう。

今回の掲示板のデータベースは以下のような構造です。

|投稿番号|投稿者名|メッセージ内容|
|:---:|:---:|:---:|
|INT <br> AUTO_INCREMENT <br> PRIMARY KEY| VARCHAR(50) | VARCHAR(150) | 
|bangou |namae | message|

投稿番号はレコードの削除をするときに必要と判断して、自動で番号が振られるように作り、あとは投稿者とメッセージを記録するために二つのカラムを使用します。

次に、この掲示板に実装すると決めた４つの機能があります。それぞれの機能を実装するために以下のファイル構造を使用しています。

```linux
├── html/ 
│   ├── www/
│   │   ├── keijiban.html
│   │   ├── keijiban_select.php
│   │   ├── keijiban_insert.php
│   │   ├── keijiban_delete.php
│   │   ├── keijiban_search.php
```

順番にそれぞれのファイルが担う機能を復習しましょう。

- 掲示板の中身を表示するための `keijiban_select.php`
- 掲示板に新しいレコードを挿入する `keijiban_insert.php`
- 掲示板からレコードを削除する `keijiban_delete.php`
- 掲示板のメッセージから任意の文字列を検索するための `keijiban_search.php`
- 上記の４つの機能を使えるためのサイトを `keijiban.html` に実装しました

それではそれぞれの機能を実装していきましょう。４つのファイルとも型は一緒なので、`try`の中のコードだけを表示します。

## 表示

`keijiban_select.php`

```php
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
```

まずテーブルのデータを表示するためのクエリは 

```sql
SELECT * FROM keijiban_tb1;
```

です。このクエリはデータベースに命令するだけのクエリではなく、結果のデータが大事なクエリです。そのため、`$re`という変数に返り値を格納します。この結果を読み出すには、ループを使って一つ一つのレコードを配列として読み出します。

## 挿入

`keijiban_insert.php`

```php
$dbh = new PDO($dsn, $user, $password);

$name = $_POST["namae"];  // 入力された名前
$message = $_POST["message"];  // 入力されたメッセージ

$dbh->query("INSERT INTO keijiban_tb1 (namae, message) VALUES ('{$name}', '{$message}');");
```

テーブルにデータを挿入するためのクエリは

```sql
INSERT INTO keijiban_tb1 (namae, message) VALUES ('{$name}', '{$message}');
```

です。これは `namae` カラムに `$name` のデータを入れ、`message` カラムに `$message` のデータを入れます。これはテーブルに対する命令で、結果のデータは特にいらないのでここまでで完成です。

## 削除

`keijiban_delete.php`

```php
$dbh = new PDO($dsn, $user, $password);

$number = $_POST["bangou"];  // 入力された削除する番号

$dbh->query("DELETE FROM keijiban_tb1 WHERE bangou = {$number};");
```

テーブルからデータを削除するためのクエリは

```sql
DELETE FROM keijiban_tb1 WHERE bangou = {$number};
```

です。これは `bangou` カラムが `$number`番目のデータを削除するためのクエリです。これもテーブルに対する命令で、結果のデータは特にいらないのでここまでで完成です。

## 検索

`keijiban_search.php`

```php
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
```

テーブルから任意の文字列を検索するためのクエリは

```sql
SELECT * FROM keijiban_tb1 WHERE message LIKE '%{$search}%';
```

です。これは `message` カラムのデータで、`$search` 文字列と一致する部分があるメッセージが入っているレコードを全て返します。今回は検索結果を表示するので、クエリの結果のデータが必要になります。これを表示するには上記の「表示」と同じように実行すれば表示ができます。


## ナビゲーション

これで掲示板の機能が一通り完成しました！でも使ってみると少し不便なところがあります。

一つの機能を実行したあと、他の機能を実行したい時や、毎回また同じ機能を使用したい時にホーム画面に戻らないといけません。

サイト内が移動しやすくなるようにリンクを入れましょう。このようなサイト内の移動のことを「ナビゲーション」といいます。

```html
<a href="移動さきのパス">クリックできる文</a>
```

上記がリンクの書式です。`href`のところには移動さきのパスを入れます。これは絶対パスでも相対パスでも可能です。それではそれぞれのPHPファイルの下にホームのHTMLページに移動できるように相対パスを指定しましょう。
