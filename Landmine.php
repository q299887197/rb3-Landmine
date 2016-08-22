<?php

$high = 10;
$width = 10 + 1;
$landmine = 40; //炸彈數
$landmineNumber = 0; //周圍炸彈數量預設0

$arr = array();

for($i=0; $i<$high; $i++)  //寫出方塊
{
	for($j=0; $j<$width; $j++){
		$arr[$x][$y] = "";
	}
}

for($i=0; $i<$landmine; $i++) //炸彈亂數
{
	$x = rand(0, 9);  //座標亂數
	$y = rand(0, 9);

	for($j=0; $j<$i; $j++) //檢查重複
	{
		if ($x == $a[$j] && $y == $b[$j]) {  //座標重新亂數
			$x = rand(0, 9);
			$y = rand(0, 9);
			$j=0;
		}
	}

	$a[$i] = $x;
	$b[$i] = $y;

	$arr[$x][$y] = "M";  //給予炸彈
}

for($i=0; $i<$high; $i++)  //設定數字
{
	for($j=0; $j<$width; $j++){

		if (!$arr[$i][$j] == "M") {

			if ($arr[$i][$j+1] == "M") {  //上
				$landmineNumber++;
			}
			if ($arr[$i+1][$j+1] == "M") {  //右上
				$landmineNumber++;
			}
			if ($arr[$i+1][$j] == "M") {  //右
				$landmineNumber++;
			}
			if ($arr[$i+1][$j-1] == "M") {  //右下
				$landmineNumber++;
			}
			if ($arr[$i][$j-1] == "M") {  //下
				$landmineNumber++;
			}
			if ($arr[$i-1][$j-1] == "M") {  //左下
				$landmineNumber++;
			}
			if ($arr[$i-1][$j] == "M") {  //左
				$landmineNumber++;
			}
			if ($arr[$i-1][$j+1] == "M") {  //左上
				$landmineNumber++;
			}

			$arr[$i][$j] = $landmineNumber;
		}

		$landmineNumber = 0; //歸零

		if ($arr[$i][$width-2]) {
			$arr[$i][$width-1] = "N";
		}
		if ($arr[$high-1][$width-2]) {
			$arr[$high-1][$width-1] = "";
		}

		echo $arr[$i][$j];
	}
}
