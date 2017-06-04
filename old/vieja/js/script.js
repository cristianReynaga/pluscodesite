$(document).ready(function (){
	$("#options > ul > li > a").click(function(e) {
		e.preventDefault();
		var section = $(this).attr("href");
		$('html, body').animate({
			scrollTop: $(section).offset().top
		}, 200);
	});
	var w = $("#video-cont").width();
	var h = w/16*9;
	$("#video-cont").width(w).height(h);

	$("#mailSubmit").click(function(e) {
		if($("#formulario")[0].checkValidity()) {
         	e.preventDefault();
  			$("#mailSubmit").prop('disabled', true);
  			enviarMail();
    	}
	});
});

function enviarMail(){
	$("#mailSubmit").val("Enviando...");

	datos = {
		nombre : $('[name="cf_name"]').val(),
		mail : $('[name="cf_email"]').val(),
		mensaje : $('[name="cf_message"]').val()
	};

	$.ajax({ 
		type: "POST",
        url: "./php/mailer.php",
        data: {datos:datos},
        success: function(data){
         	$("#mailSubmit").val(data);
        }
    });
}