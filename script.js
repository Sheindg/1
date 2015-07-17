$(function () {
    
	$('#enter').click (function () {
		$.ajax ({
			type: 'POST',
			url: 'cars.php',
		data: {
		weightFull: $('input[name="weightFull"]').val(),
		weight:     $('input[name="weight"]').val(),
		motor_v:    $('input[name="motor_v"]').val(),
		},
			success: function ($data) {  
			$('#result').html ($data);
			}                                    
		})
	})
});