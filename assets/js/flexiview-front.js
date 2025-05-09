jQuery(document).ready(function ($) {
	const $body = $('body');
	let $readingGuide = null;
	let $readingMaskTop = null;
	let $readingMaskBottom = null;
	let $textMagnifier = null;
	let flexiviewYTPlayers = [];
	const htmlClassTargets = ['invert-colors', 'monochrome', 'high-contrast', 'high-saturation', 'low-saturation'];

	// Open/Close Widget Modal
	$('#flexiview-access-btn').on('click', function () {
		const $modal = $('#flexiview-modal');

		if ($modal.is(':visible')) {
			$modal.fadeOut('fast', function () {
				$modal.removeClass('is-open');
			});
		} else {
			$modal.fadeIn('fast', function () {
				$modal.addClass('is-open');
			});
		}
	});
	$('#flexiview-close-modal').on('click', function () {
		const $modal = $('#flexiview-modal');
		$modal.fadeOut('fast', function () {
			$modal.removeClass('is-open');
		});
	});

	// Accordion toggle
	$('.flexiview-accessibility-accordion-title').on('click', function () {
		const $title = $(this);
		const $content = $title.next('.flexiview-accessibility-accordion-content');

		$title.toggleClass('active');
		$content.toggleClass('active');
	});

	// Store original Audio.play
	if (!window.__flexiviewOriginalPlay) {
		window.__flexiviewOriginalPlay = Audio.prototype.play;
	}

	function loadYouTubeAPI(callback) {
		if (window.YT && window.YT.Player) {
			callback();
		} else if (!window.__flexiviewYTLoading) {
			window.__flexiviewYTLoading = true;
			const tag = document.createElement('script');
			tag.src = 'https://www.youtube.com/iframe_api';
			const firstScript = document.getElementsByTagName('script')[0];
			firstScript.parentNode.insertBefore(tag, firstScript);
			window.onYouTubeIframeAPIReady = callback;
		}
	}

	$('.flexiview-accessibility-mode').on('click', function () {
		const $btn = $(this);
		const id = $btn.attr('id');
		const toggleClass = 'flexiview-' + id.replace(/[^a-zA-Z0-9_-]/g, '').toLowerCase();
		const group = $btn.data('group');
		const isActive = $btn.hasClass('active');
		const targetElement = htmlClassTargets.includes(id) ? $('html') : $('body');

		// Text Magnifier
		// Text Magnifier
		if (id === 'text-magnifier') {
			if (isActive) {
				$textMagnifier?.remove();
				$textMagnifier = null;
				$(window).off('mousemove.flexiviewTextMagnifier');
			} else {
				$textMagnifier = $(
					'<div id="flexiview-text-magnifier-tooltip" class="flexiview-text-magnifier-tooltip" style="visibility: hidden;"></div>',
				);
				$('body').append($textMagnifier);

				$(window).on('mousemove.flexiviewTextMagnifier', function (e) {
					const x = e.clientX;
					const y = e.clientY;
					const target = document.elementFromPoint(x, y);

					// Check if hovered element has readable text
					const isTextNode =
						target &&
						(target.nodeType === 3 || // text node
							$(target).text().trim().length > 0);

					// Show or hide tooltip
					if (isTextNode && !$(target).is($textMagnifier)) {
						const text = $(target).text().trim().substring(0, 200); // limit length
						$textMagnifier.text(text).css('visibility', 'visible');

						// Layout logic
						const screenMid = window.innerWidth / 2;
						const isRightSide = x > screenMid;

						$textMagnifier.css({
							top: y + 10 + 'px',
							left: isRightSide ? 'auto' : x + 8 + 'px',
							right: isRightSide ? window.innerWidth - x + 8 + 'px' : 'auto',
						});
					} else {
						$textMagnifier.css('visibility', 'hidden');
					}
				});
			}
			$btn.toggleClass('active');
			targetElement.toggleClass(toggleClass);
			return;
		}

		// Mute Sounds
		if (id === 'mute-sounds') {
			if (isActive) {
				$('audio, video').prop('muted', false);
				window.__flexiviewMuted = false;
				Audio.prototype.play = window.__flexiviewOriginalPlay;
				flexiviewYTPlayers.forEach((p) => p.unMute && p.unMute());
			} else {
				$('audio, video').prop('muted', true);
				window.__flexiviewMuted = true;
				Audio.prototype.play = function () {
					console.warn('Audio blocked by FlexiView');
					return Promise.resolve();
				};
				loadYouTubeAPI(function () {
					$('iframe[src*="youtube.com/embed"]').each(function (i) {
						const $iframe = $(this);
						let iframeId = $iframe.attr('id') || 'yt-flexiview-' + i;
						$iframe.attr('id', iframeId);

						const player = new YT.Player(iframeId, {
							events: {
								onReady: function (event) {
									event.target.mute();
								},
							},
						});

						flexiviewYTPlayers.push(player);
					});
				});
			}
			$btn.toggleClass('active');
			targetElement.toggleClass(toggleClass);
			return;
		}

		// Reading Guide
		if (id === 'reading-guide') {
			if (isActive) {
				$readingGuide?.remove();
				$readingGuide = null;
				$(window).off('mousemove.flexiviewGuide');
			} else {
				$readingGuide = $('<div class="flexiview-reading-guide-element"></div>');
				$('body').append($readingGuide);

				$(window).on('mousemove.flexiviewGuide', function (e) {
					const x = e.clientX;
					const y = e.clientY;
					$readingGuide.css(
						'transform',
						`translate3d(${x - $readingGuide.outerWidth() / 2}px, ${
							y - $readingGuide.outerHeight() / 2
						}px, 0)`,
					);
				});
			}
			$btn.toggleClass('active');
			targetElement.toggleClass(toggleClass);
			return;
		}

		// Reading Mask
		if (id === 'reading-mask') {
			if (isActive) {
				$readingMaskTop?.remove();
				$readingMaskBottom?.remove();
				$readingMaskTop = null;
				$readingMaskBottom = null;
				$(window).off('mousemove.flexiviewMask');
			} else {
				$readingMaskTop = $('<div class="flexiview-reading-mask-top"></div>');
				$readingMaskBottom = $('<div class="flexiview-reading-mask-bottom"></div>');
				$('body').append($readingMaskTop);
				$('body').append($readingMaskBottom);
				$(window).on('mousemove.flexiviewMask', function (e) {
					// const x = e.clientX;
					// const y = e.clientY;
					// $readingMaskTop.css();
					// $readingMaskBottom.css();
					const y = e.clientY;

					// Calculate the top and bottom parts of the screen around a 100px reading window
					const windowHeight = window.innerHeight;
					const topHeight = Math.max(0, y - 50);
					const bottomTop = Math.min(windowHeight, y + 50);

					$readingMaskTop.css({
						top: 0,
						height: topHeight + 'px',
					});

					$readingMaskBottom.css({
						top: bottomTop + 'px',
						height: windowHeight - bottomTop + 'px',
					});
				});
			}
			$btn.toggleClass('active');
			targetElement.toggleClass(toggleClass);
			return;
		}

		// Generic toggle behavior
		if (group) {
			$(`[data-group="${group}"]`).each(function () {
				const cls =
					'flexiview-' +
					$(this)
						.attr('id')
						.replace(/[^a-zA-Z0-9_-]/g, '')
						.toLowerCase();
				targetElement.removeClass(cls);
				$(this).removeClass('active');
			});
			if (!isActive) {
				$btn.addClass('active');
				targetElement.addClass(toggleClass);
			}
		} else {
			$btn.toggleClass('active');
			targetElement.toggleClass(toggleClass);
		}
	});
});
