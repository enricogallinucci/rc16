<?php 
	ob_start();
	include_once '../../private_code/util.inc';
	
	//get parameters
	//$lev1_id = $_GET['lev1_id'];
	$lev1_id = 1;
	
	$userId="";
	//Get cookie
	if (isset($_COOKIE["VotoConsapevole"])){
		$userId=$_COOKIE["VotoConsapevole"];
	}else{
		$userId=get_new_user_id();
		setcookie("VotoConsapevole",$userId,time() + (365 * 24 * 60 * 60));
	}
	$user_prefs=get_user_preferences($userId);
	
	//Get number of preferences
	$stat_prefs = get_user_preference_stat($userId, 3, $lev1_id);
	$pref_no = $stat_prefs['CNT'];
	//$pref_avg = $stat_prefs['AVGP'];
	
	$lev1_row = get_lev1_by_id($lev1_id);
	ob_end_flush();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Referendum Costituzionale 2016 - <?php print $lev1_row[nome]; ?></title>

<link rel="stylesheet" href="../css/materialize.min.css">
<link rel="stylesheet" href="../css/vc.css">

<link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body id="level1-page">
	<?php include_once("../includes/analyticstracking.php") ?>
	<?php include "../includes/header.html" ?>
    <main>
	<div class="container">
   		<div class="level-1-title">
			<h1 class="header"><?php print $lev1_row[nome]; ?></h1>
			<p><?php print $lev1_row[descrizione]; ?></p>
		</div>
		<a id="toggleHelper" href="#">Scopri come leggere i contenuti</a> - <a id="toggleLed" href="#">Visualizza il tuo stato di avanzamento</a>
		<div id="vc-helper" style="display:none">
			<p>
				I contenuti della riforma del Senato sono stati suddivisi in sezioni e argomenti. Selezionando un argomento si visualizzano le seguenti informazioni:<br>
				- LA NOVITA': riassume, in sostanza, quale cambiamento viene proposto. Si può verificare il reale cambiamento sulla Costituzione cliccando sugli articoli (elencati in fondo) che vengono modificati, direttamente o consequenzialmente.<br>
				- PERCHE' SI / PERCHE' NO: elenca le opinioni che sono state rispettivamente espresse dai comitati per il SI e per il NO (vedi <a href="le-nostre-fonti.php">le nostre fonti</a>).<br>
				Dopo aver esaminato il merito e considerato i pro ed i contro, azione il pulsante azzurro per esprimere la tua opinione sull'argomento.
			</p>
		</div>
		<div id="preference-overview" style="display:none">
			<div class="card blue-grey lighten-3">
				<div class="card-content" style="padding:3px;">
					<div id="preference-overview-details">
						<?php
							$ledcnt=0;
							$lev2 = get_lev2_by_lev1_id($lev1_id);
							foreach ($lev2 as $key => $lev2_row){
								$lev2_id=$lev2_row[id];
								$lev3 = get_lev3_by_lev2_id($lev2_id);
								foreach ($lev3 as $key => $lev3_row){
									$lev3_id=$lev3_row['id'];
									$level3_name=$lev3_row['nome'];
									$pref = $user_prefs[$userId][3][$lev3_id];
									$color_class = get_colorclass_by_preference($pref);
									if ($ledcnt==0){
										print '<div class="progress-overview led no-bg"><div class="led-spot tooltipped ' . $color_class . '" id="led-spot-' . $lev3_id . '" data-position="bottom" data-delay="50" data-tooltip="' . $level3_name . '"></div></div>';
									}else{
										print '<div class="progress-overview bar"></div>';
										print '<div class="progress-overview led"><div class="led-spot tooltipped ' . $color_class . '" id="led-spot-' . $lev3_id . '" data-position="bottom" data-delay="50" data-tooltip="' . $level3_name . '"></div></div>';
									}
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php 
			$lev2 = get_lev2_by_lev1_id($lev1_id);
			foreach ($lev2 as $key => $lev2_row){
				include "../includes/lev2.tpl.php"; //passing the level 2 values through array $lev2_row
			}
		?>
</div>

    </main>    
    
    <?php include "../includes/footer.html" ?>
	
	<!-- Modal Structure -->	
	<div id="modalArticle" class="modal modal-fixed-footer">
		<div class="modal-content">
		  <h4>Articolo <span  id="modalArticle_id"></span></h4>
		  <p>
		    ARGOMENTO: <span id="modalArticle_arg"></span><br>
			TIPO DI MODIFICA: <span id="modalArticle_conseq"></span>
		  </p>
			<table class="primaDopo striped">
				<thead>
				  <tr>
					  <th data-field="prima" class="primaDopo">PRIMA</th>
					  <th data-field="dopo" class="primaDopo">DOPO</th>
				  </tr>
				</thead>

				<tbody id="modalArticle_tbody">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<div class="row" style="margin: 5px 0px 0px 0px;">
				<div class="col s4 left-align">
					<a href="#" id="modal-action-prev" class="modal-action waves-effect waves-green btn-flat light-blue" style="float:unset"><<</a>
				</div>
				<div class="col s4 center-align">
					<a href="#" id="modal-action-close" class="modal-action modal-close next-art waves-effect waves-green btn-flat light-blue" style="float:unset">Chiudi</a>
				</div>
				<div class="col s4 right-align">
					<a href="#" id="modal-action-next" class="modal-action next-art waves-effect waves-green btn-flat light-blue" style="float:unset">>></a>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php 
		print '<script>var html_article = new Array();';
		$art_list = get_article_by_lev1_id($lev1_id);
		foreach ($art_list as $key => $article_id){
			$paragraphs = get_paragraphs_by_article_id($article_id);
			$art_html='';
			foreach ($paragraphs as $key => $par){
				$art_html .= '<tr><td class=\'prima\'>' . $par['prima'] . '</td><td class=\'dopo\'>' . $par['dopo'] . '</td></tr>';
			}
			print 'html_article[' . $article_id . '] = "' . $art_html . '";';
		}
		print '</script>';
		print '<script>var level3_article_table = new Array();';
		$level3_art_table = get_level3_article_table();
		foreach ($level3_art_table as $key => $level3_article_row){
			print 'level3_article_table[' . $key . '] = {livello3_id:' . $level3_article_row[livello3_id] . ', articolo_id:' . $level3_article_row[articolo_id] . ', consequenziale:' . $level3_article_row[consequenziale] . '};';
		}
		print '</script>';
	?>
	
<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/jquery.cookie.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="../js/ajax_calls.min.js"></script>
<script src="../js/init.js"></script>
<script src="../js/level1.min.js"></script>

</body>
</html>