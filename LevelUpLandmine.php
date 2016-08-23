<?php

$iTime1 = microtime(true);

$high = 50;
$width = 60;
$landmine = 1500; //炸彈數

$Rand = array();
$arr = array();

/* 印出隨機炸彈地圖 */
function newTable($high, $width, $landmine)
{
	for($i = 0; $i < ($high*$width); $i++)  //給炸彈0~2999  0~1499 1500~2999
	{
		if ($i < $landmine) {
			$Rand[$i] = "M";
		}
		if ($i >= $landmine) {
			$Rand[$i] = "";
		}

	}

	shuffle($Rand); //將陣列洗牌 隨機炸彈位子

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

/* 檢查身旁炸彈數量 */
function examineM($high, $width, $arr)
{
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
}

$arr = newTable($high, $width, $landmine);
examineM($high, $width, $arr);

$iTime2 = microtime(true);
// echo $iTime1 - $iTime2 ;
