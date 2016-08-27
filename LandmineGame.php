<?php

$iTime1 = microtime(true);

$high = 10;
$width = 10;
$landmine = 40; //炸彈數

$Rand = array();
$arr = array();
$arrOK = array();

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
	return $arr;
}

$arr = newTable($high, $width, $landmine);
$arr = examineM($high, $width, $arr);

$iTime2 = microtime(true);
// echo $iTime1 - $iTime2 ;


?>

<html>
	<head>
		<title>踩地雷</title>
		<h1 align="center">踩地雷</h1>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="utf-8">

		<script type="text/javascript">
			var landmine = '<?= $landmine ?>'-1 ;
			var tableNumber = '<?= $high*$width-$landmine ?>'-1 ;
		// alert("123");

			function clickTable(x,v)
			{
				if (v != "M") {
				document.getElementById(x).style.backgroundColor = "#5599FF" ;
				document.getElementById(x).value = v;
				document.getElementById("tableNumber").innerHTML = tableNumber-- ;

				}


				if (v == "M") {

					document.getElementById(x).style.backgroundColor = "#FF0000" ;
					document.getElementById(x).value = "87";
					document.getElementById("landmine").innerHTML = landmine-- ;
					// alert('踩到地雷啦87');
				}

			}

			function resetTable()
			{

			}

		</script>
		<body>
			<table border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
				<tr>
					<td width="30" align="center" bgcolor="#77FF00"><font color="#000000"></font></td>
					<?php for($i = 1; $i <= $width; $i++){ ?>
			        <td width="30" align="center" bgcolor="#77FF00"><font color="#000000"><?= $i ?></font></td>
			        <?php } ?>
				</tr>

				<?php  for($j=1; $j <= $high; $j++) {   ?>
				<tr>
					<td align="center" bgcolor="#77FF00"><font color="#000000"><?= $j ?></font></td>
					<?php for($i = 1; $i <= $width; $i++){ ?>

					<td align="center" valign="baseline" bgcolor="#FFFFFF">
						<input type="button" id="<?= $j.$i ?>" value=" " onclick="clickTable(<?= $j.$i ?>, '<?= $arr[$j][$i] ?>')" style="width:50px; height:50px"/>
					</td>

					<!--<td width="30" align="center" valign="baseline" bgcolor="#FFFFFF"><font color="#000000"><?= $row[$i] ?></font></td>-->
					<?php } ?>
				</tr>



				<?php } ?>
			</table>
			<br>
			<center><input align="center" type="button" value="重玩" onclick="resetTable()" /></center>
			<br>
			<div>炸彈剩餘數<p id="landmine"><?= $landmine ?></p></div>

			<p id="tableNumber"><?= $high*$width-$landmine ?></p>
			innerHTML
		</body>



	</head>
</html>
http://wp.mlab.tw/?p=375