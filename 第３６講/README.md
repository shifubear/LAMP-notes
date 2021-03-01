# 第３６講

## GitHubデスクトップのダウンロード

https://desktop.github.com/

## FTPとSSHをする準備をしましょう

### FTP用クライアントのインストール

今使っているIPからのFTP接続を許可しましょう。以下のリンクで紹介されている手順を参考に設定をしましょう。

https://support.kagoya.jp/kir/manual/ftp_sec/index.html

FTP接続の許可ができたら、以下のリンクに紹介されている手順を参考に、FileZillaというソフトをインストールし、それを使ってファイル転送の準備をしましょう。

https://support.kagoya.jp/kir/manual/startup/ftp_account_settings.html#ftp

### SSH用クライアントPuTTYのインストール

できると色々と便利なので、SSHができるように以下の手順を参考にSSHクライアントをインストールしましょう。Windows用のSSHクライアントで人気のPuTTYというツールを使います。

https://support.kagoya.jp/kir/manual/ssh/putty_02.html

### SQLiteの準備

今までの授業ではMySQLを使用してきましたが、KAGOYAで標準搭載されているデータベース管理システムはSQLiteです。両方名前にSQLが入っていることから推測できるかもしれませんが、実はこの２つ使い方はとても似ています。細かい機能などは大事な違いがいくつかあるのですが、今回は気にせずに一緒に使っていきたいと思います。

それではみんなのパソコンからもテストができるように以下のコマンドを使ってSQLiteを使うのに必要なパッケージをインストールします。

```sh
$ sudo apt install sqlite3
$ sudo apt install php7.4-sqlite3
```

その後、PHPの設定ファイルである`php.ini`を変更します。

```sh
$ vim /etc/php/7.4/cli/php.ini
```

次のコマンドを入力します。

```
/pdo_sqlite
```

エンターキーを押して、選択された行の最初にある";"を消します。ここは少し操作が難しいので、一緒にやりましょう。

消せたら「:wq」と入力して、以下のコマンドを打ちます。

```bash
$ sudo systemctl restart apache2
```

---

そして、テスト用のデータベースも作っておきましょう。４つ目のコマンドで新しくテーブルを作るとき、テーブルの名前はkeijibanという字の後に苗字のイニシャルをつけてください（例えば先生の場合、福澤のFでkeijibanF).

共用サーバーではそれぞれが同じデータベースから別々のテーブルをアクセスする必要があるので、それぞれ別の名前のテーブルを作る必要があります。

```sh
$ cd /var/www/html/keijiban
$ mkdir db
$ touch db/db_file.sqlite3
$ sudo chmod 777 db
$ sudo chmod 776 db_file.sqlite3
$ sqlite3 db/db_file.sqlite3
sqlite> CREATE TABLE keijibanK (bangou INTEGER PRIMARY KEY UNIQUE, namae TEXT, message TEXT); 
```

---

次は`db_info.php`を少し変更します。

```php
$dsn = 'mysql:dbname=db1;host=localhost';
```

の行を次のように変更します。

```php
$dsn = 'sqlite:/var/www/html/keijiban/db/db_file.sqlite3';
```

---

その後、各ファイル`keijiban_select.php`, `keijiban_delete.php`, `keijiban_search.php`, `keijiban_insert.php` の次の行

```php
$dbh = new PDO($dsn, $username, $password);
```

を次のように変更します。

```php
$dbh = new PDO($dsn);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

---

最後に、各ファイルのクエリのターゲットのテーブル名を先ほど作ったものと同じにしましょう。例えば、`keijiban_insert.php`の

```sql
INSERT INTO keijiban_tb (namae, message) VALUES('".$name."', '".$message."');
```

を

```sql
INSERT INTO keijibanF (namae, message) VALUES('".$name."', '".$message."');
```

---

