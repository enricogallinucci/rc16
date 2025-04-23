(function($){
	
  $(function(){
	
	//Modal Article windows logic
	function get_next_article(artIndex, level3id, artcon){
		if (artIndex+1==level3_article_table.length || level3_article_table[artIndex+1].livello3_id!=level3id || level3_article_table[artIndex+1].consequenziale!=artcon)
			return -1;
		else 
			return {index : artIndex+1, livello3_id : level3id, articolo_id : level3_article_table[artIndex+1].articolo_id, consequenziale : artcon};
	}
	function get_prev_article(artIndex, level3id, artcon){
		if (artIndex==0 || level3_article_table[artIndex-1].livello3_id!=level3id || level3_article_table[artIndex-1].consequenziale!=artcon)
			return -1;
		else 
			return {index : artIndex-1, livello3_id : level3id, articolo_id : level3_article_table[artIndex-1].articolo_id, consequenziale : artcon};
	}

	$('.artLink').click(function(){
		artId = $(this).attr('artid');
		artIndex = parseInt($(this).attr('artindex'));
		level3id = $(this).attr('level3id');
		artcon = $(this).attr('artcon');
		l3nome = $(this).attr('level3nome');
		conseq = artcon==0 ? "diretta" : "consequenziale";

		$('span#modalArticle_id').html(artId);
		$('span#modalArticle_arg').html(l3nome);
		$('span#modalArticle_conseq').html(conseq);
		$('tbody#modalArticle_tbody').html(html_article[artId]);
		$('a#modal-action-next').attr("artid", get_next_article(artIndex, level3id, artcon).articolo_id);
		$('a#modal-action-next').attr("artindex", get_next_article(artIndex, level3id, artcon).index);
		$('a#modal-action-next').attr("level3id", get_next_article(artIndex, level3id, artcon).livello3_id);
		$('a#modal-action-next').attr("artcon", get_next_article(artIndex, level3id, artcon).consequenziale);
		$('a#modal-action-prev').attr("artid", get_prev_article(artIndex, level3id, artcon).articolo_id);
		$('a#modal-action-prev').attr("artindex", get_prev_article(artIndex, level3id, artcon).index);
		$('a#modal-action-prev').attr("level3id", get_prev_article(artIndex, level3id, artcon).livello3_id);
		$('a#modal-action-prev').attr("artcon", get_prev_article(artIndex, level3id, artcon).consequenziale);
		
		if(get_next_article(artIndex, level3id, artcon)==-1)
			$('a#modal-action-next').css("visibility", "hidden");
		else
			$('a#modal-action-next').css("visibility", "visible");
		if(get_prev_article(artIndex, level3id, artcon)==-1)
			$('a#modal-action-prev').css("visibility", "hidden");
		else
			$('a#modal-action-prev').css("visibility", "visible");
		
	});
	
	$('a#modal-action-next').click(function(){
		$('div#modalArticle > .modal-content').fadeOut(250);
		artId = $(this).attr('artid');
		artIndex = parseInt($(this).attr('artindex'));
		level3id = $(this).attr('level3id');
		artcon = $(this).attr('artcon');
		l3nome = $(this).attr('level3nome');
		conseq = artcon==0 ? "diretta" : "consequenziale";
		
		window.setTimeout(function(){
			$('span#modalArticle_id').html(artId);
			$('span#modalArticle_arg').html(l3nome);
			$('span#modalArticle_conseq').html(conseq);
			$('tbody#modalArticle_tbody').html(html_article[artId]);
			$('a#modal-action-next').attr("artid", get_next_article(artIndex, level3id, artcon).articolo_id);
			$('a#modal-action-next').attr("artindex", get_next_article(artIndex, level3id, artcon).index);
			$('a#modal-action-next').attr("level3id", get_next_article(artIndex, level3id, artcon).livello3_id);
			$('a#modal-action-next').attr("artcon", get_next_article(artIndex, level3id, artcon).consequenziale);
			$('a#modal-action-prev').attr("artid", get_prev_article(artIndex, level3id, artcon).articolo_id);
			$('a#modal-action-prev').attr("artindex", get_prev_article(artIndex, level3id, artcon).index);
			$('a#modal-action-prev').attr("level3id", get_prev_article(artIndex, level3id, artcon).livello3_id);
			$('a#modal-action-prev').attr("artcon", get_prev_article(artIndex, level3id, artcon).consequenziale);
			if(get_next_article(artIndex, level3id, artcon)==-1)
				$('a#modal-action-next').css("visibility", "hidden");
			else
				$('a#modal-action-next').css("visibility", "visible");
			if(get_prev_article(artIndex, level3id, artcon)==-1)
				$('a#modal-action-prev').css("visibility", "hidden");
			else
				$('a#modal-action-prev').css("visibility", "visible");
		}, 250);
		$('div#modalArticle > .modal-content').fadeIn(250);
		ga('send', 'event', 'Esamina', 'Articolo', conseq, artId);
	});
	$('a#modal-action-prev').click(function(){
		$('div#modalArticle > .modal-content').fadeOut(250);
		artId = $(this).attr('artid');
		artIndex = parseInt($(this).attr('artindex'));
		level3id = $(this).attr('level3id');
		artcon = $(this).attr('artcon');
		l3nome = $(this).attr('level3nome');
		conseq = artcon==0 ? "diretta" : "consequenziale";

		window.setTimeout(function(){
			$('span#modalArticle_id').html(artId);
			$('span#modalArticle_arg').html(l3nome);
			$('span#modalArticle_conseq').html(conseq);
			$('tbody#modalArticle_tbody').html(html_article[artId]);
			$('a#modal-action-next').attr("artid", get_next_article(artIndex, level3id, artcon).articolo_id);
			$('a#modal-action-next').attr("artindex", get_next_article(artIndex, level3id, artcon).index);
			$('a#modal-action-next').attr("level3id", get_next_article(artIndex, level3id, artcon).livello3_id);
			$('a#modal-action-next').attr("artcon", get_next_article(artIndex, level3id, artcon).consequenziale);
			$('a#modal-action-prev').attr("artid", get_prev_article(artIndex, level3id, artcon).articolo_id);
			$('a#modal-action-prev').attr("artindex", get_prev_article(artIndex, level3id, artcon).index);
			$('a#modal-action-prev').attr("level3id", get_prev_article(artIndex, level3id, artcon).livello3_id);
			$('a#modal-action-prev').attr("artcon", get_prev_article(artIndex, level3id, artcon).consequenziale);
			if(get_next_article(artIndex, level3id, artcon)==-1)
				$('a#modal-action-next').css("visibility", "hidden");
			else
				$('a#modal-action-next').css("visibility", "visible");
			if(get_prev_article(artIndex, level3id, artcon)==-1)
				$('a#modal-action-prev').css("visibility", "hidden");
			else
				$('a#modal-action-prev').css("visibility", "visible");
		}, 250);
		$('div#modalArticle > .modal-content').fadeIn(250);
		ga('send', 'event', 'Esamina', 'Articolo', conseq, artId);
	});
	
    // preference logic
    $('.preference').click( function(){
		var title = $(this).attr('title');
		var level1_id = $(this).attr('level1_id');
		var level3_id = $(this).attr('level3_id');
		var cookieId = $.cookie("VotoConsapevole");

		//.parent()
		
		$("span#badge-" + level3_id).removeClass("red white green grey lighten-1 lighten-3");
		$("span#badge-" + level3_id).parent().removeClass("red white green grey lighten-1 lighten-3");
		$("div#led-spot-" + level3_id).removeClass("red white green grey lighten-1 lighten-3 no-preference");
		switch(title) {
			case "Favorevole":
				pref_label= level1_id>0 ? "Sei FAVOREVOLE" : "Sei d'accordo col SI";
				$("span#badge-" + level3_id).addClass("green lighten-3");
				$("span#badge-" + level3_id).parent().addClass("green lighten-3");
				$("div#led-spot-" + level3_id).addClass("green lighten-3");
				preference=1;
				ga('send', 'event', 'Preferenza', 'Livello3', 'Favorevole', level3_id);
				break;
			case "Astenuto":
				pref_label="Sei INDIFFERENTE";
				$("span#badge-" + level3_id).addClass("white");
				$("span#badge-" + level3_id).parent().addClass("white");
				$("div#led-spot-" + level3_id).addClass("white");
				preference=2;
				ga('send', 'event', 'Preferenza', 'Livello3', 'Astenuto', level3_id);
				break;
			case "Contrario":
				pref_label= level1_id>0 ? "Sei CONTRARIO" : "Sei d'accordo col NO";
				$("span#badge-" + level3_id).addClass("red lighten-3");
				$("span#badge-" + level3_id).parent().addClass("red lighten-3");
				$("div#led-spot-" + level3_id).addClass("red lighten-3");
				preference=3;
				ga('send', 'event', 'Preferenza', 'Livello3', 'Contrario', level3_id);
				break;
			default:
				pref_label="Esprimi la tua opinione";
				$("span#badge-" + level3_id).addClass("grey lighten-3");
				$("span#badge-" + level3_id).parent().addClass("grey lighten-3");
				$("div#led-spot-" + level3_id).addClass("grey lighten-3 no-preference");
				preference=0;
		}
		$("span#badge-" + level3_id).html(pref_label);
		
		upsert_preference(cookieId, 3, level3_id, preference, level1_id);
    });

	//Analytics logic
	$('.esamina-ruolo-si').click(function(){
		var level3id = $(this).attr('level3_id');
		ga('send', 'event', 'Esamina', 'Livello3', 'ruolo-si', level3id);
	});
	$('.esamina-ruolo-no').click(function(){
		var level3id = $(this).attr('level3_id');
		ga('send', 'event', 'Esamina', 'Livello3', 'ruolo-no', level3id);
	});
	$('.esamina-ruolo-novita').click(function(){
		var level3id = $(this).attr('level3_id');
		ga('send', 'event', 'Esamina', 'Livello3', 'ruolo-novita', level3id);
	});
	$('.artLink').click(function(){
		var artcon = $(this).attr('artcon')==0?"diretta":"consequenziale";
		ga('send', 'event', 'Esamina', 'Articolo', artcon, artId);
	});
	
	
  }); // end of document ready
})(jQuery); // end of jQuery name space
