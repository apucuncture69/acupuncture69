$( document ).ready(function() {

    $('#profil_submit').click(function(){
    		var pwd = '';
    		var newpwd = '';
    		if($('#profil_newmdp').val()!=''){
    			pwd=$.sha256($('#profil_mdp').val()+$.sha256($('#profil_email').val()));
    			newpwd=$.sha256($('#profil_newmdp').val()+$.sha256($('#profil_email').val()));
    		}
			$.ajax({
			    url: 'api/user',
			    type: 'PUT',
			    data: {
			    	prenom: $('#profil_prenom').val(),
			    	nom: $('#profil_nom').val(),
			    	email: $.trim($('#profil_email').html()),
			    	password: pwd,
			    	newpassword: newpwd
			    },
			    success: function(result) {
			        if(result==true){
			        	document.location.href='profil-saved';
			        } else {
			        	$('#profil_mdp').addClass( 'elt_form_err' );
			        	$('#profil_mdp').val('');
			        	$('#profil_newmdp').val('');
			        	$('#profil_error').html('Modifications non enregistrées, mauvais mot de passe.');
			        }
			    },
			    error: function(result) {
			        alert('mince');
			    }
			});
	});

});
