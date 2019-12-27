//ERjs 
function sub(formid){
	var form="form"+(formid==1?1:"");
	// var postData={
	// "jxl":document.getElementsByName("jxl")[0].value,
	// "week":document.getElementsByName("week")[0].value,
	// "day":document.getElementsByName("day")[0].value,
	// "xq":document.getElementsByName("xq")[0].value
	// };
	var loading=document.getElementById("loading");
	loading.style.display="block";
fetch("php/emptyRoom.php",{
    method: 'post',
    body: new FormData(document.getElementById(form))
})
.then(function(response){return response.json();})
.then(function(res){
	// console.log(res)//对json数据进行处理 
	var start=document.getElementsByName("jc_start")[formid].value;
	var end=document.getElementsByName("jc_end")[formid].value;
	var ER=document.getElementById("emptyRoom");
	var ERtip=document.getElementById("ERtip");
	var cont=0;//空闲教室计数器
	ER.innerHTML="";//每次调用重置
	start=start<end?start:end;
	end=start<end?end:start;//当出现开始大于结束的情况  进行倒置
	for(var i=1;i<res.length;i++){
		for(var j=start;j<=end;j++){
			if(res[i][j]=="Y"){
				// console.log(res[i][0]+"有使用");
				break;
			}else if(j==end&&res[i][j]=="N"){
				var p=document.createElement("p");
				var text=document.createTextNode(res[i][0]);
				p.appendChild(text);
				ER.appendChild(p);
				cont++;
			}else{
				// console.log(res[i][0]+"的"+j+"跳过");
			}
		}
	}
	if(cont!=0){
		ERtip.innerHTML="您选择的时段有<span id='cont'>"+cont+"</span>间空教室";
	}else{
		ERtip.innerHTML="您选择的时段无可用空教室!";
	}
	loading.style.display="none";
})
.catch(function(err){loading.style.display="none";console.log(err)});
}