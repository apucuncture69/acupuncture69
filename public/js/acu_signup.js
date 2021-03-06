$(document).ready(function () {
    
    var valid_firstname = true;
    var valid_lastname = true;
    var valid_email = true;
    var valid_password = true;
    var valid_password_again = true;

    $('#signup_submit').click(function () {
        valid_password = ($('#signup_password').val().length >= 5);
        valid_password = valid_password && ($('#signup_password').val() === $('#signup_password_again').val());
        valid_password_again = ($('#signup_password').val() === $('#signup_password_again').val());
        valid_email = (/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($('#signup_email').val()));      //vérification format email
        if ($('#signup_firstname').val().length > 0 && $('#signup_lastname').val().length > 0 && $('#signup_email').val().length > 0 && valid_email
                && $('#signup_password').val().length > 0 && valid_password && valid_password_again) {     //si tout est bon
            $.ajax({
                url: 'api/user',
                type: 'POST',
                data: {
                    email: $('#signup_email').val(),
                    password: $.sha256($('#signup_password').val() + $.sha256($('#signup_email').val())),
                    password_again: $.sha256($('#signup_password_again').val() + $.sha256($('#signup_email').val())),
                    firstname: $('#signup_firstname').val(),
                    lastname: $('#signup_lastname').val()
                },
                success: function (result) {
                    if (result == true) {
                        document.location.href = $('#signup_redirect_page').val();
                    } else {
                        $('#signup_error').html("Utilisateur déjà enregistré. Veuillez vous <a href='login'>connecter</a>");
                    }
                },
                error: function (result) {
                    alert('mince');
                }
            });
        } else {
            valid_email = valid_email && !($('#signup_email').val().length <= 0)
            valid_password = valid_password && !($('#signup_password').val().length <= 0);
            valid_firstname = !($('#signup_firstname').val().length <= 0);
            valid_lastname = !($('#signup_lastname').val().length <= 0);
            valid_password_again = valid_password_again && ($('#signup_password').val() === $('#signup_password_again').val());
        }
        
        var error_html = '';
        
        if (valid_firstname)
        {
            $('#signup_firstname').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_firstname').addClass('elt_form_err');
            error_html += 'Veuillez remplir le prénom<br>';
        }

        if (valid_lastname)
        {
            $('#signup_lastname').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_lastname').addClass('elt_form_err');
            error_html += 'Veuillez remplir le nom<br>';
        }

        if (valid_email)
        {
            $('#signup_email').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_email').addClass('elt_form_err');
            error_html += 'Veuillez entrer une adresse e-mail valide<br>';
        }

        if (valid_password)
        {
            $('#signup_password').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_password').addClass('elt_form_err');
            error_html += 'Le mot de passe doit faire au moins 5 caractères<br>';
        }

        if (valid_password_again)
        {
            $('#signup_password_again').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_password_again').addClass('elt_form_err');
            error_html += 'La confirmation est différente du mot de passe<br>';
        }
        
        $('#signup_error').html(error_html);

    });

    $('#signup_email').keyup(function () {
        valid_email = (/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($('#signup_email').val()));
        
        if (valid_email)
        {
            $('#signup_email').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_email').addClass('elt_form_err');
        }
    });

    $('#signup_password').keyup(function () {
        valid_password = ($('#signup_password').val().length >= 5);
        valid_password_again = ($('#signup_password').val() === $('#signup_password_again').val());
        
        if (valid_password)
        {
            $('#signup_password').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_password').addClass('elt_form_err');
        }

        if (valid_password_again)
        {
            $('#signup_password_again').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_password_again').addClass('elt_form_err');
        }
    });
    
    $('#signup_password_again').keyup(function () {
        valid_password_again = ($('#signup_password').val() === $('#signup_password_again').val());

        if (valid_password_again)
        {
            $('#signup_password_again').removeClass('elt_form_err');
        }
        else
        {
            $('#signup_password_again').addClass('elt_form_err');
        }
    });

    $('#signup_firstname').keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            $('#signup_submit').click();
        }
    });

    $('#signup_lastname').keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            $('#signup_submit').click();
        }
    });

    $('#signup_email').keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            $('#signup_submit').click();
        }
    });

    $('#signup_password').keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            $('#signup_submit').click();
        }
    });

    $('#signup_password_again').keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            $('#signup_submit').click();
        }
    });

});


