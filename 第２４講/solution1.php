<?php

print "第一問：<br><br>";
$tosi = 100;
$namae = "";

// 第１問：名前と年齢を紹介する文をプリントしてみてください。
print "初めまして。あなたの名前は{$tosi}で、年齢は{$namae}なんですね？";

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
    print "あいこ！";
} else if (($input == 1 and $enemy == 2) or 
           ($input == 2 and $enemy == 0) or 
           ($input == 0 and $enemy == 1)) {
    print "私の勝ち！";
} else {
    print "あなたの勝ち。";
}

/****************************************************************/
print "<br><br>";
/****************************************************************/

print "第三問：<br><br>";

$N = 15;
print "１から $N までの数字を全て足すと…　";

// 第３問：1から$Nまでの数字を全て足した数字を表示するコードを書いてみましょう。

$total = 0;
for ($i = 0; $i < $N; $i++) {
    $total = $total + $i;
}

print $total;

/****************************************************************/
print "<br><br>";
/****************************************************************/

print "第四問：<br><br>";
$len      = 25;
$hairetu1 = [];

print "次の配列 [";
for ($i = 0; $i < $len; $i++) {
    $n = rand(-50, 50);
    array_push($hairetu1, $n);

    print $n;
    if ($i != $len - 1) {
        print ", ";
    }
}
print " ] の最大値と最小値は…　";

// 第４問：$hairetu1の最大値と最小値を表示してください。

$max = $hairetu1[0];
$min = $hairetu1[1];

for ($i = 1; $i < $len; $i++) {
    if ($max < $hairetu1[$i]) {
        $max = $hairetu1[$i];
    }

    if ($min > $hairetu1[$i]) {
        $min = $hairetu1[$i];
    }
}

print $max.", ".$min;


/****************************************************************/
print "<br><br>";
/****************************************************************/

?>
