<?php

$ws = new swoole_websocket_server('0.0.0.0', 8350);

//on open
$ws->on('open', function($ws, $request){
			echo "新用户 $request->fd 加入。\n";
			$GLOBALS['fd'][$request->fd]['id'] = $request->fd;
			$GLOBALS['fd'][$request->fd]['name'] = '匿名用户';

		});
//on message
$ws->on('message', function($ws, $request){
			$msg = $GLOBALS['fd'][$request->fd]['name'].":".$request->data."\n";
			if (strstr($request->data, "#name#"))
			{
				$GLOBALS['fd'][$request->fd]['name'] = str_replace("#name", '', $request->data);
			} else {
				foreach($GLOBALS['fd'] as $person)
				{
					$ws->push($person['id'], $msg);
				}
			}
		});
//close
$ws->on('close', function($ws, $request){
			echo "客户端-{$request} 断开连接。\n";
			unset($GLOBALS['fd'][$request]);
		});
//start
$ws->start();
