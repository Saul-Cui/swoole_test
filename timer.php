<?php

swoole_timer_tick(2000, function($timer_id){
			echo "action $timer_id \n";
		});

swoole_timer_after(3000, function(){
			echo "after 3000 action\n";
		});
