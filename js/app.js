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
			onLoadImages(this, function() {
				setSize();
				setTimeout(function() {
					setSize();
				}, 1000);
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

/* Slider Simple */
(function($) {

	"use strict";

	$.fn.sliderSimple = function(options) {
		//Settings
		/*var setting = $.extend({
			duration: 200
		}, options);*/

		return this.each(function() {

			var $this = $(this),
				$li = $this.find('li'),
				current = 0,
				length = $li.length,
				$prev = $this.find('.arrow.arrow-left').hide(),
				$next = $this.find('.arrow.arrow-right'),
				$paginator = $this.find('.slide-paginator'),
				$paginatorSpan = false,

				change = function(num) {
					if (num !== current && num >= 0 && num < length) {
						var dir = (num > current) ? -1 : 1;
						if (num === 0) {
							$prev.hide();
						} else {
							$prev.show();
						}
						if (num === (length - 1)) {
							$next.hide();
						} else {
							$next.show();
						}

						$li.eq(current).css('left', dir * 100 + '%');
						$li.eq(num).css('left', '0%');
						current = num;
						if ($paginatorSpan) {
							$paginatorSpan.removeClass('current').eq(current).addClass('current');
						}
					}
				};

			$li.eq(0).css('left', '0%');

			$prev.click(function() {
				change(current - 1);
			});
			$next.click(function() {
				change(current + 1);
			});
			$paginator.each(function() {
				var str = '';
				for (var j = 0; j < length; j++) {
					var cl = (j === 0) ? ' class="current"' : '';
					str += '<span' + cl + '></span>';
				}
				$paginator.html(str).show();

				$paginatorSpan = $paginator.find('span').each(function(index) {
					$(this).click(function() {
						change(index);
					});
				});
			});
		});
	};
})(jQuery);

var validation = (function($) {

	"use strict";

	var messages = {
		'required': 'Complete este campo',
		'email': 'Escriba su email correctamente',
		'number': 'Por favor, utilice sólo números',
		'compare': 'El e-mail no coincide'
	};

	var isEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i,
		isNumber = /^-?\d\d*$/;


	var v = function(context) {
		return this.init(context);
	};

	v.prototype = {
		init: function(context) {
			this.$context = $(context);

			this.reload();
			return this;
		},
		reload: function() {
			this.inputs = [];
			this.length = 0;
			var self = this;
			this.$context.find('input,select,textarea').each(function() {
				var $this = $(this),
					dataVal = $this.attr('data-validate');
				if (dataVal !== undefined && dataVal !== '') {
					var $fieldset = $this.parent(),
						$message = $fieldset.find('.error-message');
					if ($message.length === 0) {
						$message = $('<div class="error-message"></div>').appendTo($fieldset);
					}
					var item = {
						$input: $this,
						$fieldset: $fieldset,
						$message: $message,
						data: dataVal
					};
					self.inputs.push(item);
					self.length++;
				}
			});
			return this;
		},
		validate: function(callback) {
			var cbk = callback || function() {};
			var valid = true;
			for (var i = 0; i < this.length; i++) {
				var item = this.inputs[i];

				item.$fieldset.removeClass('error');

				var str = item.$input.val();

				var dataArray = item.data.split(',');
				for (var j = dataArray.length - 1; j >= 0; j--) {
					var tp = $.trim(dataArray[j].split(':')[0]);

					switch (tp) {
						case 'required':
							if (str.length < 1) {
								item.$message.text(messages[tp]);
								item.$fieldset.addClass('error');
								valid = false;
							}
							break;
						case 'email':
							if (!isEmail.test(str)) {
								item.$message.text(messages[tp]);
								item.$fieldset.addClass('error');
								valid = false;
							}
							break;
						case 'number':
							if (!isNumber.test(str)) {
								item.$message.text(messages[tp]);
								item.$fieldset.addClass('error');
								valid = false;
							}
							break
						case 'compare':
							var idComp = $.trim(dataArray[j].split(':')[1]),
								strComp = $.trim($('#' + idComp).val());

							if (strComp !== str) {
								item.$message.text(messages[tp]);
								item.$fieldset.addClass('error');
								valid = false;
							}
							break
						default:
							//
					}
				}
			}
			if (valid) {
				cbk();
			}
			return valid;
		},
		clear: function() {
			for (var i = 0; i < this.length; i++) {
				this.inputs[i].$fieldset.removeClass('error');
				this.inputs[i].$input.val('');
			}
			return this;
		},
		clearErrors: function() {
			for (var i = 0; i < this.length; i++) {
				this.inputs[i].$fieldset.removeClass('error');
			}
			return this;
		}
	};

	return function(context) {
		return new v(context);
	};
})(jQuery);

var Setur = function($) {

	"use strict";

	// HOME
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

	// HOME, CATEGORIES & DETAILS
	$('.testimonios-container').each(function() {
		var $this = $(this),
			$li = $this.find('li'),
			$prev = $this.find('.testimonios-prev'),
			$next = $this.find('.testimonios-next'),
			current = 0,
			length = $li.length,
			duration = 700,
			changing = false,
			change = function(dir) {
				if (!changing) {
					changing = true;
					var next = current + dir,
						topCurrent = dir * -100,
						topNext = -1 * topCurrent;

					next = (next < 0) ? length - 1 : next;
					next = (next >= length) ? 0 : next;

					$li.eq(current).animate({
						'top': topCurrent + '%'
					}, duration);

					$li.eq(next).css('top', topNext + '%').animate({
						'top': '0%'
					}, duration, function() {
						current = next;
						changing = false;
					});
				}
			};
		$li.eq(0).css('top', '0');
		$prev.click(function() {
			change(-1);
		});
		$next.click(function() {
			change(1);
		});
	});

	// DETAILS
	$('.slider').sliderSimple();
	$('#detail-contact').each(function() {
		var $this = $(this),
			$fase1 = $this.find('.detail-contact-h3-1,.detail-contact-text-1,.fieldset-message,.btn-continuar'),
			$fase2 = $this.find('.detail-contact-h3-2,.detail-contact-text-2,.fieldset-name,.fieldset-tel,.fieldset-email,.submit-contact'),
			currentFase = 1,
			duration = 250,
			$textarea = $this.find('.messageInput'),
			changeFase = function(num) {
				if (num === 2) {
					if ($.trim($textarea.val()) !== '') {
						$fase1.hide();
						$fase2.fadeIn(duration);
					}
				} else {
					$fase1.fadeIn(duration);
					$fase2.hide();
				}

			},
			$btnContinuar = $this.find('.btn-continuar'),
			$btnEnviar = $this.find('.submit-contact').val('Enviar');

		$btnContinuar.click(function(e) {
			e.preventDefault();
			changeFase(2);
		});
	});
	$('a.url').each(function() {
		var $this = $(this),
			href = $this.attr('href');
		if (href.indexOf('http://') === -1 && href.indexOf('https://') === -1) {
			$this.attr('href', 'http://' + href);
		}
	});

	// FORM RESERVAS
	$('#form_reserva').each(function() {

		var $form = $(this),
			url = $form.attr('action'),
			reservaValidation = validation('#form_reserva').clear(),

			dataJson = {},

			numPasajeros = 1,
			//	$pasajeroCount = $('#pasajeroCount'),
			htmlPasajero = $('.pasajero-container').html(),
			$agregarPasajero = $('#agregar-pasajero'),
			addPasajero = function() {
				numPasajeros++;
				var $newPasajero = $('<div class="pasajero-container">' + htmlPasajero + '</div>').hide();

				$agregarPasajero.before($newPasajero);
				$newPasajero.find('.num-pasajero').text(numPasajeros);
				$newPasajero.slideDown(300);
				reservaValidation.reload();
			},

			$confirmarReserva = $('#confirmarReserva').attr('disabled', false),
			confirmarReservaText = $confirmarReserva.val(),

			$success = $form.find('.success'),

			waitToSend = false,

			procesar = function() {
				if (!waitToSend) {
					dataJson = {};

					var fields = [
							'destino',
							'hotel',
							'hotelLink',
							'comentarioAdicional',
							'email',
							'cuil'
						],
						length = fields.length;
					for (var i = 0; i < length; i++) {
						dataJson[fields[i]] = $('#' + fields[i] + 'Input').val();
					}

					dataJson.pasajeros = {};
					var $nombrePasajeroInput = $('.nombrePasajeroInput'),
						$apellidoPasajeroInput = $('.apellidoPasajeroInput'),
						$docPasajeroInput = $('.docPasajeroInput'),
						$dniPasajeroInput = $('.dniPasajeroInput');
					for (var i = 0; i < numPasajeros; i++) {
						dataJson.pasajeros['pasajero' + i] = {};
						dataJson.pasajeros['pasajero' + i]['nombre'] = $nombrePasajeroInput.eq(i).val();
						dataJson.pasajeros['pasajero' + i]['apellido'] = $apellidoPasajeroInput.eq(i).val();
						dataJson.pasajeros['pasajero' + i]['doc'] = $docPasajeroInput.eq(i).val();
						dataJson.pasajeros['pasajero' + i]['dni'] = $dniPasajeroInput.eq(i).val();
					}

					$confirmarReserva.attr('disabled', true).val('ENVIANDO...');

					waitToSend = true;
					$.ajax({
						type: "POST",
						url: url,
						data: dataJson,
						success: function(data) {
							$success.fadeIn(200);
							reservaValidation.clear();
							setTimeout(function() {
								$success.fadeOut(3000, function() {
									waitToSend = false;
								});
							}, 5000);

							$confirmarReserva.attr('disabled', false).val(confirmarReservaText);
						},
						error: function(data) {
							$confirmarReserva.attr('disabled', false).val(confirmarReservaText);
						}
					});
				}
			};

		$agregarPasajero.click(function(e) {
			e.preventDefault();
			addPasajero();
		});

		$confirmarReserva.click(function(e) {
			e.preventDefault();
			reservaValidation.validate(function() {
				procesar();
			});
		});
	});

	//contact-maps
	$('.contact-maps').each(function() {
		var $this = $(this),
			$li = $this.find('.contact-tabs li'),
			$cont = $this.find('.contact-map-container');

		$li.eq(0).addClass('current');
		$cont.eq(0).addClass('current');

		$li.each(function(index) {
			$(this).click(function() {
				$li.removeClass('current').eq(index).addClass('current');
				$cont.removeClass('current').eq(index).addClass('current');
			});
		});
	});


	$('#form-contact-page').each(function() {

		var $form = $(this),
			url = $form.attr('action'),
			contactValidation = validation('#form-contact-page').clear(),
			$enviar = $('#enviarContactInput').attr('disabled', false),
			enviarText = $enviar.val(),
			waitToSend = false,
			$success = $form.find('.success'),

			procesar = function() {
				if (!waitToSend) {
					var dataJson = {},

						fields = [
							'nombre',
							'localidad',
							'provincia',
							'telefono',
							'email',
							'fecha',
							'numPersonas',
							'consulta'
						],
						length = fields.length;
					for (var i = 0; i < length; i++) {
						dataJson[fields[i]] = $('#' + fields[i] + 'ContactInput').val();
					}
					dataJson['limitado'] = $('input[name=limitadoContactInput]:checked').val();

					$enviar.attr('disabled', true).val('ENVIANDO...');

					waitToSend = true;
					$.ajax({
						type: "POST",
						url: url,
						data: dataJson,
						success: function(data) {
							$success.fadeIn(200);
							contactValidation.clear();
							setTimeout(function() {
								$success.fadeOut(3000, function() {
									waitToSend = false;
								});
							}, 5000);
							$enviar.attr('disabled', false).val(enviarText);
						},
						error: function(data) {
							$enviar.attr('disabled', false).val(enviarText);
						}
					});
				}
			};

		$enviar.click(function(e) {
			e.preventDefault();
			contactValidation.validate(function() {
				procesar();
			});
		});

	});

	$('.contact-form-common').each(function() {

		var $form = $(this),
			url = $form.attr('action'),
			contactValidation = validation(this).clear(),
			$enviar = $form.find('.submit-contact').attr('disabled', false),
			enviarText = $enviar.val(),
			waitToSend = false,
			$success = $form.find('.success'),

			procesar = function() {
				if (!waitToSend) {
					var dataJson = {
						'nombre': $form.find('.nameInput').val(),
						'telefono': $form.find('.tel1Input').val() + '-' + $form.find('.tel2Input').val(),
						'email': $form.find('.emailInput').val(),
						'consulta': $form.find('.messageInput').val(),
						'localidad': '',
						'provincia': '',
						'fecha': '',
						'numPersonas': '',
						'limitado': ''
					};


					$enviar.attr('disabled', true).val('ENVIANDO...');

					waitToSend = true;
					$.ajax({
						type: "POST",
						url: url,
						data: dataJson,
						success: function(data) {
							$success.fadeIn(200);
							contactValidation.clear();
							setTimeout(function() {
								$success.fadeOut(3000, function() {
									waitToSend = false;
								});
							}, 5000);
							$enviar.attr('disabled', false).val(enviarText);
						},
						error: function(data) {
							$enviar.attr('disabled', false).val(enviarText);
						}
					});
				}
			};

		$enviar.click(function(e) {
			e.preventDefault();
			contactValidation.validate(function() {
				procesar();
			});
		});



	});
	//End
};
jQuery('document').ready(function() {
	Setur(jQuery);
});