<?php

$path = "rimake.by/wp-admin/promocodes/";
$idlist = unserialize(file_get_contents($path."idlist"));
$idlistNew = array();

for ($i = 0; $i <= count($idlist)-1; $i++) {
	$email = array_keys($idlist)[$i];
	$uid = array_values($idlist)[$i];
	$uidFile = $path.$uid;
	$lifeTime = 86400;
	$expTime = unserialize(file_get_contents($uidFile))['timestamp'] + $lifeTime;
	
	if (time() >= $expTime) {
		unlink($uidFile);
	} else {
		$idlistNew[$email] = $uid;
	}
}

file_put_contents($path."idlist", serialize($idlistNew));

?>