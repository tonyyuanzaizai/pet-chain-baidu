<?php
// 3 根据样本数据 生成svg 文件


function genSVGFile($html_file, $svgfile){
	$idx = 0;
	$file = fopen($html_file, "r") or exit("Unable to open file:".$html_file);
	//Output a line of the file until the end is reached
	while(!feof($file)){
		$str = fgets($file);
		$str = trim($str);
		$idx = strpos($str, "svgHtml");
		if($idx > 0){
			//echo $idx;
			$testStr = '<textarea id="svgHtml">123456</textarea>';
			
			$testStr = $str;
			file_put_contents($svgfile, substr($testStr, 23, -11));
			
			break;	
		}
	}
	
}

define( 'PATH_ROOT', dirname(__FILE__).'\\' );

//echo PATH_ROOT;

for($j = 1; $j <= 6; $j++){
	for($i = 1; $i < 20; $i++){
		$f = PATH_ROOT . "go" . $j . "\\" . $i . ".html";
		//echo $f;
		$svgfile = PATH_ROOT . "go" . $j . "\\" . $i . ".svg";
		genSVGFile($f, $svgfile);
		//exit(0);
	}
}
?>