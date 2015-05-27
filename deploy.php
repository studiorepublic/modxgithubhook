<?php
	/**
	* GIT DEPLOYMENT SCRIPT
	*/
	// Check the IP address the POST could come from
	$ips = array('131.103.20.165','131.103.20.166','217.36.221.6');
	if(!in_array($_SERVER['REMOTE_ADDR'],$ips)) die("Unauthorised IP address");
	
	//Pull from git 
	$tmp = shell_exec('git pull origin master');
	//Gitify build
	$tmp2 = shell_exec('/usr/bin/Gitify/Gitify build');
	mail('chris@studiorepublic.com','Git pull', htmlentities(trim($tmp))."\r\n".htmlentities(trim($tmp2)));
?>