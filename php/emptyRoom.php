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
"__VIEWSTATE"=>"yNZaIQd9f/0p0N1OHIz0athiSgqJoRV4Ka4FB+MElzQU276LEMLNCdBqCpN6nyhVWpyrrj7KOPBXqyIyukh4A7Ry5N3zKC3AQoDpeXz5K3+4UijB3L7mrb+KojecNKnJAq+/ZQTwcoD+zenEZNFP9d+xUFijB4RR/fsbLpk03GcErWkxrHqVlzBVueY4Vpe8p3R4orDvoCMK2PG93J7YVWTykIYbaQ6G2dweyy69RcsUUGZvrGsfp0Ebp6A4wdyUwfaClRc9pZ9f5EPe1Ty8+9yfvKC2m0YJxI6xQpgiEnx0JoELN9PvEAPBUCoifm5IzuGgScL1I36ie9aq2CA0nSeFKxf90eWPVMjpTy01KTBjzBRX4C861CgDUhxPFs75e3UOvfUPKAqm/LyynYhcC8FFMJgQwNs4gjz9nRC+fCfOP0enyeuPJR9pBWsDCVYXv4+o3TY9m7dv5Bniq50K+lrfgGDnXRD6nuWBLSmWqikVVBapBan/VTWDU8fB114dZivAH/GvZ0U5BMZmCy9XySrAP+BkHTz5PdVuDuHoA7rwE8xpJOxyDKRmbn+whmYcZ+pJTleg5OrrqhYb02WViagPtk6dXDMn9Gu17vqOTlSQGhAdcNk0RfZ1jxHzLdi1UAExAOn+tUsANYNRgcO1atWWR/xNkEqK7xYIBijXlWdYZC6kVJexhke5gAR8gV/5Egf8OmUkryUPvRGEw+C3AY4bwYaKXNX3Hvrx+Fw+6yeLw+awTJCu7Lyj81yvPiZlye8xkcaYZopBzln5mmk2Sjw7MUir56ZL9kfNZGG32yRUE4aYOvALbhbIEuviDEET8xhPgNFds1N1B02edibSgopLuFV0VT2Vh2lT9MaHvKORebII9rw6voMYkQD2YrtplD8WPV2yCHJuE6C3DxcNfSmOvrE0bEmG0GnZZmFAZMjO9c1EMJ7t+h44rvw59udaaiD8GzjnQvxtPk04KRPq0sb6gtw1sRm/hcMgQRk2Wms3Q5/JlvshtJjRShAuBLo805+zcnALS0t340kNf/jMcj8O8PNUgxIhZgX9ZeS2gJtMuU9+1BJOeuJipbLIIww4+8UV6toNDWQXS+DDMLHOfDMEXkVZi2RSUDVCLhzGplOHIelwmcDI6UsxSRvz+XqnPNYAmbuKltuwYVC3QcbFG3GW6PPhYcXsUPoBDHudActEgMh1T0vwneNfW8BmmESF687IfOAI5o0GAKdlchB99zZqLbdYSoWhr4wQ+Y24cUIjiVwZwSHJ6N2Z01mWX8UIas6ERWV3sbG7d5h4EVekbnxhZEpDxDJ47J7ZMdIeQ1gYA2tlt1YV62SgW4HESFjIQH0Lm1aFf2ugX7yOFDbnAK8wz6p7eDYDIhxpLym9r7575w0xveI1/MyuwpERvGbkStH8IfO6+lCykekY+odbcJRpNxtABYXRVG0Fc+7D8ukCaIilMrYi0qQlmlLdJR6dzppxp9rPLC91j9xjErZKrx5Hd2HdXy7MV9AXU8KhRQmnDcsrKU6EFr9BovCfSFa2VwIdlbuwvPCuf/+YWWEyPLG04Dhz0Yzk8Z+bqnQijVHinjGb+G3ujiLxaP8NC+63a9Kg/Mcgcb7unbcBmk2q5Pqy8PYypxP9oWJs/JkN6ko2lWIMMPcgrlgI7Bptz/jvnOAZEBDgTGWFFbJaDOldrMsLhHB5l7iW27f/cx04w+fi5viUwYC1SMG4g2+4Y/a2Pj6zvnP/1xBgy5A/vgvRIaLydj9j7ogTR18GZd3HbMLI7TInpbwmSth4ZUH5zF+w3Yo5Lxfj3PmlL1oH8NE7CHn7922PCvWz873twTZWE2SKnZlZUgRqvcviMkYHk15cGDuElrxJpiw+Yu9OKZWNaaONzWkSAu4NTmrol5CxWJr6EfNRmhZTr1LGgtXDp6uv3EQsQKI36KHMgccHBBFk0C6OfzcAF+/1FjQruKxn5JcPMrjO",
"__VIEWSTATEGENERATOR"=> "2D8A47A9",
"__EVENTVALIDATION"=> "DEm5VFtOiS7kjupH7DzOF60KyedR3jnd8FQ82AwGoSOWMcyqHbbiDptIcTIeUsTHVMdkZ3HspQvbxeUXCGlh1Df2aR2uMNWy1UykcyrnHYGsV2fQ4p0t0vkiUg8KuCNTkywXgt6F3MCO71JwqO9qD84c8mlrFyyAJBuaxBW/Xvw1KPhf7Ss4BpANusrfXgr5iimoQCtOvIlAI1jxGiDc1dOOt2SL/BGFr+pDxXy1SClgObrzjCiL6D0d/sSsiUhBnXW/AHWf6GZh/GdLocCucT4emrgncKPMy4zrqz6wAmEm95NL7tAm1ypDsfRPCyDicasNe2YqFgW8v+HKf/A2akfba1RA2nskUgwk5WygPSrmylGRW9RDrsAyQRFmKlBp15Hz/Nka3qrpQTncGFuVqHxXyhdvD59Ap72TJkffqrvph9FbobgDpxvmeb3hqOfKrex8QG07NvfN92N3zS9SS6zXLeHamkjA//lZq+kBinnJ6w+EqIAIrrujZvWOSCMg0Z2lvNKUgGNG7vbEyX4wsHs5hvqzHsd5wn3+jyVRuJ8zq8a3hYQwsymIwMxMeDzZv3NxVtdjh7n2d9bJ64C2gi4R3yGq4qvkPjp1aM+GCJm6pUA1gunVSGxIS3S1OaMR/Ugv+QJVOi5p91pOyE5Kj5aALmxKB1LKcvAx1Gk9q2VutcJR4+3zgsDbx92Za8igzE+jKgESoez2xLzRFlopuh2o0r5M/3nAkWJONoirM5AFtHrdwrw2sXCIxjf+lbhfmXQLU67OMU2IhQDz61/bWjiuhK2ey79Fahbp8/TasFZNvlc5ohSe+ChhbctiCEywG8texzGVPoRKnHx4DGPSWNKSH60tB3HA40TIQGZ5+dmBcDXA/PiZvjTkpWpQR51Wa8S4GL1pSH+JveQynIhasQMX41DpUwyCk95TAKNjwgdu+3s6t1uBMnL8vUnEnKpf5S0/jOea/7NUkpMoRMhRrHqGCbMAy+zPf+ZKP5SXJXrBdCsS/lN1jmrMqCizFUjFppvYCVORGPbQXyHPXul/6jf4tcqKvc3siiQ8ebJHe4PJkgUpWtaO4pcYWxbQ0+zSXHGctQPKU0BA91gTH4j3v1dQ+bOw2vKwJLGtwCKC9pgw/qWH6EITjQ/ECakToqaNSXldg1Lv/z7KGIfI3qVroI7KVbXAsgJoZu0QgsWhqerfcmv8ZXPQwsiDRB4IyRf4gHG9poBVBtl3jhGNnobob+D9KRHr4I6h9pl6F1KhcNH2B0rvKr0WbU8U9bpIStOy3UDfrUZv2FPxXZVZGI38XtlB06nrNu+u0WuIzXQBJr6a5HhwCGssA1gZefexlb6V9hxZYOnmEdwvwEUHhYVoeGpG7Ju8Rl+H7wkqp5lgG1uYfj4nSfTMpiTJazLKZA997hlHmgvQIor9x07f26g+EAJyCG0opXhF6g7lQILet58ZdqxX2ebvYEbYDZsa4xLHmg7T/p5NVEFY4+/QLHFTbvzde2zSuo1X8yzRA3x1IvHHve+jmnzYB3Ae4bHUThk+dlIbaL/ogvliQQLKEqu5N2m+yGZHopnFSg2KcHebiKEK/jVLO+pFZNZYhk932h/7JJ/iSMnPjDt2wq7BVVejoimfETamlwotdmm6eZS7BCNNmW3tv6IpwrshLjoVbiBAM+RQmoZ8h+Dhttry7vIWxqI4TqrrKqqVeigN5NGjad7OStJB0u4grdlYo8jsWk20FE6yfg==",
"__VIEWSTATEENCRYPTED"=>"",
"__ASYNCPOST"=> true,
"Btcx"=>"查询使用");
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
			$res[0]=$arr;
		}
		$cont++;
	}
	$arr=[];//小数组清空
	$cont=1;//计数器置零
	foreach($html->find('tr[class=dg1-item] td') as $key=>$value){
		$value=strip_tags($value);
		if($value!=null&&$cont%13!=1){
			if($value=="                                                                                                                                "){
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