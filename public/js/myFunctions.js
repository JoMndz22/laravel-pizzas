$(document).ready(function() {
    $('.slider-home').slick({
    	dots: true,
    	arrows: false,
		infinite: true,
  		autoplay: true,
  		autoplaySpeed: 2000
	});
	/* FORMULARIO REGISTRO */
    $('#frmRegistro').submit(function(event) {
        event.preventDefault();
        var dataForm = $(this);
		console.log($(this).serializeJSON());
        dataForm.find('.loader').removeClass('d-none');
        //console.log(dataForm.serializeArray());
        $.ajax({
            type: dataForm.attr('method'),
            url: dataForm.attr('action'),
            dataType: 'json',
            data: dataForm.serializeArray()
        })
        .done(function(data) {
            if (data.code == 200) {
                dataForm.find('.mjs').remove();
                dataForm.find('.errors').remove();
                dataForm[0].reset();
                dataForm.append('<div class="mjs alert alert-success w-100 mt-3" role="alert">* ' + data.mgs + '</div>');
                dataForm.find('.loader').addClass('d-none');
                return true;
            }
            //console.log("complete2");
            dataForm.find('.mjs').remove();
            dataForm.find('.errors').remove();
            $.each(data.mgs, function(i, item) {
                dataForm.find('#' + i).append("<div class='errors'>* " + item[0] + "</div>");
            });
            dataForm.find('.loader').addClass('d-none');
            return false;
        })
        .fail(function(data) {
            console.log("error fail");
        })
    });
    /*    FIN FORMULARIO REGISTRO   */  
});