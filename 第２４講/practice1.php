<?php

print "第一問：<br><br>";
$tosi = 100;
$namae = "";

// 第１問：名前と年齢を紹介する文をプリントしてみてください。
print "初めまして。あなたの名前は__で、年齢は__なんですね？";

/****************************************************************/
print "<br><br>";
/****************************************************************/

print "第二問：<br><br>";

print "ジャンケンしましょう。<br>";
// グー：0
// パー：1
// チョキ：2

$input = 1;
$enemy = rand(0, 2);
$janken = ["グー", "パー", "チョキ"];

print "あなたは $janken[$input] を出しました。私は $janken[$enemy] を出しました。<br>";
print "判定は… ";

// 第２問：$input変数を使ってジャンケンをできるように、入力の処理を書いてみましょう。
if ($input == $enemy) {

}

/****************************************************************/
print "<br><br>";
/****************************************************************/

print "第三問：<br><br>";

$N = 15;
print "１から $N までの数字を全て足すと…　";

// 第３問：1から$Nまでの数字を全て足した数字を表示するコードを書いてみましょう。


/****************************************************************/
print "<br><br>";
/****************************************************************/

print "第四問：<br><br>";
$hairetu1 = [1, 5, 2, 8, 16, -3];
$len      = count($hairetu1);

print "次の配列 [";
for ($i = 0; $i < $len; $i++) {
    print $hairetu1[$i];
    if ($i != $len - 1) {
        print ", ";
    }
}
print " ] の最大値と最小値は…　";

// 第４問：$hairetu1の最大値と最小値を表示してください。

/****************************************************************/
print "<br><br>";
/****************************************************************/

?>
