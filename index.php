<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimal-ui">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<?php $number = (!empty($_GET['number']) && is_numeric($_GET['number']) ) ? (int)$_GET['number'] : '数'; ?>
	<title>(<?php echo $number; ?>)の詳細</title>
	<style>
	::selection{background-color:#000;color:#FFF;}
	::-moz-selection{background-color:#000;color:#FFF;}

	.form-control{ display:inline; width:100%; }
	.dl-horizontal dt, .dl-horizontal dd{ text-overflow: initial; white-space: initial; }
	</style>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>
				<?php echo $number; ?>の詳細 <small>を求める</small>
			</h1>
			<hr>
			<?php if($number == '数'){ ?>
				<form action="" method="GET">
					<input type="text" name="number" placeholder="数を入力" class="form-control">
					<input type="submit" class="btn btn-success" value="調べる">
				</form>
			<?php }elseif(!is_numeric($number)){ ?>
				<div class="alert alert-danger" role="alert">数値ではありません！<a href="index.php">もどる</a></div>
			<?php }else{ ?>
			<?php
			$number1 = $number-1;
			$number2 = $number+1;
			$number3 = $number*2;
			$number4 = $number/2;
			
			//素数判定
			//素数フラグ
			$is_sosu = false;
			$is_not_sosu = false;
			if($number == 2){
				$is_sosu = true;
			}elseif($number < 2){
				$is_not_sosu = true;
			}
			if(!$is_sosu && !$is_not_sosu){
				$niii = $number % 2;
				if($niii == 0){
					$is_not_sosu = true;
				}
			}
			if(!$is_sosu && !$is_not_sosu && $number > 3){
				$is_sosu = true;
				for($n = 3; $n < $number; $n++){
					if($number % $n == 0){
						$is_not_sosu = true;
						$is_sosu = false;
						break;
					}
				}
			}
			if($is_sosu || $is_not_sosu){
				$number5 = ($is_sosu) ? '<span style="color:red;">素数です。</span>' : '素数ではありません。';
			}else{
				$number5 = '判定できませんでした。';
			}

			$one = $number*2;
			$two = $number*3;
			$sree = $number*4;
			$for = $number*5;
			$five = $number*6;
			$six = $number*7;
			$seven = $number*8;
			$nine = $number*9;
			$eite = $number*10;
			$ten = $number*11;

			$number7 = $one.",".$two.",".$sree.",".$for.",".$five.",".$six.",".$seven.",".$nine.",".$eite.",".$ten;
			
			$number6 = $number*$number*3.14;
			
			//約数を求める
			function yakusuu($iii){
				for($num = 1; $num < $iii; $num++){
					if($iii % $num == 0){
						echo $num.", ";
					}
				}
				echo $iii;
			}

			function soinsuu($ii){
				$i = 2;

				do {
				    $remainder = $ii % $i;

				    if ($remainder === 0) {
			        $answer[$i]++;
			        $ii /= $i;
			        $i = 2;
			    } else {
			   	     $i++;
			   	}

				} while ($ii !== 1);

				foreach ($answer as $key => $val) {
				    $view[] = sprintf('%d<sup>%d</sup>', $key, $val);
				}

				echo implode(' x ', $view);
			}
			$number8 = pow($number,2);
			$number9 = sqrt($number);

			echo '<dl class="dl-horizontal">';
			echo "<dt>入力した数値</dt><dd>".$number."</dd>";
			echo "<dt>前の数</dt><dd>".$number1."</dd>";
			echo "<dt>次の数</dt><dd>".$number2."</dd>";
			echo "<dt>2倍にした数</dt><dd>".$number3."</dd>";
			echo "<dt>2でわった数</dt><dd>".$number4."</dd>";
			echo "<dt>".$number."の2乗(".$number."<sup>2</sup>)</dt><dd>".$number8."</dd>";
			echo "<dt>素数かどうか</dt><dd>".$number5."</dd>";
			echo "<dt>倍数(10個)</dt><dd>".$number7."</dd>";
			echo "<dt>約数の一覧</dt><dd>";
			yakusuu($number);
			echo "</dd>";
			echo "<dt>√".$number."</dt><dd>".$number9."</dd>";
			echo "<dt>素因数分解すると？</dt><dd>";
			soinsuu($number);
			echo "</dd>";
			echo "<dt>".$number."を半径とした時の円の面積</dt><dd>".$number6."</dd>";
			echo "</dl>";

			?>
			<p>
				<a href="index.php"><button class="btn btn-success">＜もどる</button></a>
			</p>
			<?php
			}
			?>
		</div>
	</div>
</body>
</html>