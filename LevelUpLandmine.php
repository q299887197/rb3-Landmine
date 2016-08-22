<?php

$iTime1 = microtime(true);

$high = 50;
$width = 60;
$landmine = 1500; //炸彈數

$Rand = array(); //定義為陣列
$arr = array();

function newTable($high, $width, $landmine)
{
	for($i = 0; $i < ($high*$width); $i++)  //給炸彈1~3000  1~500 500~2999
	{
		if ($i < $landmine) {
			$Rand[$i] = "M";
		} else {
			$Rand[$i] = "";
		}

	}

	shuffle($Rand); //將陣列洗牌

	$count = 0;

	for($i = 1; $i <= $high; $i++)  //寫出方塊
	{
		for($j = 1; $j <= $width; $j++){
			$arr[$i][$j] = $Rand[$count];
			$count++;
		}
	}

	return $arr;
}

$arr = newTable($high, $width, $landmine);


for($i = 1; $i <= $high; $i++)  //設定數字
{
	for($j = 1; $j <= $width; $j++){

		if ($arr[$i][$j] != "M") {

			$landmineNumber = '0'; //周圍炸彈數量預設0

			if ($arr[$i][$j+1] === "M") {  //上
				$landmineNumber++;
			}
			if ($arr[$i+1][$j+1] === "M") {  //右下
				$landmineNumber++;
			}
			if ($arr[$i+1][$j] === "M") {  //右
				$landmineNumber++;
			}
			if ($arr[$i+1][$j-1] === "M") {  //右上
				$landmineNumber++;
			}
			if ($arr[$i][$j-1] === "M") {  //下
				$landmineNumber++;
			}
			if ($arr[$i-1][$j-1] === "M") {  //左上
				$landmineNumber++;
			}
			if ($arr[$i-1][$j] === "M") {  //左
				$landmineNumber++;
			}
			if ($arr[$i-1][$j+1] === "M") {  //左下
				$landmineNumber++;
			}

			$arr[$i][$j] = $landmineNumber;
		}

		$landmineNumber = '0'; //歸零

		echo $arr[$i][$j];
	}

	if ($i != $high) {  //最後不給N
		echo "N";
	}

	// echo "<BR>";
}

$iTime2 = microtime(true);
// echo $iTime1 - $iTime2 ;
