<?php

function do_process(swoole_process $worker)
{
	echo "PID ".$worker->pid."\n";
	print_r($worker);	
	sleep(10);
}

$process = new swoole_process("do_process");
$pid = $process->start();
$process = new swoole_process("do_process");
$pid = $process->start();
$process = new swoole_process("do_process");
$pid = $process->start();

echo "Pid: ".$pid;

swoole_process::wait();
