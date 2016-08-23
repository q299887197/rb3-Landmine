<?php
header("content-type: text/html; charset=utf-8");

$setHigh = 10;
$setWidth = 10;
$setLandmine = 40; //炸彈數

// if (isset($_GET['map'])) {
	$getMap = $_GET['map'];
	// $getMap = urldecode($_GET['map']);
	// $getMap = urldecode($getMap);
	// var_dump($getMap);
	// exit;

	$removeN = explode("N", $getMap); //拆 N


	$msg = examineMap($getMap, $setHigh, $setWidth, $setLandmine, $removeN); //檢查長寬高炸彈

	// if ($msg != false) {
		$msg = examineM($setHigh, $setWidth, $removeN, $msg); //檢查數字
	// }

	/* 檢查 長 寬 高 炸彈 */
	function examineMap($getMap, $setHigh, $setWidth, $setLandmine, $removeN)
	{
		$error = true;
		$mapNumber = strlen($getMap); //抓取字串長度

		$high = count($removeN); //抓 high

		$removeM = explode("M", $getMap);
		$landmine = count($removeM) -1; //抓 M炸彈數量

		$removeMm = explode("m", $getMap);
		$landminem = count($removeMm) -1; //抓 錯誤炸彈m數量

		$numberN = explode("N", $getMap);
		$N = count($numberN) -1; //抓 換行N數量


		if ($mapNumber != 109) { //判斷總長度
			$error = false;
			echo "不符合，長度限制109, 您的長度為:" . $mapNumber . "。";
		}

		if (!preg_match("/^([0-8MN]+)$/",$getMap)) { //判斷字元
			$error = false;
			echo "不符合，只能數字0-8,英文字母M, N 。";

			if (preg_match("/([m]+)/",$getMap)) {
				echo "發現您使用小寫m。";
			}
			if (preg_match("/([n]+)/",$getMap)) {
				echo "發現您使用小寫n。";
				exit;
			}
			if (preg_match("/([9]+)/",$getMap)) {
				echo "發現您使用的數字大於 8。";
			}
		}

		if ($N != $setHigh-1) {   //判斷N
			$error = false;
			echo "不符合，換行N限制". ($setHigh-1)  .", 您的N為: " . $N . "。";

		}

		for($i = 0; $i < $high; $i++) //判斷寬
		{
			$width = strlen($removeN[$i]); //抓取每行的寬度

			if ($width != $setWidth) {
				$error = false;
				echo "不符合，寬限制" . $setWidth . ", 您第". ($i+1) ."行的寬為: " . $width . "。";
			}
		}

		if ($high != $setHigh) {   //判斷高
			$error = false;
			echo "不符合，高限制" . $setHigh . ", 您的高為: " . $high . "。";
		}

		if ($landmine != $setLandmine) {   //判斷炸彈
			$error = false;
			echo "不符合，炸彈限制" . $setLandmine . ", 您的炸彈數M: " . $landmine . "。";
			if ($landminem) {
				echo "小炸彈m: " . $landminem . "。";
			}
		}

		return $error;
	}

	/* 檢查身旁炸彈數量 */
	function examineM($high, $width, $arr = array(), $error)
	{
		for($i = 0; $i < $high; $i++)  //設定數字
		{
			for($j = 0; $j < $width; $j++){

				if ($arr[$i][$j] != "M" && $arr[$i][$j] != "m") {

					$landmineNumber = '0'; //周圍炸彈數量預設0

					if ($arr[$i][$j+1] === "M" || $arr[$i][$j+1] === "m") {  //上
						$landmineNumber++;
					}
					if ($arr[$i+1][$j+1] === "M" || $arr[$i+1][$j+1] === "m") {  //右下
						$landmineNumber++;
					}
					if ($arr[$i+1][$j] === "M" || $arr[$i+1][$j] === "m") {  //右
						$landmineNumber++;
					}
					if ($arr[$i+1][$j-1] === "M" || $arr[$i+1][$j-1] === "m") {  //右上
						$landmineNumber++;
					}
					if ($arr[$i][$j-1] === "M" || $arr[$i][$j-1] === "m") {  //下
						$landmineNumber++;
					}
					if ($arr[$i-1][$j-1] === "M" || $arr[$i-1][$j-1] === "m") {  //左上
						$landmineNumber++;
					}
					if ($arr[$i-1][$j] === "M" || $arr[$i-1][$j] === "m") {  //左
						$landmineNumber++;
					}
					if ($arr[$i-1][$j+1] === "M" || $arr[$i-1][$j+1] === "m") {  //左下
						$landmineNumber++;
					}

					if ($arr[$i][$j] != $landmineNumber) {

						echo "不符合，座標位子 ( " . $i . "," . $j . " ) 的" . $arr[$i][$j] . "有誤,應是 " . $landmineNumber . "。";
						$error = false;
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
		echo "符合。" ;
	}

// }