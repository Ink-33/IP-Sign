# IP-Sign
生成带来访者的地理位置(基于IP)，IP，系统版本，浏览器版本的图片。</br>
效果如下(此处可能会显示Github的IP)</br>
<a href="https://sign.quhyu.xyz/" target="_blank"><img src="https://sign.quhyu.xyz/"/></a>
<h2>灵感来源</h2>
本作品基于<a href="https://github.com/xhboke/IP" target="_blank">xhboke/IP</a>进行了修改。完成的差不多后便开个源。
<h2>主要修改部分</h2>
1:更换了IP的查询接口，新接口为<a href="https://api.ip.sb/" target="_blank">https://api.ip.sb/</a>，此接口支持识别IPV6地址的地理位置，但返回值为英文(例如ChinaJiangsuNanjing)</br>
2:增加了对使用Cloudflare站点的支持(在index.php中uncommit对应参数)</br>
3:更换了背景图片与默认字体(现使用的是杨任东竹石体，免费商用)</br>
4:将天气功能独立(<a href="https://github.com/Ink-33/Weather-Sign" target="_blank">传送门</a>)</br>
5:增加了调用量统计功能(<a href="https://sign.quhyu.xyz/countershow.php/" target="_blank">DEMO</a>)</br>
<h2>我的博客</h2>
<a href="https://www.quhyu.xyz/" target="_blank">Ink33&ampLh Studio</a>