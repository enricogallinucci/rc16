<?php
	ob_start();
	include_once '../private_code/util.inc';

	if (isset($_COOKIE["VotoConsapevole"])){
		$userId=$_COOKIE["VotoConsapevole"];
	}else{
		$userId=get_new_user_id();
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		setcookie("VotoConsapevole",$userId,time() + (365 * 24 * 60 * 60), '/', $domain, false);
	}
	ob_end_flush();
?>
<html>
<head>
	<title>Referendum Costituzionale 2016</title>

	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/vc.css">

	<link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--FACEBOOK META TAGS-->
	<meta property="og:url"           content="http://www.referendumcostituzionale2016.it" />
	<meta property="og:type"          content="website" />
	<meta id="fb-meta-title" property="og:title"         content="Referendum Costituzionale 2016 - ESAMINA E DECIDI" />
	<meta property="og:description"   content="Esamina il merito della riforma. Considera i pro e i contro. Decidi cosa votare." />
	<meta property="og:image"         content="http://www.referendumcostituzionale2016.it/img/wordle.png" />
</head>
<body>
	<?php //include_once("includes/analyticstracking.php") ?>
	<?php include "includes/header.html" ?>
    
    <main>
	<div id="banner" class="fullscreen valign-wrapper"  style="height:350px; overflow:hidden;">
		<div class="container"><div class="row">
			<div class="col s12" style="text-align:center;">
				<h1 style="text-transform:uppercasee;" class="vc-banner">Referendum Costituzionale 2016</h1>
				<h5 style="background-color: rgba(255, 255, 255, 0.6); padding: 15px;">Esamina il merito della riforma.
				Considera i pro e i contro. 
				Decidi cosa votare.</h5>
			</div>
		</div></div>
	</div>
    <div class="section">
		<div class="vc-homeTitle-cont center-align">
        	<h2 class="vc-wings">
        	1. IL MERITO DELLA RIFORMA
            </h2>
        </div>
    </div>
	<div class="">
	<div class="container">
		<div class="row">
			<div class="col s12">
			<p style="margin-top:0px;">La riforma costituzionale modifica 47 articoli della Costituzione italiana e spazia su diversi argomenti. Per facilitare la lettura, i contenuti sono stati suddivisi in tre aree: le due aree principali sono la riforma del Senato ed il rapporto tra Stato e Regioni, mentre tutte le altre modifiche sono racchiuse in "tutto il resto".<br> 
			In ciasucna area, i singoli argomenti vengono mostrati mettendo a confronto il merito della modifica (semplificato il pi&ugrave; possibile) e le principali motivazioni espresse dai comitati per il SI e per il NO. Utilizza la funzionalit&agrave; interattiva di questo sito per esprimere la tua opinione sui singoli punti; il <a href="#vc-cruscotto">cruscotto finale</a> ti fornir&agrave; una panoramica complessiva delle tue valutazioni e ti aiuter&agrave; a prendere la decisione su cosa votare.
			</p></div>
			<div class="col l4 m12 s12">
				<div class="card form" l1_id=1>
					<div class="card-content">
					  <div class="valign-wrapper vc-card-image-cont"><a href="riforma-del-senato/"><img class="vc-card-image" src="img/riforma-del-senato.png" alt="Riforma del Senato"></a></div>
					  <h3 class="vc-card-title"><a class="vc-link-title" href="riforma-del-senato/">Riforma del Senato</a></h3>
					  <p><a class="vc-link-body" href="riforma-del-senato/">Il Senato della Repubblica non ospiter&agrave; pi&ugrave; rappresentanti della Nazione, bens&igrave; rappresentanti delle Regioni e delle Autonomie.</a></p>
                    </div>
                    <div class="card-action vc-dots valign-wrapper">
						<?php 
							$res1 = render_preference_overview($userId, 1, "card-size");
							print $res1['HTML'];
						?>
					</div>
				</div>
			</div>
			<div class="col l4 m12 s12">
				<div class="card form" l1_id=2>
					<div class="card-content">
					  <div class="valign-wrapper vc-card-image-cont"><a href="rapporto-stato-regioni/"><img class="vc-card-image" src="img/rapporto-stato-regioni.png" alt="Rapporto Stato-Regioni"></a></div>
					  <h3 class="vc-card-title"><a class="vc-link-title" href="rapporto-stato-regioni/">Rapporto Stato-Regioni</a></h3>
					  <p><a class="vc-link-body" href="rapporto-stato-regioni/">La riforma del Titolo V &egrave; strettamente collegata a quella del Senato e regola il nuovo rapporto delle competenze tra lo Stato e lo Regioni.</a></p>
					</div>
                    <div class="card-action vc-dots valign-wrapper">
						<?php 
							$res2 = render_preference_overview($userId, 2, "card-size");
							print $res2['HTML'];
						?>
					</div>
				</div>
			</div>
			<div class="col l4 m12 s12">
				<div class="card form" l1_id=3>
					<div class="card-content">
					  <div class="valign-wrapper vc-card-image-cont"><a href="tutto-il-resto/"><img class="vc-card-image" src="img/tutto-il-resto.png" alt="Tutto il resto"></a></div>
					  <h3 class="vc-card-title"><a class="vc-link-title" href="tutto-il-resto/">Tutto il resto</a></h3>
					  <p><a class="vc-link-body" href="tutto-il-resto/">Dall'elezione del Presidente della Repubblica ai Decreti Legge del Governo; dai referendum popolari all'abolizione di CNEL e province.</a></p>
					</div>
                    <div class="card-action vc-dots valign-wrapper">
						<?php 
							$res3 = render_preference_overview($userId, 3, "card-size");
							print $res3['HTML'];
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
    <div class="section">
		<div class="vc-homeTitle-cont center-align">
        	<h2 class="vc-wings">
        	2. OLTRE IL MERITO
            </h2>
        </div>
    </div>
	<div class="">
	<div class="container">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card form" l1_id=0>
						<div class="card-content">
							<h3 class="vc-card-title"><a class="vc-link-title" href="questioni-di-metodo/">Questioni politiche, generali e di metodo</a></h3>
							<p><a class="vc-link-body" href="questioni-di-metodo/">Tutto ci&ograve; che non entra nel merito della riforma, ma che costitusce comunque argomento di dibattito da parte dei sostenitori del SI o del NO. Ad esempio: la legittimit&agrave; del Parlamento; il combinato con la nuova legge elettorale; il destino del Governo legato all'esito del Referendum.</a></p>
						</div>
						<div class="card-action vc-dots valign-wrapper">
							<?php 
								$res0 = render_preference_overview($userId, 0, "card-size");
								print $res0['HTML'];
							?>
						</div>
				</div>
			</div>
		</div>
	</div>
	</div>
    <div class="section" id="vc-cruscotto">
		<div class="vc-homeTitle-cont center-align">
        	<h2 class="vc-wings">
        	3. DECIDI COSA VOTARE
            </h2>
        </div>
    </div>
	<div class="">
	<div class="container vote">
		<div class="card">
			<div class="card-stacked">
				<div class="card-content">
					<div class="row">
						<div class="col l3 m6 s12 center-align">
							<h5>Riforma Senato</h5>
							<div class="card-image">
								<canvas id="gauge-1" class="vc-gauge tooltipped" data-position="bottom" data-delay="50" data-tooltip="Il cruscotto mostra la media delle tue preferenze espresse sulla Riforma del Senato"></canvas>
							</div>
                            <div class="progress vc-progress blue-grey tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hai espresso la tua preferenza su <?php print $res1['CNTP'];?>/7 punti">
                                <div id="determinate-1" class="determinate"></div>
                            </div>
						</div>
						<div class="col l3 m6 s12 center-align">
							<h5>Stato-Regioni</h5>
							<div class="card-image">
								<canvas id="gauge-2" class="vc-gauge tooltipped" data-position="bottom" data-delay="50" data-tooltip="Il cruscotto mostra la media delle tue preferenze espresse sulle modifiche dei rapporti Stato-Regioni"></canvas>
							</div>
                            <div class="progress vc-progress blue-grey tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hai espresso la tua preferenza su <?php print $res2['CNTP'];?>/10 punti">
                                <div id="determinate-2" class="determinate"></div>
                            </div>
						</div>
						<div class="col l3 m6 s12 center-align">
							<h5>Il resto</h5>
							<div class="card-image">
								<canvas id="gauge-3" class="vc-gauge tooltipped" data-position="bottom" data-delay="50" data-tooltip="Il cruscotto mostra la media delle tue preferenze espresse sul resto delle modifiche"></canvas>
							</div>
                            <div class="progress vc-progress blue-grey tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hai espresso la tua preferenza su <?php print $res3['CNTP'];?>/13 punti">
                                <div id="determinate-3" class="determinate"></div>
                            </div>
						</div>
						<div class="col l3 m6 s12 center-align">
							<h5>Metodo</h5>
							<div class="card-image">
								<canvas id="gauge-0" class="vc-gauge tooltipped" data-position="bottom" data-delay="50" data-tooltip="Il cruscotto mostra la media delle tue preferenze espresse sulle questioni di metodo"></canvas>
							</div>
                            <div class="progress vc-progress blue-grey tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hai espresso la tua preferenza su <?php print $res0['CNTP'];?>/8 punti">
                                <div id="determinate-0" class="determinate"></div>
                            </div>
						</div>
					</div>
				</div>
				<div class="card-action">
					<div class="center-align">
						<? 	$final_vote = get_user_finel_vote($userId);
							switch ($final_vote) {
								case 1:
									$color_class="green";
									print '<a id="final-vote-favorevole" class="waves-effect waves-light btn-large green vc-finalVote" finalVote="favorevole">Voto SI</a>';
									print '<a id="final-vote-astenuto" class="waves-effect waves-light btn-large grey vc-finalVote" finalVote="astenuto">Non voto</a>';
									print '<a id="final-vote-contrario" class="waves-effect waves-light btn-large grey vc-finalVote" finalVote="contrario">Voto NO</a>';
									break;
								case 2:
									print '<a id="final-vote-favorevole" class="waves-effect waves-light btn-large grey vc-finalVote" finalVote="favorevole">Voto SI</a>';
									print '<a id="final-vote-astenuto" class="waves-effect waves-light btn-large white vc-finalVote" finalVote="astenuto">Non voto</a>';
									print '<a id="final-vote-contrario" class="waves-effect waves-light btn-large grey vc-finalVote" finalVote="contrario">Voto NO</a>';
									break;
								case 3:
									print '<a id="final-vote-favorevole" class="waves-effect waves-light btn-large grey vc-finalVote" finalVote="favorevole">Voto SI</a>';
									print '<a id="final-vote-astenuto" class="waves-effect waves-light btn-large grey vc-finalVote" finalVote="astenuto">Non voto</a>';
									print '<a id="final-vote-contrario" class="waves-effect waves-light btn-large red vc-finalVote" finalVote="contrario">Voto NO</a>';
									break;
								default:
									print '<a id="final-vote-favorevole" class="waves-effect waves-light btn-large blue vc-finalVote" finalVote="favorevole">Voto SI</a>';
									print '<a id="final-vote-astenuto" class="waves-effect waves-light btn-large blue vc-finalVote" finalVote="astenuto">Non voto</a>';
									print '<a id="final-vote-contrario" class="waves-effect waves-light btn-large blue vc-finalVote" finalVote="contrario">Voto NO</a>';
							}	
						?>
					</div>
					<div id="final-vote-selected" style="display: none;"><?php print $final_vote;?></div>
				</div>
				<div class="card-action" id="finel-vote-call-to-actions" <?php if ($final_vote) print 'style="display: block;"'; ?>>
					<div class="center-align">
						<div class="row">
							<div class="col l4 m12 s12">
								<h4>Condividi</h4>
                                <i class="material-icons center large">share</i>
								<div id="share-facebook" class="card">
									<div class="card-image">
										<img src="img/wordle.png">
									</div>
									<div class="card-content">
										<div id="facebook-post-title" class="facebook-post-content">Referendum Costituzionale 2016 - ESAMINA E DECIDI</div>
										<div id="facebook-post-message" class="facebook-post-content">Esamina il merito della riforma. Considera i pro e i contro. Decidi cosa votare.</div>
										<div id="facebook-post-address" class="facebook-post-content">REFERENDUMCOSTITUZIONALE2016.IT</div>
									</div>
									<div class="card-action">
										<div class="facebook-share-my-vote-form" style="display:none;">
											<input type="checkbox" name="facebook-share-my-vote-checkbox" id="facebook-share-my-vote-checkbox" class="filled-in">
											<label for="facebook-share-my-vote-checkbox">Condividi anche il tuo voto</label>
										</div>
										<div class="facebook-button">
											<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Freferendumcostituzionale2016.it&layout=button&mobile_iframe=true&width=79&height=20&appId" width="79" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
										</div>
									</div>
								</div>
								<div id="share-twitter" class="card">
									<div class="card-content">
										<div id="twitter-bd" role="main">
											<div class="twitter-title">
											<img src="img/logo_twitter.png">
											<p> Condividi un link con chi ti segue</p>
											</div>
											<div class="bd">
												<span class="field">
													<div id="twitter-status">Referendum Costituzionale 2016 - ESAMINA la riforma. CONSIDERA pro e contro. DECIDI. http://www.referendumcostituzionale2016.it #VotoConsapevole</div>
												</span>
											</div>
										</div>
									</div>
									<div class="card-action">
										<div class="twitter-share-my-vote-form" style="display:none;">
											<input type="checkbox" name="twitter-share-my-vote-checkbox" id="twitter-share-my-vote-checkbox" class="filled-in">
											<label for="twitter-share-my-vote-checkbox">Condividi anche il tuo voto</label>
										</div>
										<div class="twitter-button">
											<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-text="Referendum Costituzionale 2016 - ESAMINA la riforma. CONSIDERA pro e contro. DECIDI." data-url="http://www.referendumcostituzionale2016.it" data-hashtags="VotoConsapevole" data-lang="it" data-show-count="false">Tweet</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col l4 m4 s12">
								<h4>Scrivici</h4>
                                <i class="material-icons center large">mail_outline</i>
								<p>Se hai commenti o suggerimenti darci, o se vuoi semplicemente condividere con noi la tua esperienza, contattaci attraverso questo form. Saremo felici di leggere la tua opinione!</p>
								<div class="row">
									<form class="col s12">
											<div class="input-field col s12">
												<input placeholder="Il tuo indirizzo e-mail" id="sender" name="sender" type="email" class="validate">
												<label for="sender" data-error="L'indirizzo e-mail inserito non e' corretto">Mittente:</label>
											</div>
											<div class="input-field col s12">
												<input placeholder="L'oggetto del messaggio" id="object" name="object" type="text" class="validate">
												<label for="object">Oggetto:</label>
											</div>
											<div class="input-field col s12">
											<textarea  placeholder="Il messaggio" id="message" name="message" class="materialize-textarea"></textarea>
											<label for="message" id="email-message-label">Messaggio:</label>
											</div>
										<a class="btn waves-effect light-blue" id="form-mail-submit">Invia
											<i class="material-icons right">send</i>
										</a>									
									</form>
								</div>
							</div>
							<div class="col l4 m4 s12">
								<h4>Vota</h4>
                                <i class="material-icons center large">event</i>
								<p>Il Consiglio dei Ministri ha deciso che si voter&agrave; il <span class="vc-bold">4 dicembre 2016</span>. Seguiranno ulteriori informazioni su orari e modalit&agrave; del voto.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="vc-video-fab" class="fixed-action-btn click-to-toggle right-align" style="width:40%; min-width:300px;">
		<a id="vc-video-btn" class="btn-floating btn-large light-blue">
			<i class="large material-icons">play_arrow</i>
		</a>
		<ul>
			<li><div class="video-container" id="vc-video"><iframe id="vc-video-embed" src="https://www.youtube.com/embed/i65-XvIlSU8?rel=0" frameborder="0" allowfullscreen></iframe></div></li>
		</ul>
	</div>

   </main>    
   <?php include "includes/footer.html" ?>
		
<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/jquery.cookie.min.js"></script>
<script src="js/gauge.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/ajax_calls.min.js"></script>
<script src="js/init.min.js"></script>
<script src="js/index.min.js"></script>
<script type="text/javascript" src="js/cookies.min.js"></script>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>