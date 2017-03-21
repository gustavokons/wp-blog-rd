'use strict'

jQuery(function($) {
  var utm_source = getUrlParameter('utm_source');
  var utm_campaign = getUrlParameter('utm_campaign');
  var utm_medium = getUrlParameter('utm_medium');
  var utm_content = getUrlParameter('utm_content');
  var c_utmz = '';
  if (utm_source || utm_medium) {
    c_utmz = '00000000.0000000000.00.00.utmcsr='+utm_source+'|utmccn='+utm_campaign+'|utmcmd='+utm_medium+'|utmcct='+utm_content;
  }
  else if (document.referrer) {
    if (document.referrer.indexOf('google.com')) {
      c_utmz = '00000000.0000000000.00.00.utmcsr=google|utmccn=|utmcmd=organic|utmcct=';
    }
    else {
      c_utmz = '00000000.0000000000.00.00.utmcsr='+document.referrer+'|utmccn=|utmcmd=referral|utmcct=';
    }
  }
  else {
    c_utmz = '00000000.0000000000.00.00.utmcsr=direct|utmccn=|utmcmd=|utmcct=';
  }
  var utm_field = $('#conversion-form input').first().clone();
  utm_field.attr('name', 'c_utmz');
  utm_field.attr('id', 'c_utmz');
  utm_field.attr('value', c_utmz);
  utm_field.attr('type', 'hidden');
  $('#conversion-form').prepend(utm_field);
});

function getUrlParameter(search_param) {
  var url_part = window.location.search.substring(1);
	var decoded_url_part = decodeURIComponent(url_part);
	var params = decoded_url_part.split('&');

	for (i = 0; i < params.length; i++) {
		param = params[i].split('=');
		if (search_param == param[0]) {
			return param[1];
		}
	}
}
