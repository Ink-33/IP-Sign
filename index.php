<?php
header("Content-type: image/PNG");//设置文件头
include 'function.php';//加载include.php
$im = imagecreatefrompng("sign-40.png");
$weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组

//获取来路IP
//$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];//使用Cloudflare请去掉本行注释，其它CDN请查阅CDN提供商的文档
$ip = $_SERVER['REMOTE_ADDR'];//若使用上一行配置请注释本行

//调用数统计
$fileName = 'showcounter.txt';
$max= 9;
if (!is_file($fileName)) {
    touch('showcounter.txt
');
    $file = fopen($fileName, 'rb+');
    fwrite($file, 1);
    fclose($file);
    return ;
} else {
    $file = fopen($fileName, 'r');
    $content = fread($file,$max);
    fclose($file);
    $file = fopen($fileName, 'w');
    $content++;
    fwrite($file, $content);
    fclose($file);
}

//调用量输出
$count = file_get_contents($fileName);

//获取当前网址
$url = $_SERVER["HTTP_REFERER"]; //获取完整的来路URL
$str = str_replace("https://","",$url); //去掉http://
$strdomain = explode("/",$str);  // 以“/”分开成数组
$wangzhi = $strdomain[0];//取第一个“/”以前的字符

//向ip接口发起查询
$ipurl='https://api.ip.sb/geoip/'.$ip; 
$data = get_curl($ipurl);
$ipdata = json_decode($data, true);
$city = $ipdata['city'];
$region = $ipdata['region'];
$country = $ipdata['country'];

//定义颜色
$black = ImageColorAllocate($im, 0,0,0);//定义黑色的值
$red = ImageColorAllocate($im, 255,0,0);//红色
$aqua = ImageColorAllocate($im, 1,184,255);//水色
$muse = ImageColorAllocate($im, 233, 80, 175);//缪色
$fav = ImageColorAllocate($im, 0,150,255);//好康的
$font = 'yydzst.ttf';//加载字体

//输出
imagettftext($im, 17, 0, 10, 35, $muse, $font,'来自'.$country.''.$region.''.$city.'的朋友');
imagettftext($im, 16, 0, 10, 72, $muse, $font, '今天是'.date('Y年n月j日').' 星期'.$weekarray[date("w")]);//当前时间添加到图片
imagettftext($im, 16, 0, 10, 104, $muse, $font,'您的IP是:'.$ip);//ip
imagettftext($im, 16, 0, 10, 140, $muse, $font,'您正使用'.$os.'操作系统');
imagettftext($im, 16, 0, 10, 175, $muse, $font,'您正使用'.$bro.'浏览器');
imagettftext($im, 14, 0, 10, 205, $fav, $font,'感谢访问'.$wangzhi.',签名已被调用'.$count.'次'); 
ImagePNG($im);
ImageDestroy($im);
?>
