<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
書き込みを行います。<br>
This is a Pen. とdata.csv に書き込みます。
</body>
<?php
$name = $_GET["name"];
$mail = $_GET["mail"];
$memo = $_GET["memo"];
$c = ",";
$str = $name.$c.$mail.$c.$memo;

// $str = date("Y-m-d H:i:s")."文字列";
$file = fopen("data/data.csv","w");	// ファイル読み込み a=追加書込、w=内容削除、書込
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $str."\r\n");   // ."\n"で改行
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>
<ul>
<li><a href="index_SN.php">index_SN.php</a></li>
</ul>
</body>
</html>