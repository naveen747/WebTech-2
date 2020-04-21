<?php

//	header("Content-type: text/xml");

	extract($_GET);
	if($time)
	{	
		//code for checking if text changed
		$last=$time;	
	}
	else
	{
		$last=null;
	}
	
	$file=fopen("indigo.rss","r");
	//$file=fopen("red_bus.rss","r");
	//$file=fopen("goibibo.rss","r");
	while(true)
	{
		clearstatcache();
		$new=filemtime("indigo.rss");
		if($new>$last)
		{
			$ret=fread($file,filesize("indigo.rss"))."-----".$new;
			echo $ret;
			break;
			
		}
		else
		{
			sleep(5);
			continue;
		}
	}
?>