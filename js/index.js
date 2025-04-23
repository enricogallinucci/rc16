(function($){
	$(function(){
	
		videoShown = false;
  
		$(document).ready(function(){
			$('.tooltipped').tooltip({delay: 50});
		});		
		  
		//facebook share vote logic
		function set_facebook_title(title){
			//NB: Disabilitato per il problema del crawler di FB
			if(!$('input#facebook-share-my-vote-checkbox').is(':checked'))
				title="Referendum Costituzionale 2016 - ESAMINA E DECIDI";
			//set title to meta tags
			//$('meta#fb-meta-title').attr('content',title);  
			//set title to div
			//$('div#facebook-post-title').html(title);
		};
		
		$('input#facebook-share-my-vote-checkbox').click(function(){
			switch($('div#final-vote-selected').html()) {
				case '1':
					set_facebook_title("Referendum Costituzionale 2016 - IO VOTO SI");
					break;
				case '2':
					set_facebook_title("Referendum Costituzionale 2016 - IO NON VOTO");
					break;
				case '3':
					set_facebook_title("Referendum Costituzionale 2016 - IO VOTO NO");
					break;
				default:
					set_facebook_title("Referendum Costituzionale 2016 - ESAMINA E DECIDI");
			}
		});
		  
		//GAUGES LOGIC
		var opts = {
		  lines: 12,
		  angle: 0.15,
		  lineWidth: 0.44,
		  pointer: {
			length: 0.7,
			strokeWidth: 0.035,
			color: '#000000'
		  },
		  limitMax: 'true', 
		  //percentColors: [[0.0, "#F44336" ], [0.50, "#FFFFFF"], [1.0, "#4CAF50"]],
		  strokeColor: '#E0E0E0',
		  colorStart: '#4CAF50',
		  colorStop: '#F44336',
		  gradientType: 1,
		  generateGradient: true
		};
		
		//GAUGE 1
		pref_avg = $('#user-pref-stats-level1-1-avg').html();
		dec_pref_avg = parseFloat(pref_avg)+1;
		var target = document.getElementById('gauge-1');
		var gauge = new Gauge(target).setOptions(opts);
		gauge.maxValue = 2;
		gauge.animationSpeed = 32;
		gauge.set(2-dec_pref_avg);				
		
		//GAUGE 2
		pref_avg = $('#user-pref-stats-level1-2-avg').html();
		dec_pref_avg = parseFloat(pref_avg)+1;
		target = document.getElementById('gauge-2');
		gauge = new Gauge(target).setOptions(opts);
		gauge.maxValue = 2;
		gauge.animationSpeed = 32;
		gauge.set(2-dec_pref_avg);				
		
		//GAUGE 3
		pref_avg = $('#user-pref-stats-level1-3-avg').html();
		dec_pref_avg = parseFloat(pref_avg)+1;
		target = document.getElementById('gauge-3');
		gauge = new Gauge(target).setOptions(opts);
		gauge.maxValue = 2;
		gauge.animationSpeed = 32;
		gauge.set(2-dec_pref_avg);				
		
		//GAUGE 0
		pref_avg = $('#user-pref-stats-level1-0-avg').html();
		dec_pref_avg = parseFloat(pref_avg)+1;
		target = document.getElementById('gauge-0');
		gauge = new Gauge(target).setOptions(opts);
		gauge.maxValue = 2;
		gauge.animationSpeed = 32;
		gauge.set(2-dec_pref_avg);				
		
		
		//Progress bars LOGIC
		//Progress bar 1
		pref_cnt = $('#user-pref-stats-level1-1-cnt').html();
		pref_perc = parseFloat(pref_cnt)/7*100;
		$("#determinate-1").attr("style", "width: " + pref_perc + "%");
		//Progress bar 2
		pref_cnt = $('#user-pref-stats-level1-2-cnt').html();
		pref_perc = parseFloat(pref_cnt)/10*100;
		$("#determinate-2").attr("style", "width: " + pref_perc + "%");
		//Progress bar 3
		pref_cnt = $('#user-pref-stats-level1-3-cnt').html();
		pref_perc = parseFloat(pref_cnt)/13*100;
		$("#determinate-3").attr("style", "width: " + pref_perc + "%");
		//Progress bar 0
		pref_cnt = $('#user-pref-stats-level1-0-cnt').html();
		pref_perc = parseFloat(pref_cnt)/8*100;
		$("#determinate-0").attr("style", "width: " + pref_perc + "%");

		// Final vote logic
		$('.vc-finalVote').click( function(){
			var finalVote = $(this).attr('finalVote');
			var cookieId = $.cookie("VotoConsapevole");

			//open slide windows with call to action
			if(!$('#finel-vote-call-to-actions').is(':visible'))
				$("#finel-vote-call-to-actions").slideToggle();
			
			$(".vc-finalVote").removeClass("red white green grey blue");
			switch(finalVote) {
				case "favorevole":
					$('#final-vote-favorevole').addClass('green');
					$('#final-vote-astenuto').addClass('grey');
					$('#final-vote-contrario').addClass('grey');
					preference=1;
					set_facebook_title("Referendum Costituzionale 2016 - IO VOTO SI");
					ga('send', 'event', 'VotoFinale', 'voto', 'Favorevole');
					break;
				case "astenuto":
					$('#final-vote-favorevole').addClass('grey');
					$('#final-vote-astenuto').addClass('white');
					$('#final-vote-contrario').addClass('grey');
					preference=2;
					set_facebook_title("Referendum Costituzionale 2016 - IO NON VOTO");
					ga('send', 'event', 'VotoFinale', 'voto', 'Astenuto');
					break;
				case "contrario":
					$('#final-vote-favorevole').addClass('grey');
					$('#final-vote-astenuto').addClass('grey');
					$('#final-vote-contrario').addClass('red');
					preference=3;
					set_facebook_title("Referendum Costituzionale 2016 - IO VOTO NO");
					ga('send', 'event', 'VotoFinale', 'voto', 'Contrario');
					break;
				default:
					$('#final-vote-favorevole').addClass('blue');
					$('#final-vote-astenuto').addClass('blue');
					$('#final-vote-contrario').addClass('blue');
					preference=0;
					set_facebook_title("Referendum Costituzionale 2016 - ESAMINA E DECIDI");
			}
			$('div#final-vote-selected').html(preference);
			upsert_preference(cookieId, -1, -1, preference, -1);
		});	
		
		var userAgent = window.navigator.userAgent;
		if (!(userAgent.match(/iPad/i) || userAgent.match(/iPhone/i))) {
		   $('#vc-video-fab').removeAttr('style');
		}
		
		$('#vc-video-btn').click(function() {
			if(videoShown){
				var el_src = $('#vc-video-embed').attr("src");
				$('#vc-video-embed').attr("src",el_src);
			}
			videoShown = !videoShown;
		});
		
	}); // end of document ready
})(jQuery); // end of jQuery name space