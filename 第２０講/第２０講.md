# 第２０講 

### 今日の講義ノート
    https://github.com/shifubear/LAMP-notes/

### MySQLのログイン方法の確認
久しぶりにMySQLを起動してみましょう。今までは```sudo```を使ってMySQLの操作をしてきました。PHPと連携するためにはrootのパスワードを新しく設定する必要があります。
下記のコマンドを書いてパスワードを変更しましょう。

```
$ sudo mysql
mysql> SELECT user,authentication_string FROM mysql.user;
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY ‘password’;
mysql> FLUSH PRIVILEGES;
mysql> SELECT user,authentication_string FROM mysql.user;
```


### PHPをMySQLと接続させる
PHPでMySQLを操作するには、PHP内に用意されているPDOというオブジェクトを使って行います。

> __書式__：PDOクラスのオブジェクトを作成する
> ```
> new PDO(データソース名, ユーザ名, パスワード);
> ```

データソース名は以下のように記述します。
```
ドライバ名:host=ホスト名;dbname=データベース名
```

今回の授業ではMySQLを使っているので、
- ドライバ名：mysql
- ホスト名：localhost
- データベース名：db1
を使いましょう。将来、他のデータベースとつなげたいときはここを変更します。

それではPDOオブジェクトを作ってちゃんと接続できているか確認してみましょう。
新しく「setuzoku.php」という名前のファイルを作って、以下のコードを入れてください。
下線部は各自必要な内容を入力してみてください。

```
<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

$dsn = '_____';             // データソース名の設定
$user = '_____';            // ユーザ名
$password = '_____';        // パスワード

try {
    $dbh = new PDO($dsn, $user, $password);  // 新しいPDOを作成する
    print "成功！";                         
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();  // 接続が失敗したときにメッセージを表示する
}
?>
```

コードが書けたら、ブラウザから「setuzoku.php」を開いてみてください。問題がなければ「成功！」と表示されます。
失敗した場合、エラー文が表示されます。エラーに合わせて対処していきましょう。

### PHPのPDOオブジェクトでMySQL文を発行する
PDOオブジェクトを使ってMySQL文を発行するにはqueryメソッドを使います。

> __書式__：queryメソッド
> ```
> PDOオブジェクト->query("実行するSQL文");
> ```

まずはテーブルにレコードを挿入してみましょう。
テーブルに新しいレコードを挿入するコマンドは
```
INSERT INTO テーブル名 VALUES(データ１, データ２, ...);
```
でした。

実際に実行してみましょう。
新しく「sounyu.php」というファイルを作成し、以下のコードを入力しましょう。
番号を'K777',名前を'ピー太郎',歳を20の新しいレコードを挿入できるようにしたのコードを編集してみてください。
```
<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

$dsn = '_____';             // データソース名の設定
$user = '_____';            // ユーザ名
$password = '_____';        // パスワード

try {
    $dbh = new PDO($dsn, $user, $password);  // 新しいPDOを作成する
    $dbh->query("____________________");  // 新レコード挿入のコマンドを実行する
    print "成功！";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();  // 接続が失敗したときにメッセージを表示する
}
?>
```

成功と表示されたら、MySQLモニタを使ってデータが挿入されたか確認してみましょう。
```
$ sudo mysql
mysql> use db1
mysql> SELECT * FROM tb1;
```

### MySQL文の結果をブラウザに表示する
操作する方法が分かっても、ブラウザに表示できないとあまり意味がありません。ここではどうブラウザに表示するかをみていきましょう。
挿入のクエリは返り値にあまり興味はありませんが、「SELECT * FROM tb1;」のように結果を確認したいコマンドは返り値を保存する方法が必要です。
queryメソッドの結果はPHPの変数に保存することができます。下記のコードでは「SELECT」文の結果を「$re」という変数に代入しています。

```
$re = $dbh->query("SELECT * FROM tb1");
```

それでは「$re」変数をプリントを使って表示してみましょう。
新しく「hyouji.php」というファイルを作って下記のコードを入れて実行してみてください。

```
<?php
header('Content-Type: text/html;charset=utf-8');  // 日本語が正しく表示されるようにいれる

$dsn = '_____';             // データソース名の設定
$user = '_____';            // ユーザ名
$password = '_____';        // パスワード

try {
    $dbh = new PDO($dsn, $user, $password);  // 新しいPDOを作成する
    $re = $dbh->query("SELECT * FROM tb1");  // tb1のデータをSELECTします
    print $re;                               // $re　の中身を表示します。
    print "成功！";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();  // 接続が失敗したときにメッセージを表示する
}
?>
```

なぜかエラーが出てきました…
実は$reに代入した返り値は「PDOStatementオブジェクト」と言って、PHPが表示できるデータ型ではありません。理由を探ると少し難しいので、今はこの辺の詳細は割愛します。
それでは$reの中身を表示するにはどうすればいいでしょうか？
PDOStatementオブジェクトの中身を書き出せるようにするには「fetch()」というメソッドを使います。

> __書式__：fetchメソッド
> ```
> PDOStatementオブジェクト->fetch();
> ```

このメソッドの返り値はテーブルの一つのレコードのデータが入った配列変数です。
```print $re;``` 
と書いてある行を次のコードに変えてください。
```
$kekka = $re->fetch();
print $kekka;
```
この「$kekka」変数をプリントすると「Array」と表示されます。これはデータ型が配列だということを伝えています。
この配列の中身をみていきましょう。```print $kekka```を
```
print $kekka[0];
print $kekka[1];
print $kekka[2];
```
に変えてみてください。テーブルtb1の一つ目のレコードの内容をみることができました。全て表示するには次のようなループが効果的です：
```
while($kekka = $re->fetch()) {
    print $kekka[0];
    print $kekka[1];
    print $kekka[2];
}
```

このループは$reの中にデータがある分だけ繰り返されます。このままだとプリント文が全て結合されて表示されてしまいます。きれいに表示されるようにプリント文の工夫をしてみましょう。

### try-catchでエラー処理
さて、ここまで詳細を無視しながら書いていたコードがあります。
「try-catch」文と言ってエラー処理のためにとても便利なツールがPHPにあります。
> __書式__：try-catch構文
> ```
> try {
>       例外が発生するかもしれない処理
> } catch(例外の名前　例外を受け取る変数） {
>       例外が発生した時の処理
> }
> ```

ここまで行ってきた方法は、例外が発生した場合、例外をプリントするという簡単な処理でした。
実際アプリケーションを作っていくときはここでプリントするのではなく、例外が起こってもユーザが問題なく使用し続けるように処理を行います。
