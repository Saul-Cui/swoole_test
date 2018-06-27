<?php

$tcp_server = new swoole_server($host = '0.0.0.0', $port = 8330);

$tcp_server->on('connect', function($tcp_server, $fd){
			echo 'Connect tcp_server Success.';
		});

$tcp_server->on('receive', function($tcp_server, $fd, $from_id, $data){
			echo "接收到数据\n";
			var_dump($data);
		});

$tcp_server->on('close', function($tcp_server, $fd){
			echo "连接关闭\n";
		});

$tcp_server->start();
