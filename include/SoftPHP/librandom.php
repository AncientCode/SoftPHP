<?php 
function RandomLine($txtfile, $num) {
$arr=file($txtfile);//��ʹ��׼ȷ���ļ�������txt
$n=count($arr)-1;
for ($i=1;$i<=$num;$i++){//100����Ҫ��ʾ�����������ӣ�����100ʱ�뻻Ϊ������
$x=rand(0,$n);
return $arr[$x];//�����ʾһ��
}
}
?>