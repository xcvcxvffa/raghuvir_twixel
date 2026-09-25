(function ($) {
	"use strict";

	var $window = $(window);
	var $body = $('body');



	/* Preloader Effect */
	$(window).on('load', function () {
		setTimeout(function () {
			$(".preloader").fadeOut(600);
		}, 2200);
	});

	/* Sticky Header */
	if ($('.active-sticky-header').length) {
		$window.on('resize', function () {
			setHeaderHeight();
		});

		function setHeaderHeight() {
			$("header.active-sticky-header").css("height", $('header.active-sticky-header .header-sticky').outerHeight());
		}

		$window.on("scroll", function () {
			var fromTop = $(window).scrollTop();
			setHeaderHeight();
			var headerHeight = $('header.active-sticky-header .header-sticky').outerHeight()
			$("header.active-sticky-header .header-sticky").toggleClass("hide", (fromTop > headerHeight + 100));
			$("header.active-sticky-header .header-sticky").toggleClass("active", (fromTop > 600));
		});
	}

	/* Slick Menu JS */
	$('#menu').slicknav({
		label: '',
		prependTo: '.responsive-menu'
	});

	if ($("a[href='#top']").length) {
		$(document).on("click", "a[href='#top']", function () {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
	}

	/* Hero Company Support JS */
	if ($('.hero-company-slider').length) {
		const hero_company_slider = new Swiper('.hero-company-slider .swiper', {
			slidesPerView: 2,
			speed: 2000,
			spaceBetween: 30,
			loop: true,
			autoplay: {
				delay: 5000,
			},
			breakpoints: {
				768: {
					slidesPerView: 3,
				},
				1024: {
					slidesPerView: 4,
				},
				1440: {
					slidesPerView: 5,
				},
			}
		});
	}

	/* testimonial Slider JS */
	if ($('.testimonial-slider').length) {
		const testimonial_slider = new Swiper('.testimonial-slider .swiper', {
			slidesPerView: 1,
			speed: 1000,
			spaceBetween: 30,
			loop: true,
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.testimonial-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.testimonial-button-next',
				prevEl: '.testimonial-button-prev',
			},
			breakpoints: {
				991: {
					slidesPerView: 2,
				}
			}
		});
	}

	/* Comapany Support Slider JS */
	if ($('.company-supports-slider').length) {
		const company_supports_slider = new Swiper('.company-supports-slider .swiper', {
			slidesPerView: 2,
			speed: 2000,
			spaceBetween: 30,
			loop: true,
			autoplay: {
				delay: 5000,
			},
			breakpoints: {
				1024: {
					slidesPerView: 4,
				},
				1440: {
					slidesPerView: 5,
				},
			}
		});
	}

	/* Hero Company Support Metal JS */
	if ($('.hero-company-slider-metal').length) {
		const hero_company_slider_metal = new Swiper('.hero-company-slider-metal .swiper', {
			slidesPerView: 2,
			speed: 2000,
			spaceBetween: 30,
			loop: true,
			autoplay: {
				delay: 5000,
			},
			breakpoints: {
				768: {
					slidesPerView: 3,
				},
				1024: {
					slidesPerView: 4,
				},
				1440: {
					slidesPerView: 5,
				},
			}
		});
	}

	/* testimonial Slider Metal JS */
	if ($('.testimonial-slider-metal').length) {
		const testimonial_slider_metal = new Swiper('.testimonial-slider-metal .swiper', {
			slidesPerView: 1,
			speed: 1000,
			spaceBetween: 60,
			loop: true,
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.testimonial-pagination-metal',
				clickable: true,
			},
			navigation: {
				nextEl: '.testimonial-button-next-metal',
				prevEl: '.testimonial-button-prev-metal',
			},
			breakpoints: {
				767: {
					slidesPerView: 2,
				}
			}
		});
	}

	/* Skill Bar */
	if ($('.skills-progress-bar').length) {
		$('.skills-progress-bar').waypoint(function () {
			$('.skillbar').each(function () {
				$(this).find('.count-bar').animate({
					width: $(this).attr('data-percent')
				}, 2000);
			});
		}, {
			offset: '70%'
		});
	}

	/* Skill Bar */
	if ($('.skills-progress-bar-gold').length) {
		$('.skills-progress-bar-gold').waypoint(function () {
			$('.skillbar-gold').each(function () {
				$(this).find('.count-bar-gold').animate({
					width: $(this).attr('data-percent')
				}, 2000);
			});
		}, {
			offset: '70%'
		});
	}

	/* Youtube Background Video JS */
	if ($('#herovideo').length) {
		var myPlayer = $("#herovideo").YTPlayer();
	}

	/* Init Counter */
	if ($('.counter').length) {
		$('.counter').counterUp({ delay: 6, time: 3000 });
	}

	/* Image Reveal Animation */
	if ($('.reveal').length) {
		gsap.registerPlugin(ScrollTrigger);
		let revealContainers = document.querySelectorAll(".reveal");
		revealContainers.forEach((container) => {
			let image = container.querySelector("img");
			let tl = gsap.timeline({
				scrollTrigger: {
					trigger: container,
					toggleActions: "play none none none"
				}
			});
			tl.set(container, {
				autoAlpha: 1
			});
			tl.from(container, 1, {
				xPercent: -100,
				ease: Power2.out
			});
			tl.from(image, 1, {
				xPercent: 100,
				scale: 1,
				delay: -1,
				ease: Power2.out
			});
		});
	}

	/* Text Effect Animation */
	function initHeadingAnimation() {

		if ($('.text-effect').length) {
			var textheading = $(".text-effect");

			if (textheading.length === 0) return; gsap.registerPlugin(SplitText); textheading.each(function (index, el) {

				el.split = new SplitText(el, {
					type: "lines,words,chars",
					linesClass: "split-line"
				});

				if ($(el).hasClass('text-effect')) {
					gsap.set(el.split.chars, {
						opacity: .3,
						x: "-7",
					});
				}
				el.anim = gsap.to(el.split.chars, {
					scrollTrigger: {
						trigger: el,
						start: "top 92%",
						end: "top 60%",
						markers: false,
						scrub: 1,
					},

					x: "0",
					y: "0",
					opacity: 1,
					duration: .7,
					stagger: 0.2,
				});

			});
		}

		if ($('.text-anime-style-1').length) {
			let staggerAmount = 0.05,
				translateXValue = 0,
				delayValue = 0.5,
				animatedTextElements = document.querySelectorAll('.text-anime-style-1');

			animatedTextElements.forEach((element) => {
				let animationSplitText = new SplitText(element, { type: "chars, words" });
				gsap.from(animationSplitText.words, {
					duration: 1,
					delay: delayValue,
					x: 20,
					autoAlpha: 0,
					stagger: staggerAmount,
					scrollTrigger: { trigger: element, start: "top 85%" },
				});
			});
		}

		if ($('.text-anime-style-2').length) {
			let staggerAmount = 0.03,
				translateXValue = 20,
				delayValue = 0.1,
				easeType = "power2.out",
				animatedTextElements = document.querySelectorAll('.text-anime-style-2');

			animatedTextElements.forEach((element) => {
				let animationSplitText = new SplitText(element, { type: "chars, words" });
				gsap.from(animationSplitText.chars, {
					duration: 1,
					delay: delayValue,
					x: translateXValue,
					autoAlpha: 0,
					stagger: staggerAmount,
					ease: easeType,
					scrollTrigger: { trigger: element, start: "top 85%" },
				});
			});
		}

		if ($('.text-anime-style-3').length) {
			let animatedTextElements = document.querySelectorAll('.text-anime-style-3');

			animatedTextElements.forEach((element) => {
				//Reset if needed
				if (element.animation) {
					element.animation.progress(1).kill();
					element.split.revert();
				}

				element.split = new SplitText(element, {
					type: "lines,words,chars",
					linesClass: "split-line",
				});
				gsap.set(element, { perspective: 400 });

				gsap.set(element.split.chars, {
					opacity: 0,
					x: "50",
				});

				element.animation = gsap.to(element.split.chars, {
					scrollTrigger: { trigger: element, start: "top 90%" },
					x: "0",
					y: "0",
					rotateX: "0",
					opacity: 1,
					duration: 1,
					ease: Back.easeOut,
					stagger: 0.02,
				});
			});
		}
	}

	if (document.fonts && document.fonts.ready) {
		document.fonts.ready.then(() => {
			initHeadingAnimation();
		});
	} else {
		window.addEventListener("load", initHeadingAnimation);
	}

	/* Parallaxie js */
	var $parallaxie = $('.parallaxie');
	if ($parallaxie.length && ($window.width() > 1024)) {
		if ($window.width() > 768) {
			$parallaxie.parallaxie({
				speed: 0.55,
				offset: 0,
			});
		}
	}

	/* Zoom Gallery screenshot */
	$('.gallery-items').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom',
		image: {
			verticalFit: true,
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function (element) {
				return element.find('img');
			}
		}
	});

	/* Contact form validation */
	var $contactform = $("#contactForm");
	$contactform.validator({ focus: false }).on("submit", function (event) {
		if (!event.isDefaultPrevented()) {
			event.preventDefault();
			submitForm();
		}
	});

	function submitForm() {
		/* Ajax call to submit form */
		var postUrl = $contactform.attr('action') && $contactform.attr('action') !== '#' 
			? $contactform.attr('action') 
			: '/contact/submit';

		var $submitBtn = $contactform.find('button[type="submit"]');
		var origBtnText = $submitBtn.html();
		$submitBtn.prop('disabled', true).html('<span>Sending...</span>');

		$.ajax({
			type: "POST",
			url: postUrl,
			data: $contactform.serialize(),
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'Accept': 'application/json'
			},
			success: function (response) {
				if (response && response.success) {
					formSuccess(response.message || "Message Sent Successfully!");
				} else {
					submitMSG(false, (response && response.message) ? response.message : "Something went wrong.");
				}
			},
			error: function (xhr) {
				var errMsg = "Failed to send message. Please try again.";
				if (xhr.responseJSON && xhr.responseJSON.message) {
					errMsg = xhr.responseJSON.message;
				} else if (xhr.responseJSON && xhr.responseJSON.errors) {
					errMsg = Object.values(xhr.responseJSON.errors).flat().join(" ");
				}
				submitMSG(false, errMsg);
			},
			complete: function () {
				$submitBtn.prop('disabled', false).html(origBtnText);
			}
		});
	}

	function formSuccess(msg) {
		$contactform[0].reset();
		submitMSG(true, msg || "Message Sent Successfully!");
	}

	function submitMSG(valid, msg) {
		if (valid) {
			var msgClasses = "h4 text-success";
		} else {
			var msgClasses = "h4 text-danger";
		}
		$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
	}
	/* Contact form validation end */

	/* Animated Wow Js */
	new WOW().init();

	/* Popup Video */
	if ($('.popup-video').length) {
		$('.popup-video').magnificPopup({
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: true
		});
	}

	/* Service Item List Start */
	var $service_item_list = $('.service-item-list');
	if ($service_item_list.length) {
		var $service_item = $service_item_list.find('.service-item');

		if ($service_item.length) {
			$service_item.on({
				mouseenter: function () {
					if (!$(this).hasClass('active')) {
						$service_item.removeClass('active');
						$(this).addClass('active');
					}
				},
				mouseleave: function () {
					// Optional: Add logic for mouse leave if needed
				}
			});
		}
	}
	/* Service Item List End */

})(jQuery);