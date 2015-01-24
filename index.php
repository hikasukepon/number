<?php
$number = (int)$_GET['number'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, minimal-ui, user-scalable=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
	<title>(<?php
		if(empty($number)){
			echo "数";
		}else{
			echo $number;
		}
		?>)の詳細
	</title>
	<style>
	.form-control{
		display:inline;
		width:20%;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>
				<?php
				if (empty($number)) {
					echo "数";
				}else{
					echo $number;
				}
				?>の詳細
				<small>を求める</small>
			</h1>
			<hr>
			<?php
			if(empty($number)){
				?>
				<form action="" method="GET">
					<input type="text" name="number" placeholder="数を入力" class="form-control">
					<input type="submit" class="btn btn-success">
				</form>
				<?php
			}elseif(!is_numeric($number)){
				?>
				<div class="alert alert-danger" role="alert">数値ではありません！<a href="index.php">もどる</a></div>
				<?php
			}else{
				?>
				<dl class="dl-horizontal">
				<?php
				$number1 = $number-1;
				$number2 = $number+1;
				$number3 = $number*2;
				$number4 = $number/2;
			
				//素数判定
				if($number < 2){
					$number5 = "素数ではありません";
				}elseif($number == 2){
					$number5 = "素数です";
				}
				$niii = $number % 2;
				if($niii == 0){
					$number5 = "素数ではありません";
				}
				for($n = 3; $n <= $number; $n++){
					if($n == $number){
						$number = "";
						break;
					}
					if($number % $n == 0){
						$number5 = "素数ではありません";
						break;
					}else{
						$number5 = "素数です";
						break;
					}
				}

				$number6 = $number*$number*3.14;

				echo "<dt>入力した数値</dt><dd>".$number."</dd>";
				echo "<dt>前の数</dt><dd>".$number1."</dd>";
				echo "<dt>次の数</dt><dd>".$number2."</dd>";
				echo "<dt>2倍にした数</dt><dd>".$number3."</dd>";
				echo "<dt>2でわった数</dt><dd>".$number4."</dd>";
				echo "<dt>素数か</dt><dd>".$number5."</dd>";
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