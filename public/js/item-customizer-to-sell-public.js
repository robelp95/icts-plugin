(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$('#chose_div').on("selected", ".item-select", function () {
		let array = [];
		$('#chose_div select').each(function () {
			array.push($(this).val())
		})
		//enviar por ajax el arreglo de ids
		$.ajax({
			url: icts_vars.ajaxurl,
			type: 'POST',
			data: {
				action: 'icts_get_image_url',
				array: array
			},
			success: function (data) {
				console.log(data);
				let src = data['src'];
				$('#img_chow').attr('src', src);
			},
			error: function (data) {
				console.log(data);
			}
		});


	});
	//ajax para llenar el select de la categoria
	$.ajax({
		url: 'http://localhost:8000/api/chose',
		type: 'GET',
		success: function (data) {
			fillSelect(data, $('#category'));
		},
		error: function (data) {
			console.log(data);

		}
	});
	//funcion para llenar el select dinamicamente con los datos que se envian por ajax
	function fillSelects(data, select){
		let options = '';
		data.forEach(element => {
			options += `<option value="${element.id}">${element.name}</option>`;
		});
		$('#chose_div select').forEach(select => {
			select.html(options);
		})
	}

})( jQuery );
