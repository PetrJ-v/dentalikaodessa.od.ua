let cleanSpFilters = function () {
	$('.specialists-filters input[type=radio]:checked').prop('checked', false);
}
cleanSpFilters()
$('.filters__item').on('click', function () {
	let specializationClassName = $(this).prev().val(),
		width = $('body').width();
	//Логика
	// Если не мобильное устройство
	// спрятать все кроме нужного класса
	// В противном случае
		// Если отобранное количество больше одного, то
			// спрятать слайдер, показать новый слайдер
		// 	В противном случае - спрятать слайдер, показать отобранного врача
	if (specializationClassName != 'all') {
		let newSlides = $('.specialists ' + '.' + specializationClassName).clone(true),
			newSlidesCount = newSlides.length;

		let generateNew = function () {

			let newSlidesWrapper = $('<div>', {
				'class': 'specialists-new',
			});

			newSlidesWrapper.append(newSlides)
			return newSlidesWrapper
		}
		if (width > 479.98) {
			$('.specialists-wrapper').slideUp(800, function () {
				$('.specialists').hide(showNew)
				if ($('.specialists-new').length != 0) {
					$('.specialists-new').remove()
				}
			});
			let showNew = function () {
				$('.specialists-wrapper').append(generateNew())
				$('.specialists-wrapper').slideDown()
				$('.filters__item--all').show()
			}
		}
		else {
			$('.specialists-wrapper').slideUp(800, function () {
				$('.specialists').hide(showNew)
			});
			let showNew = function () {
				if ($('.specialists-new').length != 0) {
					$('.specialists-new').remove()
				}
				$('.specialists-wrapper').append(generateNew())
				setTimeout(function () {
					$('.specialists-wrapper').slideDown()
					if (newSlidesCount > 1) {
						$('.specialists-new').slick({
							slidesToShow: 1,
							infinite: false,
							arrows: false,
							dots: true,
						})
					}
					$('.filters__item--all').show()
				}, 300)
			}
		}
	}
	else {
		let resetSpecialists = function () {
			$('.specialists-new').remove()
			$('.specialists-wrapper').slideDown(function () {
				$('.specialists').slideDown()
			})

			$('.filters__item--all').hide()
			cleanSpFilters()
		}
		$('.specialists-wrapper').slideUp(800, resetSpecialists)
	}
})
