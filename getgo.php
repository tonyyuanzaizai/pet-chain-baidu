<?php
// 1 下载 狗狗 样本
set_time_limit(0);


exec("mkdir go1");
exec("mkdir go2");
exec("mkdir go3");
exec("mkdir go4");
exec("mkdir go5");
exec("mkdir go6");



for($j = 1; $j <= 6; $j++){
	for($i = 1; $i < 40; $i++){
		exec("d:\soft\wget\wget.exe http://www.shiwusui.com/shuzigou/" . $j,$out);
		
		exec("copy " .$j . " go" . $j . "\\" . $i . ".html", $out);
		exec("del " . $j, $out);
	}
}





?>