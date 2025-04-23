<?php 
	/*------------------------------------------
	// post parameters: {cookieId: cookieId, level: level, levelId: levelId, preference: preference}
	------------------------------------------*/
	include_once '../../private_code/util.inc';
	
	$cookieId = $_POST["cookieId"];		//Parametro usato per fare l'upsert della preferenza
	$level = $_POST["level"];			//Parametro usato per fare l'upsert della preferenza
	$levelId = $_POST["levelId"];		//Parametro usato per fare l'upsert della preferenza
	$preference = $_POST["preference"];	//Parametro usato per fare l'upsert della preferenza
	$level1Id = $_POST["level1Id"];		//NB: questo parametro invece è usato per il recupero delle statistiche
	
	upsert_user_preferences($cookieId, $level, $levelId, $preference);
	
	$res = get_user_preference_stat($cookieId, $level, $level1Id);
	print json_encode($res);
	
?>