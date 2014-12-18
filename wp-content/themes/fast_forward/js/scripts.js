$(document).ready(function(){

$('select').selectBox();

$('iframe').each(function() {
  var url = $(this).attr("src");
  if ($(this).attr("src").indexOf("?") > 0) {
    $(this).attr({
      "src" : url + "&wmode=transparent",
      "wmode" : "Opaque"
    });
  }
  else {
    $(this).attr({
      "src" : url + "?wmode=transparent",
      "wmode" : "Opaque"
    });
  }
});

$('#mobile-menu').on('click',function(e){
	e.preventDefault();
	if($(this).hasClass('open')){
			$(this).removeClass('open');
			$('#nav ul').hide();
	}else{
		$(this).addClass('open');
		$('#nav ul').show();
	}
		
})
$('#anchor-top').on('click',function(e){
	e.preventDefault();
	var $target = $(this).attr('href');
	var animationSpeed = 500;
				$.scrollTo( '#header', animationSpeed, {
					easing: 'easeInOutExpo',
					offset: 0
				});
})

$('a.preorder').on('click',function(e){
	e.preventDefault();
	$( ".gform_wrapper" ).slideToggle( 200, function() {

	});
})
	$('#slider').slick({
		dots: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		lazyLoad: "ondemand"
  		//arrows: true
	});

	$('#testimonials-slider').slick({
		dots: true,
		autoplay: true,
  		autoplaySpeed: 5000,
  		arrows: true
	});

})

if($('#twitter-feed').length){ 
    var config1 = {
    "id": '543435321866989568',
    "domId": 'twitter-feed',
    "maxTweets": 2,
    "enableLinks": true
    };
    twitterFetcher.fetch(config1);
    }

