<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSVデータ表示</title>
</head>
<body>

<table border='1'>
<tr><th>お名前</th><th>EMAIL</th><th>備考</th></tr>
 
<?php
 
if( ($fp = fopen("data/data.csv","r"))=== false ){
	die("CSVファイル読み込みエラー");
}
 
while (($array = fgetcsv($fp)) !== FALSE) {
	
	//空行を取り除く
	if(!array_diff($array, array(''))){
		continue;
	}
	
	echo "<tr>";
	for($i = 0; $i < count($array); ++$i ){
		$elem = nl2br(mb_convert_encoding($array[$i], 'UTF-8', 'SJIS'));
		$elem = $elem === "" ?  "&nbsp;" : $elem;
		echo("<td>".$elem."</td>");
	}
	echo "</tr>";
	
}
 
fclose($fp);
?>
 
</table>

</body>
</html>