<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IP-Sign 调用统计展示页</title>
</head>
<body>
<?php
$fileName = 'showcounter.txt';
$content = file_get_contents($fileName);
?>
    <div id="dd" align="center">
        <span>感谢您的关注!</span>
        <span>IP-Sign已经被调用了
            <?php
                 echo $content;//输出计数器
                ?>
            次！</span>
    </div>
</body>
</html>