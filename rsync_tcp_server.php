<?php

$server = new swoole_server('0.0.0.0', 8335);

$server->set(array('task_worker_num' => 4));

$server->on('receive', function($server, $fd, $from_id, $data){
			$task_id = $server->task($data);

			echo "rsync ID: $task_id \n";
		});

$server->on('task', function($server, $task_id, $from_id, $data){
			echo "control rsync ID: $task_id \n";

			$server->finish("$data -> OK");
		});

$server->on('finish', function($server, $task_id, $data){
			echo "control complete.\n";
		});

$server->start();

