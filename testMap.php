<?php
header("content-type: text/html; charset=utf-8");

$setHigh = 10;
$setWidth = 10;
$setLandmine = 40; //炸彈數

$getMap = $_GET['map'];

$removeN = explode("N", $getMap); //拆 N
$high = count($removeN); //抓 high

$removeM = explode("M", $getMap); //抓 width
$landmine = count($removeM) -1; //抓 炸彈數量

$msg = examineMap($setHigh, $setWidth, $setLandmine, $high, $landmine, $removeN); //檢查長寬高炸彈
$msg = examineM($high, $width, $removeN, $msg); //檢查數字

/* 檢查長寬高炸彈 */
function examineMap($setHigh, $setWidth, $setLandmine, $high, $landmine, $removeN)
{
	$error = true;

	for($i = 0; $i < $high; $i++)
	{
		$width = strlen($removeN[$i]); //抓取每行的寬度

		if ($width != $setWidth) {
			$error = false;
			echo "錯誤!!寬限制" . $setWidth . ", 您第". $i ."行的寬為:" . $width . "<br>";
		}
	}
	if ($high != $setHigh) {
		$error = false;
		echo "錯誤!!高限制" . $setHigh . ", 您的高為:" . $high . "<br>";
	}
	if ($landmine != $setLandmine) {
		$error = false;
		echo "錯誤!!炸彈限制" . $setLandmine . ", 您的炸彈數:" . $landmine . "<br><br>";
	}

	return $error;
}

/* 檢查身旁炸彈數量 */
function examineM($high, $width, $arr = array(), $error)
{


	for($i = 0; $i < $high; $i++)  //設定數字
	{
		for($j = 0; $j < $width; $j++){

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

				if ($arr[$i][$j] != $landmineNumber) {
					$error = false;
					echo "座標位子 ( " . $i . "," . $j . " ) 的" . $arr[$i][$j] . "有誤 <br> " ;
				}
			}

			$landmineNumber = '0'; //歸零
		}
	}
	return $error;
}

// for($i = 0; $i < $high; $i++)
// {
// 	echo $removeN[$i] . "<br>";
// }


if ($msg == true) {
	echo "檢查完畢,都正確" ;
}
