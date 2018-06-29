<?php

$client = new swoole_client(SWOOLE_SOCK_TCP);

$client->connect("47.88.230.40", 9336, 5) or die("Connect Fail.");


