<?php

$server = new swoole_server($host = '0.0.0.0', $port=8331, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on('packet', function($server, $data, $fd){
			$server->sendto($fd['address'], $fd['port'], "Server: $data");
			print_r($fd);
		});

$server->start();
