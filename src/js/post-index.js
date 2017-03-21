'use strict'

jQuery(function($) {
  var summary = '';
  var headings = $('article main').find('h2[class!="categories-list"], h3');

  headings.each(function(i) {
  	var text = $(this).text();
    if (text.indexOf('.') > 0) {
      text = text.substr(text.indexOf('.')+1);
    }
  	if ($(this).is('h2')) {
    	if (headings.eq(i + 1).is('h2')) {
  			summary += '<li><a href="#" class="index">'+text+'</a></li>';
      }
      else {
  			summary += '<li><a href="#" class="index">'+text+'</a>';
      }
    }
    else {
    	if (headings.eq(i + 1).is('h2')) {
      	if (headings.eq(i - 1).is('h2')) {
    			summary += '<ul><li><a href="#" class="index">'+text+'</a></li></ul></li>';
        }
        else {
        	summary += '<li><a href="#" class="index">'+text+'</a></li></ul></li>';
        }
      }
      else {
      	if (headings.eq(i - 1).is('h3')) {
    			summary += '<li><a href="#" class="index">'+text+'</a></li>';
        }
        else {
      		summary += '<ul><li><a href="#" class="index">'+text+'</a></li>';
        }
      }
    }
	});
  $('span.blog-index').after('<ol>'+ summary +'</ol>');

});
