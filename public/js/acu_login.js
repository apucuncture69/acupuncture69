$( document ).ready(function() {

    $('#login_submit').click(function(){
    	if($('#login_password').val().length < 5){
			$('#login_password').addClass( 'elt_form_err' );
		} else {
			$('#login_password').removeClass( 'elt_form_err' );
		}
		if(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($('#login_email').val())){
			$('#login_email').removeClass( 'elt_form_err' );
		} else {
			$('#login_email').addClass( 'elt_form_err' );
		}
		if($('#login_email').val().length > 0 && !$('#login_email').hasClass('elt_form_err')
		&& $('#login_password').val().length > 0 && !$('#login_password').hasClass('elt_form_err')){
			$.ajax({
			    url: 'api/user',
			    type: 'POST',
			    data: {
			    	email: $('#login_email').val(),
			    	password: $.sha256($('#login_password').val()+$.sha256($('#login_email').val()))
			    },
			    success: function(result) {
			        if(result==true){
			        	document.location.href=$('#login_redirect_page').val();
			        } else {
			        	$('#login_email').addClass( 'elt_form_err' );
			        	$('#login_password').addClass( 'elt_form_err' );
			        	$('#login_password').val('');
			        	$('#login_error').html('Vos identifiants ne correspondent à aucun utilisateur enregistré.');
			        }
			    },
			    error: function(result) {
			        alert('mince');
			    }
			});
		} else {
			if($('#login_email').val().length <= 0 || $('#login_email').hasClass('elt_form_err')){
				$('#login_email').addClass( 'elt_form_err' );
			}
			if($('#login_password').val().length <= 0 || $('#login_password').hasClass('elt_form_err')){
				$('#login_password').addClass( 'elt_form_err' );
			}
	        	$('#login_password').val('');
	        	$('#login_error').html('Email invalide et/ou mot de passe trop petit.');
		}
		
	});

	$('#login_email').keyup(function(){
		if(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($('#login_email').val())){
			$('#login_email').removeClass( 'elt_form_err' );
		} else {
			$('#login_email').addClass( 'elt_form_err' );
		}
	});

	$('#login_password').keyup(function(){
		if($('#login_password').val().length < 5){
			$('#login_password').addClass( 'elt_form_err' );
		} else {
			$('#login_password').removeClass( 'elt_form_err' );
		}
	});

	$('#login_email').keypress(function (e) {
		var key = e.which;
		if(key == 13) {
			$('#login_submit').click();
		}
	});

	$('#login_password').keypress(function (e) {
		var key = e.which;
		if(key == 13) {
			$('#login_submit').click();
		}
	});

});
