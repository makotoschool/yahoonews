<?php
$s=isset($_POST['select'])?$_POST['select']:'';
$url ='http://news.yahoo.co.jp/pickup/'.$s.'/rss.xml';
$results=simplexml_load_file($url);
/*
echo '<pre>';
print_r($results);
echo '</pre>';
*/

$svalue=array(
'domestic'=>'国内',
'world'=>'海外',
'economy'=>'経済',
'entertainment'=>'エンターテーメント',
'sports'=>'スポーツ',
'computer'=>'コンピューター'
);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="./css/main.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
<title>yahooトピックス検索api</title>
</head>
<body>
<div class="container">
	<h1>yahooトピックス検索api</h1>
	<div class="controll">
		<form method="post" action="" id="selectg">
			<select name="select" onChange="document.getElementById('selectg').submit();">
				<?php foreach($svalue as $v=>$n):?>
					<?php if($s==$v):?>
						<option value="<?=$v ;?>" selected><?= $n?></option>
					<?php else:?>
						<option value="<?=$v ;?>"><?= $n?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</form>
	</div>
	<div class="content">
		<?php foreach($results->channel->item as $result):?>
				<a href="<?= $result->link ;?>" target="blank"><h2><?= $result->title; ?></h2></a>	
		<?php endforeach; ?>	
		

	</div>
</div>
</body>
</html>