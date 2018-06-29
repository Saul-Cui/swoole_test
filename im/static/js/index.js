var msg = document.getElementById("msg");
var wsServer = 'ws://47.88.230.40:8350';
var websocket = new WebSocket(wsServer);

websocket.onopen = function(evt){

};

websocket.onmessage = function(evt){
	msg.innerHTML += evt.data + '<br />';
	console.log("从服务器获取到的数据: " + evt.data);
};

websocket.onclose = function(evt){
	console.log("服务器拒绝");
};

websocket.onerror = function (evt, e) {
	console.log("错误：" + evt.data);
};

function send_msg()
{
	var text = document.getElementById('text').value;
	document.getElementById('text').value = '';
	websocket.send(text);
}

function send_name()
{
	var text = document.getElementById('myname').value;
	websocket.send("#name#" + text);
	var myTitle = document.getElementById('myTitle');
	myTitle.innerHTML = "IM" + text;
	alert("设置成功");
	var setName = document.getElementById("setName");
	setName.style.display = "none";
	var send_msg = document.getElementById("send_msg");
	send_msg.style.display = "block";
}

