# ２０２０年度壱岐商業高校LAMP講座

## 授業内容

- CLIを使ったLINUXの操作
- MySQL、PHPの基本的な使い方
- LAMP構築を使ったサイト作り
- セキュリティの基礎
- Git/Github

## 参照

- [MySQL](#mysql)
- [HTML](#html)
- [PHP](#php)

### MySQL <a name="mysql"></a>

データベースを作成する

```mysql
mysql> CREATE DATABASE データベース名;
```

使用するデータベースを指定する

```mysql
mysql> use データベース名;
```

新しいテーブルの作成

```mysql
mysql> CREATE TABLE テーブル名(カラム名1 データ型1, カラム名2 データ型2, ... );
```

テーブルのカラム構造を表示する

```mysql
mysql> DESC テーブル名;
```

テーブルにレコードを挿入する

```mysql
mysql> INSERT INTO テーブル名 VALUES(データ1, データ2, ...)
```

指定したカラムにデータを挿入する

```mysql
mysql> INSERT INTO テーブル名(カラム1, カラム2, ...) VALUES (データ1, データ2)
```

カラムごとのデータを表示する

```mysql
mysql> SELECT カラム1, カラム2, ... FROM テーブル名;
```

条件に一致したレコードを削除する

```mysql
mysql> DELETE FROM テーブル名 WHERE 条件式;
```

文字列の曖昧検索

```mysql
mysql> SELECT 表示するカラム名 FROM テーブル名 WHERE 検索するカラム名 LIKE 検索文字列;
```

### HTML <a name="html"></a>

ヘッダータグ

```html
<h1></h1>
```

カスタムタグ

```html
<div></div>
```

改行

```html
<br>
```

リンク

```html
<a href="リンク先アドレス"></a>
```

画像タグ

```html
<img src="画像ファイルのアドレス" alt="画像の説明文" width="500" height="600">
```

### PHP <a name="php"></a>




[HTMLタグ機能別リファレンス](https://web-designer.cman.jp/html_ref/function_list/)

[CSS目的別リファレンス](https://web-designer.cman.jp/css_ref/function_list/)

[SQLコマンドリファレンス](https://qiita.com/shuyam/items/809ff4123d8dcb7321f9)

