/**
 * @file
 * Includes JS function
 */

(function ($, Drupal, drupalSettings) {
  	'use strict';
	Drupal.behaviors.jsDruppoTest = {
		attach: function (context, settings) {
			// In D8, $.once() needs to be combined with $.each()
		  	$('.foo-class', context).once('some-arbitrary-but-unique-key').each(function () {
		  		$(this).append('<button class="button foo-button">' + drupalSettings.js_example.title + '</button>');
		  	});

		  	$('.foo-class', context).once('some-arbitrary-but-unique-key1').each(function () {
		  		console.log(drupalSettings.js_example.title);
		  	});
		}
	};
})(jQuery, Drupal, drupalSettings);
