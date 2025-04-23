<?php
	// Getting level 3 values through array $lev3_row
	// in $user_prefs[cookie_id][livello][livello_id] => preferenza the user preferences
	// in $userId the user id

	$lev3_id=$lev3_row['id'];
	$lev3_nome=$lev3_row['nome'];
	$lev3_livello2_id=$lev3_row['livello2_id'];
	$lev3_descrizione=$lev3_row['descrizione'];
	
	$pref = $user_prefs[$userId][3][$lev3_id];
	$pref_color = get_colorclass_by_preference($pref);
	switch ($pref) {
		case 1:
			$pref_label= $lev1_id>0 ? "Sei FAVOREVOLE" : "Sei d'accordo col SI";
			break;
		case 2:
			$pref_label="Sei INDIFFERENTE";
			break;
		case 3:
			$pref_label= $lev1_id>0 ? "Sei CONTRARIO" : "Sei d'accordo col NO";
			break;
		default:
			$pref_label="Esprimi la tua opinione";
	}	
?>

        <li>
            <div class="collapsible-header <?php if ($pref) print $pref_color ?>" style="padding:1rem; line-height:1.5rem; position:relative;" level3_id="<?php print $lev3_id; ?>">
				<i class="material-icons">expand_more</i><h3><?php print $lev3_nome; ?></h3><span id="badge-<?php print $lev3_id; ?>" class="new badge <?php print $pref_color; ?>" level3_id="<?php print $lev3_id; ?>"><?php print $pref_label; ?></span>
			</div>
            <div class="collapsible-body">
				<div class="row" style="margin-bottom:0px">
					<div class="col s12">
					  <ul class="tabs">
						<li class="tab col s4"><a class="esamina-ruolo-si" href="#lev3_<?php print $lev3_id;?>_ruoloSI" level3_id="<?php print $lev3_id; ?>">Perchè SI</a></li>
						<li class="tab col s4"><a class="esamina-ruolo-novita active" href="#lev3_<?php print $lev3_id;?>_ruoloCOSA" level3_id="<?php print $lev3_id; ?>"><?php if($lev1_id>0) print "La novità"; else print "Questione"; ?></a></li>
						<li class="tab col s4"><a class="esamina-ruolo-no" href="#lev3_<?php print $lev3_id;?>_ruoloNO" level3_id="<?php print $lev3_id; ?>">Perchè NO</a></li>
					  </ul>
					</div>
					<div id="lev3_<?php print $lev3_id;?>_ruoloSI" class="col s12 ruoloSI">
						<?php 
							$opinions = get_opinion_by_lev3_id($lev3_id, 1);
							if (count($opinions)!=0){
								foreach ($opinions as $key => $opinion){
									print render_opinion($opinion['descrizione']); 
								}
							} else {
								print '<div class="valign-wrapper" style="height: 200px;"><span class="valign" style="text-align: center; width: 100%;"> - NON CI SONO RAGIONI ESPRESSE PER IL SI - </span></div>';
							}
						?>
					</div>
					<div id="lev3_<?php print $lev3_id;?>_ruoloCOSA" class="col s12 ruoloCOSA" style="position:relative;">
						<p><?php print $lev3_descrizione; ?>
						
						
					</div>
					<div id="lev3_<?php print $lev3_id;?>_ruoloNO" class="col s12 ruoloNO">
						<?php 
							$opinions = get_opinion_by_lev3_id($lev3_id, 2);
							if (count($opinions)!=0){
								foreach ($opinions as $key => $opinion){
									print render_opinion($opinion['descrizione']); 
								}
							} else {
								print '<div class="valign-wrapper" style="height: 200px;"><span class="valign" style="text-align: center; width: 100%;"> - NON CI SONO RAGIONI ESPRESSE PER IL NO - </span></div>';
							}
						?>
					</div>
				</div>
				<hr class="liv3hr">
				<div style="padding:2rem; position:relative;">
					<?php 
						$dir_art = get_article_by_lev3_id($lev3_id, 0);
						foreach ($dir_art as $key => $art_row){
							if ($key==0) print 'Modifiche dirette: ';
							else print ', ';
							print render_article_link($art_row['articolo_id'], $art_row[id], $lev3_id, 0, $lev3_nome); 
						}
						$con_art = get_article_by_lev3_id($lev3_id, 1);
						foreach ($con_art as $key => $art_row){
							if ($key==0) print '<br>Modifiche consequenziali: ';
							else print ', ';
							print render_article_link($art_row[articolo_id], $art_row[id], $lev3_id, 1, $lev3_nome); 
						}
					?>
					<div class="fixed-action-btn horizontal" style="position: absolute; top: -1.3rem; right: 3rem; height: 39px;">
					  <a id="anchor-select-preference-<?php print $lev3_id; ?>" class="btn-floating btn-medium light-blue">
						<i id="icon-select-preference-<?php print $lev3_id; ?>" class="medium material-icons">more_horiz</i>
					  </a>
					  <ul>
						<li class="voteButton"><a class="btn-floating green preference" level1_id="<?php print $lev1_id; ?>" level3_id="<?php print $lev3_id; ?>" title="Favorevole"><i class="material-icons">thumb_up</i></a></li>
						<li class="voteButton"><a class="btn-floating white preference" level1_id="<?php print $lev1_id; ?>" level3_id="<?php print $lev3_id; ?>" title="Astenuto"><i class="material-icons" style="color:#000;">thumbs_up_down</i></a></li>
						<li class="voteButton"><a class="btn-floating red preference" level1_id="<?php print $lev1_id; ?>" level3_id="<?php print $lev3_id; ?>" title="Contrario"><i class="material-icons">thumb_down</i></a></li>
					  </ul>
					</div>
				</div>
			</div>
          </li>
