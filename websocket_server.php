<?php

$server = new swoole_websocket_server('0.0.0.0', 8333);


//on
//open
$server->on('open', function($server, $request){
			print_r($request);
			$server->push($request->fd, "welcome \n");
		});

///message
$server->on('message', function($server, $request){
			echo "Message: ".$request->data;
			$server->push($request->fd, "get it message");
		});

//close
$server->on('close', function($server, $request){
			echo "Close \n";
		});

$server->start();
