(function($){
	
  $(function(){
//DEBUG SCREEN AND VIEWPORT SIZE
/*	$( window ).resize(function() {
		var debug_html = "window.screen.availWidth [DISPLAY]: " + window.screen.availWidth + "<BR>";
		debug_html += "window.screen.availHeight [DISPLAY]: " + window.screen.availHeight + "<BR>";
		debug_html += "$( window ).width() [BROWSER VIEWPORT]: " + $( window ).width() + "<BR>";
		debug_html += "$( window ).height() [BROWSER VIEWPORT]: " + $( window ).height() + "<BR>";
		debug_html += "$( document ).width() [HTML DOCUMENT]: " + $( document ).width() + "<BR>";
		debug_html += "$( document ).height() [HTML DOCUMENT]: " + $( document ).height() + "<BR>";
		
		$('#debug').html(debug_html);
	}).resize();
*/
	//$('#send-message-return-frm').submit();
	
	
    var window_width = $(window).width();
	
    // convert rgb to hex value string
    function rgb2hex(rgb) {
      if (/^#[0-9A-F]{6}$/i.test(rgb)) { return rgb; }

      rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

      if (rgb === null) { return "N/A"; }

      function hex(x) {
          return ("0" + parseInt(x).toString(16)).slice(-2);
      }

      return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    $('.dynamic-color .col').each(function () {
      $(this).children().each(function () {
        var color = $(this).css('background-color'),
            classes = $(this).attr('class');
        $(this).html(rgb2hex(color) + " " + classes);
        if (classes.indexOf("darken") >= 0 || $(this).hasClass('black')) {
          $(this).css('color', 'rgba(255,255,255,.9');
        }
      });
    });

    // Floating-Fixed table of contents
    setTimeout(function() {
      var tocWrapperHeight = 260; // Max height of ads.
      var tocHeight = $('.toc-wrapper .table-of-contents').length ? $('.toc-wrapper .table-of-contents').height() : 0;
      var socialHeight = 95; // Height of unloaded social media in footer.
      var footerOffset = $('body > footer').first().length ? $('body > footer').first().offset().top : 0;
      var bottomOffset = footerOffset - socialHeight - tocHeight - tocWrapperHeight;

      if ($('nav').length) {
        $('.toc-wrapper').pushpin({
          top: $('nav').height(),
          bottom: bottomOffset
        });
      }
      else if ($('#index-banner').length) {
        $('.toc-wrapper').pushpin({
          top: $('#index-banner').height(),
          bottom: bottomOffset
        });
      }
      else {
        $('.toc-wrapper').pushpin({
          top: 0,
          bottom: bottomOffset
        });
      }
    }, 100);

    // Toggle Flow Text
    var toggleFlowTextButton = $('#flow-toggle');
    toggleFlowTextButton.click( function(){
      $('#flow-text-demo').children('p').each(function(){
          $(this).toggleClass('flow-text');
        });
    });

	// send mail logic
    $('#form-mail-submit').click( function(){
		var sender = $('#sender').val();
		var object = $('#object').val();
		var message = $('#message').val();
		
		if (sender!='' && object!='' && message!='')
			ajax_send_mail(sender, object, message);
		else
			Materialize.toast('Inserire tutti i campi necessari', 4000, 'red');
		
    });	
	
//    Toggle Containers on page
    var toggleContainersButton = $('#container-toggle-button');
    toggleContainersButton.click(function(){
      $('body .browser-window .container, .had-container').each(function(){
        $(this).toggleClass('had-container');
        $(this).toggleClass('container');
        if ($(this).hasClass('container')) {
          toggleContainersButton.text("Turn off Containers");
        }
        else {
          toggleContainersButton.text("Turn on Containers");
        }
      });
    });

    // Detect touch screen and enable scrollbar if necessary
    function is_touch_device() {
      try {
        document.createEvent("TouchEvent");
        return true;
      } catch (e) {
        return false;
      }
    }
    if (is_touch_device()) {
      $('#nav-mobile').css({ overflow: 'auto'});
    }

    // Set checkbox on forms.html to indeterminate
    var indeterminateCheckbox = document.getElementById('indeterminate-checkbox');
    if (indeterminateCheckbox !== null)
      indeterminateCheckbox.indeterminate = true;


    // Plugin initialization
    $('.carousel.carousel-slider').carousel({full_width: true});
    $('.carousel').carousel();
    $('.slider').slider({full_width: true});
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('.scrollspy').scrollSpy();
    $('.button-collapse').sideNav({'edge': 'left'});
    $('.datepicker').pickadate({selectYears: 20});
    $('select').not('.disabled').material_select();
    $('input.autocomplete').autocomplete({
      data: {"Apple": null, "Microsoft": null, "Google": 'http://placehold.it/250x250'}
    });

    $('.chips-initial').material_chip({
      readOnly: true,
      data: [{
        tag: 'Apple',
      }, {
        tag: 'Microsoft',
      }, {
        tag: 'Google',
      }]
    });

    $('.chips-placeholder').material_chip({
      placeholder: 'Enter a tag',
      secondaryPlaceholder: '+Tag',
    });

    $('.chips').material_chip();
    
    $('.collapsible-header').click(function(){
		var level3id = $(this).attr('level3_id');
    	if($(this).hasClass('active')){
        	$(this).find('.material-icons').html('expand_more');
			ga('send', 'event', 'Esamina', 'Livello3', 'chiudi', level3id);
        }else{
        	$(this).find('.material-icons').html('expand_less');
			ga('send', 'event', 'Esamina', 'Livello3', 'apri', level3id);
		}
		
    });
	
	$('#toggleLed').click(function(evt){
		evt.preventDefault();
		if($('#preference-overview').css('display') == 'none'){
			$('#preference-overview').css('display','table');
			$('#toggleLed').text('Nascondi il tuo stato di avanzamento');
		}
		else{
			$('#preference-overview').css('display','none');
			$('#toggleLed').text('Visualizza il tuo stato di avanzamento');
		}
	});
	
	$('#toggleHelper').click(function(evt){
		evt.preventDefault();
		if($('#vc-helper').css('display') == 'none'){
			$('#vc-helper').css('display','block');
			$('#toggleHelper').text('Nascondi i dettagli su come leggere i contenuti');
		}
		else{
			$('#vc-helper').css('display','none');
			$('#toggleHelper').text('Scopri come leggere i contenuti');
		}
	});

  }); // end of document ready
})(jQuery); // end of jQuery name space
