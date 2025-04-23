<html>
<head>
<title>Referendum Costituzionale 2016 - Contattaci</title>

<link rel="stylesheet" href="css/materialize.min.css">
<link rel="stylesheet" href="css/vc.css">

<link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body id="contacts-page">
	<?php include_once("includes/analyticstracking.php") ?>
	<?php include "includes/header.html" ?>
    <main>
	<div class="section">
	<div class="container">
    	<h1>Contattaci</h1>
		<p>Siamo felici di sapere cosa ne pensi e migliorare il nostro servizio! </p>
		<div class="row"><div class="form-wrapper">
			<form class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input placeholder="Il tuo indirizzo e-mail" id="sender" name="sender" type="email" class="validate">
						<label for="sender" data-error="L'indirizzo e-mail inserito non e' corretto">Mittente:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input placeholder="L'oggetto del messaggio" id="object" name="object" type="text" class="validate">
						<label for="object">Oggetto:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
					<textarea  placeholder="Il messaggio" id="message" name="message" class="materialize-textarea"></textarea>
					<label for="message" id="email-message-label">Messaggio:</label>
					</div>
				</div>
				<a class="btn waves-effect light-blue" id="form-mail-submit">Invia
					<i class="material-icons right">send</i>
				</a>									
			</form>
		</div></div>
    </div></div>
   </main>    
   <?php include "includes/footer.html" ?>
	
	
<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/ajax_calls.min.js"></script>
<script src="js/init.min.js"></script>
</body>
</html>