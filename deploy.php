<?php
	/**
	* GIT DEPLOYMENT SCRIPT
	*/
	// Check the IP address the POST could come from
	$ips = array('131.103.20.165','131.103.20.166','217.36.221.6');
	if(!in_array($_SERVER['REMOTE_ADDR'],$ips)) die("Unauthorised IP address");
	
	//Pull from git 
	$tmp = shell_exec('git pull origin master');
	echo htmlentities(trim($tmp));
	
	//Initialise modx 
	include("../core/model/modx/modx.class.php");
    $modx= new modX();
	$modx->initialize("mgr");
	 
	// refresh the cache
	$modx->cacheManager->refresh();
	
?>