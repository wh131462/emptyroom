<?php 
// 主要php功能函数  请求网址
function _require($URL,$COOKIE_JAR,$METHOD,$DATA){
	/*URL 访问网址  
	 COOKIE_JAR cookie存储位置 默认 dirname(__FILE__)."/cookie.txt";
	 METHOD 数据发送方式 有POST GET 
	 DATA 数据以键值对的形式存放  形式：array("UserName"=>$username,"Password"=>$password);
	*/
	$ch = curl_init ();
	curl_setopt($ch, CURLOPT_URL,$URL); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 500); 
	curl_setopt($ch,CURLOPT_NOBODY,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
	$COOKIE_JAR!=null?curl_setopt($ch, CURLOPT_COOKIEJAR, $COOKIE_JAR):"";//非空执行
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	$METHOD=="POST"?curl_setopt($ch, CURLOPT_CUSTOMREQUEST,$METHOD):""; 
	$METHOD=="POST"?curl_setopt($ch, CURLOPT_POSTFIELDS,$DATA):""; 
	$OUTPUT=curl_exec($ch);
	curl_close($ch);
	return $OUTPUT;
}
function getSession(){
	//登录账号已进入教务信息系统  务必将cookie存储位置主人给www-data
	$LOGINURL="http://172.16.129.117/";//登录界面
	//$LOGINAFTERURL="http://172.16.129.117/index3.aspx";//登录后界面
	$COOKIEJAR=dirname(__FILE__)."/COOKIE/cookie.txt";//cookie存储位置 
	$login=array("__VIEWSTATE"=>'/wEPDwUKMTI4NTg4NzczNw9kFgICAw9kFgQCAQ8PFgIeBFRleHQFMuS7iuWkqeaYrzoxOS0yMC0x5a2m5pyfICDnrKww5ZGoICAgMjAxOeW5tDnmnIgx5pelZGQCCw8WAh4JaW5uZXJodG1sZWRkV/4PnrPXqB8vW2LM5TDTgm2vbKQ=',
	"__VIEWSTATEGENERATOR"=>'8A3D921F',
	"__EVENTVALIDATION"=>'/wEdAAZM3DYnfH80uu3JlBUip0gsR1LBKX1P1xh290RQyTesRVwK8/1gnn25OldlRNyIedlIxghH0jev8NKg8v7JEe6mTIBERddB7WWz31lD9JIgUQDxgssP0lqr+WxJYU9W6nuoK8PYi9Bii1sLyF1Mn6NFU03dRw==',
	"UserName"=>"201809501003",
	"Password"=>"11220916",	
	"getpassword"=>"登陆");
	_require($LOGINURL,$COOKIEJAR,"POST",$login);
}
function getSJ(){//获取时间
	$json=_require("https://gxust-yiban.com:10086/php/action.php?username=201809501003&password=11220916","","","");
	$JSON=json_decode($json);
	header("Content-Type: text/html; charset=UTF-8");
	return $JSON->sj;//直接返回sj
}
//unicode 编码
function UnicodeEncode($str){
    //split word
    preg_match_all('/./u',$str,$matches);
	
    $unicodeStr = "";
    foreach($matches[0] as $m){
        //拼接
        $unicodeStr .= "&#".base_convert(bin2hex(iconv('UTF-8',"UCS-4",$m)),16,10);
    }
    return $unicodeStr;
}
//unicode解码
function unicodeDecode($unicode_str){
    $json = '{"str":"'.$unicode_str.'"}';
    $arr = json_decode($json,true);
    if(empty($arr)) return '';
    return $arr['str'];
}
?>