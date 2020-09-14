<?php
header("Content-type:text/html;charset=utf-8");
require_once("function.php");
require_once("simple_html_dom.php");
// php文件 对首页进行一次访问 获取session 然后对课表网页带cookie进行访问  
if($_SERVER["REQUEST_METHOD"]=="POST"){
	// 空教室 网址http://172.16.129.117/web_jxrw/cx_kb_jseskfb_sj.aspx 每个学期 要更新ViewState
	$URL="http://172.16.129.117/web_jxrw/cx_kb_jseskfb_sj.aspx";
	$COOKIEJAR=dirname(__FILE__)."/COOKIE/cookie.txt";
	$ER=array("ScriptManager1"=> "UpdatePanel7|Btcx",
"DDxq"=> $_POST["xq"],
"DDlh"=> $_POST["jxl"],
"DDskz"=> $_POST["week"],
"DDzc"=> $_POST["day"],
"Txtrq"=> "",
"__EVENTTARGET"=>"",
"__EVENTARGUMENT"=>"",
"__LASTFOCUS"=>"",
"__VIEWSTATE"=>"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",
"__VIEWSTATEGENERATOR"=> "2D8A47A9",
"__EVENTVALIDATION"=> "eK0GTHX+XBik5HcLAlUwoaaspyHPFWC1nXMhMHSkx6Uttk4udk9Me9JcHjRVcK+NFb2Sh0niB5H9k+1u8P+p6ANmQ71ah6NkYxjIMs/E99Ro/86efSgjIEQjNPMUQQ3hDb1YluVUufmRyYcR0tvdKYRXC5t+K4z54HUeI+Mlh3uHAXjXZpotXn9zTBIbENZLtAd02dK4yJGYQIzt7/pZEun4y0LIqwqq15pAgvRjwVqmfK+3M02NSxdFvARNhbgNOT1brorSHAZLToh1ZwhKusENe4tYsP3tMxaBUZYad+iM1982HMbqI9NMAmy5SBi+inn81uU8lZpCRfRAxNyBRvuKXJwi6mFt6zb0/4gfK4nWynDEK8mLQr/B429aJgK7XEgiBko5iIpcYqEQJcQUDE6SwWJvCD6l99SoElWgNJgFRqtGi1Fm7zLujj6VLdVPH2w1ltwQoNk+CfC4SDwSllFZShqT4IvCEl9XLYHrzCIDsvv6khtqzMGXaULt1IHBuqgE2rXvNKh1Ro9hOvE/KMjO9lUbvidb+ug/E4AvG1h6ENhHanVyC/MgIsu4P4s63jWcHn70asVs3QuvtPy6PiV/DjVRiNa5Dh5w7bdgofY7iWxSJXGppyPCIQqwCFOKpRCPKfDVEx7SJEOV9dLefPJ5OWVPrbIvX7m+4otMifHAMVFCoqZ5JFk1YTEAqiXt6sYXl2j+S6tNc0xcwzeNJS09AHwMbPl5wH4bNWgbVKz5QrFLRv494hLm44HtcOz+azUjNU52Lokqakt3KGJhPddIUCB53OjG/X5LD8xTEeNg1lrgMXRWTjZxAszjZw2shn6nKT6/E1khOYZBmbFi55/JQcxVK0zO7Ytaw56BwI/rHqj8zsbBNM8fNVvD+2afN1ePzqMulvo7P2q/l9oCaQWUQbB4tndhc3k1Z4A703fOyBN5ZsE8mLRZ1+Wh8BlKLaD1kV0w6uwkIqm0u8FAgicyiNS0vhKSityg1NoD0KIk9ql/OUx50qR4TE5QAZK6qcmYN0a4Ey0QiOa7/kN3g9hGDnrBIsgaq1Nj2vva8amQZDqF2NPUA2JKl5xpO6XVpEpN5keTmrO33TqmmtMA5pahQ3b+xu4m0Njl9OaIYqdszunreBbF/ucJ5doDb8Y0FNgqtP440frf5S6tR6BoDPYWDYHea50b3wc7pncxFJ6h2H4g0ARI5lCUTGXJjUeWdKznswn1uJNKHE9ajxytJyVkpLlDD+95gmG4W1KpY5C4XQ49G7s/Q5+mNfFKBSegf/DSi6XJoLDE0LrxYR7xevimrM95EXD376q9eQjCRojF5Jg2gUPHS3MCmAeSMkLAeJQKy7sjCM8+0sq+ab1yy6jc9nq0eRNDCRjoZ2L9uoAUbeoA1spQHjnEt4zdyDELTBgoAlWR7qehsntc9ehEc03gIicmz6oIH7jG/N766B+mpm45Rillmc5F8ocKfhzrlXZP2g1QPh8I+gQbS/FjKMxT8qN43b8sxULBy5CSCX+54bmD4hJzokHpIwP03xCsiH2gUlDvhxHsMmYhJq5TgLEmYTWoGI2urfj0IUeS3D7uFwR/hi2k4Ugafi4f5oxe6GPSaU1vHF4zSforD4MugT3/aBZo7IbTZrLNHZXABKUKipPUJFfYlQ6NyutBuT3BR8O7PEH5FRevBWM9knWWMpE/IlT00xXmnx168zJZxvIet6dnBU+meG5soC9132oS6qwQTJyzrCyzWjt/9xhpmreo9EHzrMOYvDqtHmKkXNie+IDUD8fGJ9LE1dDNnVl/HOjtTQ==",
"__VIEWSTATEENCRYPTED"=>"",
"__ASYNCPOST"=> true,
"Btcx"=>"查询使用");
// __VIEWSTATE和 __EVENTVALIDATION如果查询不到 请尝试在$URL所在地址进行抓包更新
	$fp=fopen(dirname(__FILE__)."/COOKIE/cookie.txt","w");
	fclose($fp);
	getSession();//获取session
	$res=_require($URL,$COOKIEJAR,"POST",$ER);//获取反馈页面
	$html=str_get_html($res);//网页原文转对象
	$cont=1;//计数器
	$arr=[];//小数组
	$res=array();//大数组
	$row=1;//行计数器
	foreach($html->find('tr[class=dg1-header2] th') as $key=>$value){
		$value=strip_tags($value);
		array_push($arr,$value);//表头部分
		if($cont%13==0){
			array_push($arr,"第 13 节");
			$res[0]=$arr;
		}
		$cont++;
	}
	$arr=[];//小数组清空
	$cont=1;//计数器置零
	foreach($html->find('tr[class=dg1-item] td') as $key=>$value){
		$value=trim(strip_tags($value));
		if($cont%13!=1){
			if(!$value){
				array_push($arr,"N");//空教室
			}else{
				array_push($arr,"Y");//非空
			}
			
		}else if($value!=null&&$cont%13==1){
			array_push($arr,$value);
		}
		if($cont%13==0){
			if($cont==13){
				//置空操作 不保存第一行空数组
				$arr=[];
			}else{
				array_push($arr,$arr[12]);
				$res[$row]=$arr;//压入数组并清空小数组
				$arr=[];
				$row++;
			}
		}
		$cont++;
	}
	$json=json_encode($res,true);
	echo $json;
}else{
	echo "What you are doing is illegal access.Please quit this website.<br>你正在进行的是非法访问，请退出此网站。";
}
?>