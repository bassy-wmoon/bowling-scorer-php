<?php

$allScores = [
  1 => [1, 2],
  2 => [3, 4],
  3 => [5, 5],
  4 => [1, 2],
  5 => [3, 4],
  6 => [5, 5],
  7 => [1, 2],
  8 => [3, 4],
  9 => [5, 5],
  10 => [2, 8, 9]
];

$total = 0;
$isPreviousFrameSpare = false;
$spareTemp = 0;

for($i = 1; $i <= 10; $i++) {

    echo "===== ${i} フレーム=====\n";
    
    $scores = $allScores[$i];

    if ($i <= 9) {

        echo "1投目: $scores[0]" . " " . "2投目: $scores[1]\n";

        if ($isPreviousFrameSpare) {
            $total = $spareTemp + $scores[0];
            $isPreviousFrameSpare = false;
            echo "前フレームのtotal = $total\n";
        }
        
        if ($scores[0] + $scores[1] == 10 && !$isPreviousFrameSpare) {
            $isPreviousFrameSpare = true;
            $spareTemp = $total + $scores[0] + $scores[1];
            echo "spareTemp = $spareTemp\n";
            continue;
        }

        $total += $scores[0] + $scores[1];
        echo "現フレームのtotal = $total\n";

    } else {
        echo "1投目: $scores[0]" . " " . "2投目: $scores[1]" . " " . "3投目: $scores[2]\n";

        if ($isPreviousFrameSpare) {
            $total = $spareTemp + $scores[0];
            $isPreviousFrameSpare = false;
            echo "前フレームのtotal = $total\n";
        }
        
        if ($scores[0] + $scores[1] == 10) {
            $total += $scores[0] + $scores[1] + $scores[2];
            echo "現フレームのtotal = $total\n";
            break;
        }

        $total += $scores[0] + $scores[1];
        echo "現フレームのtotal = $total\n";
    }
}

?>