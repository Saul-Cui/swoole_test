<?php

$tcp_server = new swoole_server($host = '0.0.0.0', $port = 8330);

$tcp_server->on('connect', function($tcp_server, $fd){
			print_r($tcp_server);
			print_r($fd);
			echo 'Connect tcp_server Success.';
		});
