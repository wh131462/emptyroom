<?php
header("Content-type:text/html;charset=utf-8");
//时间接口 获取学校时间
require_once("function.php");
$sj=unicodeDecode(getSJ());
$day=substr($sj,9,9);
preg_match("/.*\s(.*)\s.*/i",$sj,$xq);
preg_match("/第.*?周/",$sj,$week);
$json=json_encode(array("wholeSJ"=>$sj,"xq"=>$xq[1],"week"=>$week[0],"day"=>$day));
echo $json;
?>