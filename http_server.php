<?php

$server = new swoole_http_server('0.0.0.0', 8332);

$server->on('request', function($request, $response){
			print_r($request);
			$response->header("Content-Type", "text/html; charset=utf-8");
			$response->end("hello world". rand(100, 999));
		});

$server->start();
