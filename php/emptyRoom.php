<?php
header("Content-type:text/html;charset=utf-8");
require_once("function.php");
require_once("simple_html_dom.php");
// php文件 对首页进行一次访问 获取session 然后对课表网页带cookie进行访问  
if($_SERVER["REQUEST_METHOD"]=="POST"){
	// 空教室 网址http://172.16.129.117/web_jxrw/cx_kb_jseskfb_sj.aspx
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
"__EVENTVALIDATION"=> "sgLFKujYcSS99IfJw58cP9eKf9cBkm+ngfHACu5i1quvn3+G68Hg7Dlw6wfvWot5SRw3mui5alkFnkVInhN2AVCP5vN6IJRInEZ0UPn/F39kBhQUxMPH+iXXIGAi19sEU4KAsEnhi3YUyNlVeGoPReyMLeL1Ps9bFEeZMYpKFiNNiJhDeVFUCJQsJovbg760awAqaeYvAebXuGyJ0Lr+uv0e9MFC7/JPSdEtNgglhChGs7GeGRXOZpmkg38ImYkBlzC5rXMW0pJjNR4tGyJUesbqjVPTWwJ1DP9cyz0zni40GfKHDfBanmqPBu41pIHX1p3ooTh10oDDg8NoveqK4LqFbPS5lyKz9yJcprFoqCxBxRuFGQ7yWfEERvge74EHLQ2oZ4Fw5XnOsX+/10/fNxT9Tbprtn0LA2xlZ+YEWxhv8pJT2DH8BYS0ZMkui0G7PzNRaRa+NpOJiF1tkh6SF+EZs7lEppoKF0wi4ozEjw4gSZeXHoWIIucGq8KpAevvsZwa6KqSOwnnNOoJ+N03OQVMsXIxP4ECbD56F3ya7Gl/w6tSs8E9eafj42dDtmvRMmQNw5qWmMm5IkF/DYTm/25YjVTZCxwhu/nVDN9o3rpt73tj1sczqy5O3N4DPj6zsm+1lvPxdkHcSHa0fuN0skMhn2OOKphlr3/+nBOyY/8n3a9AiQIqZI+T/CXA1gA8d7y23IQ1v9qpJaBRue8i4JBJ+hjXdop9q2jdnv4HAdX3Qhi+ZF/y8R7raQrr26xoc6WoeW5P14NMUrOVpKDHuSdnu2h9BxCz/fV8iEZRcHIn/NrCtHj2m9DomLvO5c8ux+b+IzdIpPZohAqdEG6eGbdfvBfVxlZNOr/AAhsmiTg9oQFGxGDSNJjhmyxpoNPpBSc8yZg3f3B26HrSNL9PayIe8UU+ZncLlmu0VaJM6SHzoXSLpoh15nSF+xh/XrxshyCqHa0zlIECgnX6BTAWx+s1j83qfXXjY+oYmUaW3Ytg/gnK828W7Wl9JwdiJgp5+lVZ9IjBk1IYW+KRxplPfIUAx8UMvaDvKZDM1TK79Z4flzvanv/CGZXU+njAIKaG+Db17PFYUsx+qx6ztl65ebPJ4CfsB72PEtojsAz7ywB+8NMBiC16ideNHxAGbuCJKB4IfvRneuFVKvaMoT2veer1gX12uKatstEqfhJ/g4NFM3911a/+GdCtJlkWKzdZWpyt/7o/QB0NKhu0/uidWZuPdJw6p7p6HYfNL9ASUd/cgTHVu1eJ+XPqOr1ClkROZZ6hVWFa0n9q6QUv86PmS0BVUO+YAPRQCFSmjZ6p80MGtEJJUEzlA5vDtfvz/2VwFm6fJ7anI0/WfPvESr8aQo4o2zzAOS5U/1OFd49/Kz+ll52zVqTyyf9U4h0aIMlG2HjxTA3kpmKyUgiV8wDzcMiGhTToGq/+GHzc0H9ico6OTzVuIDIMkSQeDJBnqzEUyc7vfqnu03eTlpWu8cxcEzoYiEhYzQ57hNAy0raiXum6SHxagt4DjkwepdaQFsxhqsDSToo9RmWsi/ntfPnMitYK4ZtTafWxOvt8aRmyPacNu9hMJinteymUV52DdMh+BlUlHZj0hGz5In7aiflmasSb8ICH+hqQ7o0frfSyJ0g050euIRhzC3VDrO0PfDhIVEhs86V/UECu4oGSwFlbOPmRdkenVMTrswfpJqcYeAuri0iEgXM7sI+78b7EsTq6GHuiYLXkfs9BHd46Wh2/LEl0pEc=",
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