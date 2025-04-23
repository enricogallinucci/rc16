<!-- 
--	Getting level 2 values through array $lev2_row
-->
<?php
	$lev2_id=$lev2_row[id];
	$lev2_nome=$lev2_row[nome];
	$lev2_livello1_id=$lev2_row[livello1_id];
	$lev2_descrizione=$lev2_row[descrizione];
?>

	<div id="lev2_<?php print $lev2_id; ?>" class="section scrollspy">
    	<h2><?php print $lev2_nome; ?></h2>
		<!--<p><?php print $lev2_descrizione; ?></p>-->
		<ul class="collapsible collapsible-accordion" data-collapsible="accordion">
			<?php 
				$lev3 = get_lev3_by_lev2_id($lev2_id);
				foreach ($lev3 as $key => $lev3_row){
					include "lev3.tpl.php"; //passing the level 3 values through array $lev3_row
				}
			?>
		</ul>
    </div>
