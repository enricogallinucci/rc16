if (nibirumail_stop_jquery === undefined) {
    var nibirumail_stop_jquery = 0;
}
if (nibirumail_advice_text === undefined) {
    var nibirumail_advice_text = "Questo sito utilizza i cookies per offrirti un'esperienza di navigazione migliore. Usando il nostro servizio accetti l'impiego di cookie in accordo con la nostra cookie policy. <a target=\"_blank\" href=\"#vc-cookiePolicy\" class=\"modal-trigger\">Scoprine di pi&ugrave;</a>. <a class=\"nibirumail_agreement\" href=\"javascript:;\">Ho capito.</a>";
}

function _NibirumailGetStyle(el, prop) {
    if (typeof getComputedStyle !== 'undefined') {
        return getComputedStyle(el, null).getPropertyValue(prop);
    } else {
        return el.currentStyle[prop];
    }
}

function _NibirumailFadeOut(elem, ms) {
    if (!elem)
        return;

    if (ms) {
        var opacity = 1;
        var timer = setInterval(function() {
            opacity -= 50 / ms;
            if (opacity <= 0) {
                clearInterval(timer);
                opacity = 0;
                elem.style.display = "none";
                elem.style.visibility = "hidden";
            }
            elem.style.opacity = opacity;
            elem.style.filter = "alpha(opacity=" + opacity * 100 + ")";
        }, 50);
    } else {
        elem.style.opacity = 0;
        elem.style.filter = "alpha(opacity=0)";
        elem.style.display = "none";
        elem.style.visibility = "hidden";
    }
}

function _NibirumailAddEventListener(el, eventName, handler) {
    if (!!el.addEventListener) {
        el.addEventListener(eventName, handler);
    } else {
        el.attachEvent('on' + eventName, function() {
            handler.call(el);
        });
    }
}

function NibirumailgetCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

function NibirumailCookieAccept() {
    var now = new Date();
    now.setMonth(now.getMonth() + 3);
    var parts = location.hostname.split('.');
    var subdomain = parts.shift();
    var upperleveldomain = parts.join('.');
    var sndleveldomain = parts.slice(-2).join('.');
    console.log(sndleveldomain);
    document.cookie = 'nibirumail_cookie_advice=1; expires=' + now.toUTCString() + '; path=/;';
    //document.cookie = 'nibirumail_cookie_advice=1; expires='+now.toUTCString()+'; path=/; domain='+sndleveldomain;
}

function init_NibirumailCookieWidget() {
    if (NibirumailgetCookie('nibirumail_cookie_advice') === undefined) {
        var el = document.getElementById('nibirumail_cookie_advice');

        if (!el) {
            var div = document.createElement('div');
            div.id = 'nibirumail_cookie_advice';

            document.body.appendChild(div);

            el = div;
        }

        el.innerHTML = nibirumail_advice_text;

        el.style.zIndex = 2147483647; // max of integer for 32bit
        el.style.position = 'fixed';
        el.style.bottom = 0;
        el.style.left = 0;
        el.style.width = '100%';
        el.style.background = '#000';
        el.style.color = '#fff';
        el.style.textAlign = 'center';
        el.style.padding = '15px 0';
        el.style.fontSize = '12px';
        var links = el.querySelectorAll('a');
        var i;

        for (i = 0; i < links.length; i++) {
            links[i].style.color = '#fff';
            links[i].style.textDecoration = 'underline';
        }

        var height = _NibirumailGetStyle(el, 'height');
        //document.body.style.paddingBottom = height; 


        var n = el;

        var agreementLinks = document.querySelectorAll('.nibirumail_agreement');

        for (i = 0; i < agreementLinks.length; i++) {
            var agree = agreementLinks[i];

            _NibirumailAddEventListener(agree, 'click', function() {
                NibirumailCookieAccept();

                var el = document.getElementById('nibirumail_cookie_advice');

                if (el) {
                    _NibirumailFadeOut(el, 400);
                    setTimeout(function() {
                        document.body.style.paddingBottom = 'auto';
                    }, 400);
                }

                if (typeof NibirumailCookieBlocker == 'function') {
                    NibirumailCookieBlocker(1);
                }
                if (typeof NibirumailCookieAccept_callback == 'function') {
                    NibirumailCookieAccept_callback();
                }
            });
        }
    }

    var deleteCookies = document.querySelectorAll('.nibirumail_delete_cookie');

    for (i = 0; i < deleteCookies.length; i++) {
        var deleteCookie = deleteCookies[i];

        _NibirumailAddEventListener(deleteCookie, 'click', function() {
            document.cookie = 'nibirumail_cookie_advice=1; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
            document.location.reload();
        });
    }

}
init_NibirumailCookieWidget();