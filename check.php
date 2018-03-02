<?php
// 2 检查狗狗样本数据是否齐全

$tiXing = "体型";
$tiXingArray = array("巴鲁","折耳","佩奇","花轮","中分","赖皮","垂耳","灰太狼","飞机头","小短腿","刀刀耳","招风耳","天使 稀有","角鲸稀有","皮卡稀有","菠萝头稀有");

$huaWen = "花纹";
$huaWenArray = array("无","奶牛","冰凌","逆鳞","八字纹","散羽纹","霸气点","峡谷纹","耀斑稀有","鱼纹稀有","斑马纹稀有","两道杠稀有");

$yanJing = "眼睛";
$yanJingArray = array("小新","小纠结","小傻子","黑老大","小严肃","小脾气","小鄙视","小颓废","小可爱","小惊讶","小对眼","小杀气稀有","小头晕稀有","小海盗稀有","白眉斗眼稀有");

$yanJingSe = "眼睛色";
$yanJingSeArray = array("黄绿","灰色","柠檬","土黄","雪青","橙灰","孔雀绿","香苹果","青苹果","浅钴蓝","日落黄","康乃馨","紫丁香","异域红 稀有","夜光绿稀有","神秘紫稀有");

$zuiBa = "嘴巴";
$zuiBaArray = array("橄榄","呆萌","三瓣","撇嘴","甜蜜蜜","北极熊","小獠牙","美滋滋","熊出没","地包天","小虎牙","樱桃稀有","大胡子稀有","达利胡稀有","长舌头稀有");

$duPiSe = "肚皮色";
$duPiSeArray = array("米驼","深灰","浅灰","起司","白色","烟粉","肉色","淡青灰","灰豆绿","变异橙 稀有","异光蓝 稀有");

$shenTiSe = "身体色";
$shenTiSeArray = array("浅褐","中黄","牙黄","淡黄","米色","鹅黄","蓝莲","豆绿","春日青","爱琴海","宝石蓝","豆沙红","浅蟹灰","粉晶稀有","静谧蓝稀有","高级黑稀有");


$huaWenSe = "花纹色";
$huaWenSeArray = array("紫灰","蟹青","深褐","褐色","米驼","粉黄","浅粉","浅灰","赭石","深灰","月灰","紫罗兰","天蓝稀有","变异橙稀有");


include "simple_html_dom.php" ;//加载simple_html_dom.php文件    
    //$html = file_get_html('http://www.google.com/');//获取html                              
    //$dom = new simple_html_dom(); //new simple_html_dom对象   

	
//'./go1/2.html'
function writeDogFileInfo($dog_file){
	$html = new simple_html_dom();  
	$html->load_file($dog_file); 

	file_put_contents('info.txt',    trim($dog_file)   ."\n", FILE_APPEND);

	//<div class="dog-img" style="background-color: #F8BBD0;">
	$div = $main = $html->find('div[class=dog-img]',0); 

	//echo $div->attr['style'];

	file_put_contents('info.txt',    trim($div->attr['style'])  ."\n", FILE_APPEND);

	for($i = 0; $i < 8; $i++){
		$a = $html->find('li', $i); 
		//echo trim($a->plaintext());

		file_put_contents('info.txt',    trimall(trim($a->plaintext()))   ."\n", FILE_APPEND);
	}	
}

for($j = 1; $j <= 6; $j++){
	for($i = 1; $i < 20; $i++){
		//'./go1/2.html'
		$dog_file = "./go". $j . "/" . $i . ".html";
		writeDogFileInfo($dog_file);
	}
}


function trimall($str)//删除空格
{
    $qian=array("\r\n", " ", "　", "\t", "\n", "\r");
    $hou=array("",      "",  "",   "",   "",   "");
    return str_replace($qian,$hou,$str); 
}

/***

网页背景色<---->身体色

back-ground-cl

body    
	defs 体型  16种体型
	g    身体色
outline
mask


pattern 花纹 花纹色 肚皮色 12种花纹

     

  

eye
   eye-shape  眼睛  15种眼睛
   eye-color1 眼睛色
   eye-color2
   

nose-mouth    嘴巴  15种嘴巴

***/

?>