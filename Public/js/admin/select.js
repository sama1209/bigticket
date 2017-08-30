var seats = document.querySelectorAll("#seat_content>p span");
var count = 0;
var seat_lis = document.querySelectorAll("#sel_seat li");
var totalPrice = document.querySelector("#totalPrice b");
var price = parseInt(document.querySelector("#price").innerHTML);
//用了二位数组存储座位号
console.log(seats);
var array = [];
for(var i = 0; i < 9;i++){
	array[i] = new Array(11);
}
for(var i = 0;i < 9;i++){
	for(var j = 0;j < 11; j++){
		array[i][j] = 0;
	}
}
for(var i = 0; i < seats.length; i++){
	seats[i].onclick = function(){
	if(this.className == "" && count < 4){
		this.className = "green";
		console.log(i);
		++count;
	}else if(this.className == "green"){
		this.className = "";--count;
        console.log(i);
	}else if(this.className == "red"){}
	loop();	
}
}
function loop(){
for(var i = 0; i < seats.length; i++){
	var r = parseInt(i / 11);
	var c = parseInt(i % 11);
	if(seats[i].className == "green"){
		array[r][c] = 1;
	}else{
		array[r][c] = 0;
		}
	}
	loop2();
}
function loop2(){
	var temp = 0;
	for(var i = 0;i < 4;i++){
		seat_lis[i].innerHTML = i+1;
		seat_lis[i].className = "";
	}
	for(var r = 0; r < 9; r++){
		for(var c = 0; c < 11; c++){
			if(array[r][c] == 1){
				seat_lis[temp].innerHTML = (r+1) + "排" + (c+1) + "座";
				seat_lis[temp].className = "sel";
				temp++;
			}
		}
	}
}
document.querySelector("#form input").onclick = function(){
	this.location = "pay_select.html";
}
//进行跳转
$("#button-book").click(function () {
    var res = "";
    var k=1;
    for(var i = 0;i < 9;i++){
        for(var j = 0;j < 11; j++){
            if(array[i][j] == 1){
            	i++;j++;
            	res= res + '&row'+k+'='+i+'&column'+k+'='+j;
            	k++;
            	i--;j--;
            }
        }
    }
   console.log(res);
    // var data = JSON.stringify(res);
	// //console.log(data);
	// for(var i=0;i<4;i++){
	// 	if(res[i]){
	// 		console.log(res[i]);
	// 		var n = res.spli
	// 	}
	// }
    //用get，获取id，座位信息
    var id = $('input[name="scene_id"]').val();
    // console.log(id);
	var url = SCOPE.set_url +'&id='+id+res+'&k='+k;
	if(k==1){
        return dialog.error("没有选中任何座位",SCOPE.jump_url);
	}
    window.location.href = url;
});
//对于已售座位的处理
var seatmessage = $('input[name="message"]').val();
var seatED = new Array;
seatED = seatmessage.split('-');
console.log(seatED);
for(var i=0;i<seatED.length-1;i=i+2){
	var j = parseInt(seatED[i]-1)*11 + parseInt(seatED[i+1]-1);
	console.log(j);
	seats[j].className="red";
}
console.log(seatED);