<?php 
function RandomLine($txtfile, $num) {
$arr=file($txtfile);//请使用准确的文件名代替txt
$n=count($arr)-1;
for ($i=1;$i<=$num;$i++){//100的需要显示的行数的例子，不是100时请换为具体数
$x=rand(0,$n);
return $arr[$x];//随机显示一行
}
}
?>