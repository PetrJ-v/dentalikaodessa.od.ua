// document.addEventListener('touchstart', onTouchStart, {passive: true});
// $('body').removeClass('no-js')
var $ = jQuery.noConflict();
$('.header-slider').slick({
	slidesToShow: 1,
	arrows: false,
	dots: true,
	initialSlide: 1,
});
var width = $('body').width();
serviceSlider = function(width){
	let serviceSlider = $('.services-slider');
	switch (true) {
		case width < 575.98:
			if (!serviceSlider.hasClass('slick-initialized')) {
				serviceSlider.slick({
					slidesToShow: 1,
					initialSlide: 3,
					arrows: false,
					dots: true,
					infinite: false,
					centerMode: true,
					centerPadding: '70px',
					lazyLoad: 'progressive',
					responsive: [
						{
							breakpoint: 479.98,
							settings: {
								centerMode: false,
							}
						},
					]
				});
			}
			break;
		case width > 575.98:
			setTimeout( function(){
				if (serviceSlider.hasClass('slick-initialized')) {
					serviceSlider.slick('unslick');
				}
			}, 100 )
		default:
			break;
	}
}
serviceSlider(width);

var specialistsSlider = function (width) {
	let specialistsSlider = $('.specialists');
	switch (true) {
		case width < 479.98:
			if (!specialistsSlider.hasClass('slick-slider')) {
				specialistsSlider.slick({
					slidesToShow: 1,
					infinite: false,
					arrows: false,
					dots: true,
					lazyLoad: 'progressive',
				});
			}
			break;

		default:
			if (specialistsSlider.hasClass('slick-slider')) {
				specialistsSlider.slick('unslick')
			}
			break;
	}
}
specialistsSlider(width);
$(window).on('resize', function(){
	width = $('body').width();
	serviceSlider(width);
	specialistsSlider(width);
})


$('.art-preview-slider').slick({
	slidesToShow: 1,
	arrows: true,
	prevArrow: $('.articles-btns__item--left'),
	nextArrow: $('.articles-btns__item--right'),
	autoplay: true,
	autoplay: false,
	pauseOnHover: false,
	lazyLoad: 'progressive',
});

setTimeout(() => {

	$('.partners-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		arrows: false,
		dots: true,
		autoplay: true,
		pauseOnHover: false,
		lazyLoad: 'progressive',
		responsive: [
			{
				breakpoint: 991.98,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 575.98,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
		]
	});

}, 1500)
// Реализация выключения не активной кнопки слайдера
$('.slider-btns').on('click', function () {

	let spButtons = $(this).find('.slider-btns__item')
	spButtons.each(function () {
		$this = $(this)
		if ($this.hasClass('slick-disabled')) {
			$this.prop('disabled', true);
		}
		else {
			$this.prop('disabled', false)
		}
	})
})
$('.plus-btn').on('click', function () {
	$this = $(this);
	$this.toggleClass('plus-btn--active');
	var ansver = $this.closest('.question').next('.answer');

	ansver.slideToggle();
})
$('.foto-slider').slick({
	slidesToShow: 3,
	arrows: true,
	prevArrow: $('.foto-btns__item--left'),
	nextArrow: $('.foto-btns__item--right'),
	autoplay: true,
	pauseOnHover: false,
	lazyLoad: 'progressive',
	responsive: [
		{
			breakpoint: 991.98,
			settings: {
				slidesToShow: 2,
				centerMode: true,
				centerPadding: '50px',
				initialSlide: 2,
				infinite: true,
			}
		},
		{
			breakpoint: 575.98,
			settings: {
				slidesToShow: 1,
				centerMode: true,
				centerPadding: '50px',
				initialSlide: 2,
				infinite: true,
			}
		},
	]
});
$('.feedbacks-slider').slick({
	slidesToShow: 2,
	arrows: true,
	prevArrow: $('.feedbacks-btns__item--left'),
	nextArrow: $('.feedbacks-btns__item--right'),
	infinite: false,
	swipe: false,
	lazyLoad: 'progressive',
	responsive: [
		{
			breakpoint: 575.98,
			settings: {
				slidesToShow: 1,
				swipe: false,
			}
		},
	]
});

let switchMenu = function (hamburger, callback) {
	hamburger.toggleClass('is-active')

	$('.header__menu-wrapper').fadeToggle(callback)
}
$('.hamburger').on('click', function () {
	let hamburger = $(this)
	switchMenu(hamburger)
})

// popup function
var ajaxErrorFunc = function(jqXHR, exception){
	if (jqXHR.status === 0) {
		console.error('Not connect. Verify Network.')
	} else if (jqXHR.status == 404) {
		console.error('Requested page not found (404).')
	} else if (jqXHR.status == 500) {
		console.error('Internal Server Error (500).')
	} else if (exception === 'parsererror') {
		console.error('Requested JSON parse failed.')
	} else if (exception === 'timeout') {
		console.error('Time out error.')
	} else if (exception === 'abort') {
		console.error('Ajax request aborted.')
	} else {
		console.error('Uncaught Error. ' + jqXHR.responseText)
	}
}
$('.sign-btn').on('click', function(){

	const data = {
		"action": "get_contacts_popup"
	}
	let url = window.location.href,
		ajaxUrl = (url.includes('/ua/')) ? '/ua/wp-admin/admin-ajax.php' : '/wp-admin/admin-ajax.php';
	$.ajax({
		url: ajaxUrl,
		data: data,
		type: "POST",
		success: function (answer) {
			$('.popup-wrapper').append(answer)
			$('.popup-wrapper').fadeIn()
		},
		error: function(jqXHR, exception){
			$('.popup-wrapper').append("Ajax sending error. Check brauser console for detail.")
			$('.popup-wrapper').fadeIn()
			ajaxErrorFunc(jqXHR, exception)
		}
	});
})

// $('#review-btn').on('click', function(){

// 	const data = {
// 		"action": "get_review_popup"
// 	}
// 	let url = window.location.href,
// 		ajaxUrl = (url.includes('/ua/')) ? '/ua/wp-admin/admin-ajax.php' : '/wp-admin/admin-ajax.php';
// 	$.ajax({
// 		url: ajaxUrl,
// 		data: data,
// 		type: "POST",
// 		success: function (answer) {
// 			$('.popup-wrapper').append(answer)
// 			$('.popup-wrapper').fadeIn()
// 		},
// 		error: function(jqXHR, exception){
// 			alert('Ajax sending error. Check brauser console for detail.')
// 			ajaxErrorFunc(jqXHR, exception)
// 		}
// 	});
// })

// $('body').on('submit', '#review-form', function (e) {
// 	e.preventDefault();
// 	let form = $(this),
// 		url = form.attr('action'), //в url включен get параметр с именем функции, которую нужно выполнить
// 		data = form.serialize();
// 	$.ajax({
// 		url: url,
// 		data: data,
// 		dataType:'json',
// 		type: "POST",
// 		success: function (answer) {
// 			if (answer['id'] != 0) {
// 				$('.form-message').addClass('form-message--success')
// 				$('#form-message').html(answer['message'])
// 				setTimeout(function(){
// 					clearPopup()
// 				}, 4000)
// 			}
// 			else{
// 				console.error(answer['message'])
// 				$('.form-message').addClass('form-message--fail')
// 				$('#form-message').html(answer['message'])
// 				setTimeout(function(){
// 					clearPopup()
// 				}, 4000)
// 			}
// 		},
// 		error: function (jqXHR, exception) {
// 			$('.form-message').addClass('form-message--fail')
// 				$('#form-message').html('Ajax sending error. Check brauser console for detail.')
// 				setTimeout(function(){
// 					clearPopup()
// 				}, 4000)
// 			ajaxErrorFunc(jqXHR, exception)
// 		}
// 	});
// })
var clearPopup = function(){
	$('.popup-wrapper').fadeOut(600, function () {
		$('.popup-inner').remove()
	})
}
$('body').on('click', '.popup__close-btn', () => {
	clearPopup()
})
$(document).on('keyup', function (e) {
	if (e.key === "Escape") {
		if ($('.popup-wrapper').length != 0) {
			clearPopup()
		}
	}
});

// Navigate function
let navigateFunc = function (destination, topMargin) {
	topMargin = (topMargin != undefined) ? topMargin : 0
	if ($(destination).length != 0) {
		$('html, body').animate({ scrollTop: $(destination).offset().top - topMargin }, 800, 'linear') // анимируем скроолинг к элементу destination
	}
};

$('nav a').each(function () {
	$(this).on('click', function (e) {

		let $this = $(this),
			destination = $this.attr('href'),
			hamburger = $('.hamburger');

		if ( destination.indexOf('#') ==0 ) {
			e.preventDefault();
			if (hamburger.hasClass('is-active')) {
				let goToDest = function () {
					navigateFunc(destination)
				}
				switchMenu(hamburger, goToDest)
			}
			else {
				navigateFunc(destination);
			}
		}
	})
})
$('.sertificates-slider--v').slick({
	slidesToShow: 3,
	infinite: false,
	prevArrow: $('.sertificates-btns__item-v--left'),
	nextArrow: $('.sertificates-btns__item-v--right'),
	responsive: [
		{
			breakpoint: 767.98,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 575.98,
			settings: {
				slidesToShow: 1,
			}
		},
	]
});

$('.sertificates-slider--hor').slick({
	slidesToShow: 3,
	infinite: false,
	prevArrow: $('.sertificates-btns__item-hor--left'),
	nextArrow: $('.sertificates-btns__item-hor--right'),
	responsive: [
		{
			breakpoint: 767.98,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 575.98,
			settings: {
				slidesToShow: 1,
			}
		},
	]
});

let pushResourcesFunc = function (cssAr, jsAr) {
	let deferred = new $.Deferred
	body = document.getElementsByTagName('body')[0]; // получаем ссылку на тег body документа
	if (cssAr) {
		cssAr.forEach(function (item, i, arr) {
			let link = document.createElement('link')
			link.rel = 'stylesheet'
			link.href = item
			body.appendChild(link)
		})
	}
	if (jsAr) {
		jsAr.forEach(function (item, i, arr) {
			let script = document.createElement('script');
			script.type = 'text/javascript'
			script.src = item;
			body.appendChild(script)
		})
	}
	setTimeout(function () {
		deferred.resolve()
	}, 100)

	return deferred.promise()
}

let elems = [
	{
		wrapper: $('.filters'),
		goTopAction: true,
		goDownAction: false,
		hanbdler: function () {
			let jsAr = ['https://dentalikaodessa.od.ua/wp-content/themes/dentalika/accets/js/sp-filters.js?ver=1.0.2']
			pushResourcesFunc(false, jsAr)
		}
	},
	{
		wrapper: $('.feedbacks'),
		goTopAction: true,
		goDownAction: false,
		hanbdler: function () {
			let cssAr = [
				'https://dentalikaodessa.od.ua/wp-content/themes/dentalika/accets/libs/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css',
				'https://dentalikaodessa.od.ua/wp-content/themes/dentalika/accets/css/malihu-custom-scrollbar-user-styles.css'
			],
				jsAr = ['https://dentalikaodessa.od.ua/wp-content/themes/dentalika/accets/libs/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js'];

			pushResourcesFunc(cssAr, jsAr).done(function () {
				$('.feedback__text').mCustomScrollbar({
					theme: "dark",
				})
			})
		}
	},
]

let checkElement = function (elem) {
	if ($(elem.wrapper).length != 0) {
		var docViewTop = $(window).scrollTop(),
			docViewBottom = docViewTop + $(window).height(),
			elemWrapperTop = $(elem.wrapper).offset().top;
		// elemWrapperBottom = elemWrapperTop + $(elem.wrapper).height();
		// elemWrapperhalf = elemWrapperTop + $(elem.wrapper).height() / 2;

		switch (true) {

			case (elemWrapperTop <= docViewBottom):
				if (elem.goTopAction) {
					elem.hanbdler()
					elem.goTopAction = false;
				}
				break;

			default:
				break;
		}
	}
};

let checkMenu = function(width){
	let topTrigger = $(window).height() * 1.5,
		topPozition = $(window).scrollTop(),
		$body = $('body');

	if (width < 767.98 && topPozition > topTrigger) {
		if ( !$body.hasClass('fixed-menu') ) {
			$body.addClass('fixed-menu');
		}
	}
	else {
		$body.removeClass('fixed-menu');
	}
}

$(window).on('scroll', function () {
	$(elems).each(function () {
		let elem = this
		checkElement(elem)
	})
	if (width < 767.98) {
		checkMenu(width);
	}
})

//to top button__________________________________________start
var toTop = function () {
	var topBtn = $('.top-btn');
	topBtn.on('click', function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
	})
}();
//to top button____________________________________________end

// Edit pugination template to add o before numbers
let pagination = $('#pagination-wrapper')
if (pagination.length != 0) {
	let paginationNumbers = pagination.find('.page-numbers');
	paginationNumbers = paginationNumbers.slice(0, paginationNumbers.length-1);
	paginationNumbers.each(function(){
		let $this = $(this);
		const isNumeric = n => !isNaN(n);
		if (isNumeric($this.html()) && $this.html() < 10) {
			$this.html('0' + $this.html())
		}
	})
}
