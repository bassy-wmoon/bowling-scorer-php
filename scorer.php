<?php

$allScores = [
  1 => [1, 2],
  2 => [3, 4],
  3 => [10, 0],
  4 => [1, 2],
  5 => [3, 4],
  6 => [10, 0],
  7 => [1, 2],
  8 => [3, 4],
  9 => [10, 0],
  10 => [10, 8, 2]
];

$total = 0;

for($i = 1; $i <= 10; $i++) {

    echo "===== ${i} フレーム=====\n";
    
    $scores = $allScores[$i];

    if ($i <= 9) {

        echo "1投目: $scores[0]" . " " . "2投目: $scores[1]\n";

        // ストライクの場合次の2投分を足す
        if ($scores[0] == 10) {
            $nextOne = $allScores[$i + 1][0];
            $nextTwo = 0;
            if ($nextOne == 10) {
                if ($i < 9) {
                    // 8フレームまでの場合次の次のフレームの1投目を取得する
                    $nextTwo = $allScores[$i + 2][0];
                } else {
                    // 9フレーム目の場合10フレーム目の2投目を取得する
                    $nextTwo = $allScores[$i + 1][1];
                }
            } else {
                $nextTwo = $allScores[$i + 1][1];
            }

            $total += $nextOne + $nextTwo;

        // スペアの場合次の1投を足す
        } else if ($scores[0] + $scores[1] == 10) {
            $total += $allScores[$i + 1][0];
        }

        $total += $scores[0] + $scores[1];
        echo "現フレームのtotal = $total\n";

    } else {
        echo "1投目: $scores[0]" . " " . "2投目: $scores[1]" . " " . "3投目: $scores[2]\n";
        
        // ストライクの場合次の2投分を足す
        if ($scores[0] == 10) {
            $total += 10 + $scores[1] + $scores[2];

        // スペアの場合3投目を足す
        } else if ($scores[0] + $scores[1] == 10) {
            $total += 10 + $scores[2];

        } else {
            $total += $scores[0] + $scores[1];
        }
        echo "現フレームのtotal = $total\n";
    }
}

?>