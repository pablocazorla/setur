var onLoadImages = function(selection, callback) {

	"use strict";

	var $img = jQuery(selection).find('img'),
		length = $img.length,
		count = 0,
		ready = false,
		verifyImg = function() {
			if (count === length && !ready) {
				console.log('ready');
				ready = true;
				callback();
			}
		};

	$img.each(function() {
		if (this.complete) {
			count++;
		} else {
			jQuery(this).load(function() {
				count++;
				verifyImg();
			}).error(function() {
				count++;
				verifyImg();
			});
		}
		verifyImg();
	});
};

/* Slider Multiple */
(function($) {

	"use strict";

	$.fn.sliderMultiple = function(options) {
		//Settings
		/*var setting = $.extend({
			duration: 200
		}, options);*/

		return this.each(function() {

			var $wrap = $(this).find('.slider-multiple-wrap'),
				wrap_width,
				$ul = $wrap.find('ul'),
				ul_width,
				dif_width = 0,
				$li = $ul.find('>li'),
				li_width,
				length = $li.length,
				running = false,
				current = 0,

				$arrowLeft = $('<div class="arrow arrow-left"></div>').appendTo(this),
				$arrowRight = $('<div class="arrow arrow-right"></div>').appendTo(this),

				resetPosition = function() {
					if (!running) {
						$ul.css('left', Math.round(dif_width / 2) + 'px');
						$arrowLeft.hide();
						$arrowRight.hide();
					} else {
						$ul.css('left', '0px');
						current = 0;
						$arrowLeft.show().addClass('disabled');
						$arrowRight.show().removeClass('disabled');
					}
				},
				setSize = function() {
					console.log('setSize');
					li_width = $li.outerWidth(true);
					var h = $li.height();

					wrap_width = $wrap.width();
					ul_width = li_width * length;

					$wrap.height(h);
					$ul.width(ul_width + 2).height(h);

					dif_width = wrap_width - ul_width;

					running = (dif_width > 0) ? false : true;

					resetPosition();
				},
				change = function(direction) {
					if (running) {
						var next = current + direction,
							left = -1 * next * li_width;

						var l;

						if (left > dif_width) {
							l = left;
							current = next;
							$arrowRight.removeClass('disabled');
						} else {
							l = dif_width;
							$arrowRight.addClass('disabled');
						}
						$ul.css('left', l + 'px');
						if (current > 0) {
							$arrowLeft.removeClass('disabled');
						} else {
							$arrowLeft.addClass('disabled');
						}
					}
				};

			setSize();
			$(window).resize(setSize);
			onLoadImages(this, function(){
				setSize();
				setTimeout(function(){
					setSize();
				},1000);
			});


			$arrowLeft.click(function() {
				if (!$(this).hasClass('disabled')) {
					change(-1);
				}
			});
			$arrowRight.click(function() {
				if (!$(this).hasClass('disabled')) {
					change(1);
				}
			});
		});
	};
})(jQuery);

var Setur = function($) {

	"use strict";

	// For home
	$('.slider-multiple').sliderMultiple();

	// Registration form format
	$('.home-registracion').each(function() {
		var $this = $(this);
		var placeholderArray = ['Nombre de usuario', 'Cel 0', '15', 'E-mail', 'Repetir e-mail'],
			classArray = ['un', 'tel tel-1', 'tel', 'em', 'em'];
		$this.find('.simplr-field, .option-field').each(function(i) {
			$(this).addClass(classArray[i]).find('input').attr('placeholder', placeholderArray[i]);
		});
		$this.find('.submit').addClass('btn btn-primary');
		$this.find('.simplr-message.error').each(function(i) {
			if (i === 0) {
				$(this).show().text('Por favor, complete todos los campos correctamente.');
			}
		});
		$this.find('.simplr-message.success').each(function(i) {
			if (i === 0) {
				$(this).show().text('Su registration ha sido exitosa. Por favor, revise su casilla de e-mail para confirmar.');
			}
		});
	});



};
jQuery('document').ready(function() {
	Setur(jQuery);
});