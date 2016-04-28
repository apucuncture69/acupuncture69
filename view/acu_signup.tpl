<article class="acu_tile">
    <h1 id="acu_signup_title">Inscription</h1>
    <div id="signup_form">
        <form aria-labelledby="acu_signup_title">
	    <div class="form-group">
                <label for="signup_lastname">Nom:</label>
                <input class="form-control" id="signup_lastname" type="text" placeholder="Nom" aria-required="true"/>
            </div>
	    <div class="form-group">
                <label for="signup_firstname">Prénom:</label>
                <input class="form-control" id="signup_firstname" type="text" placeholder="Prénom" aria-required="true"/>
            </div>
            <div class="form-group">
                <label for="signup_email">Email:</label>
                <input class="form-control" id="signup_email" type="text" placeholder="Email" aria-required="true"/>
            </div>
            <div class="form-group">
                <label for="signup_password">Mot de passe:</label>
                <input class="form-control" id="signup_password" type="password" placeholder="Mot de passe" aria-required="true"/>
            </div>
	    <div class="form-group">
                <label for="signup_password_again">Confirmation de mot de passe:</label>
                <input class="form-control" id="signup_password_again" type="password" placeholder="Confirmation de mot de passe" aria-required="true"/>
            </div>
            <input id="signup_redirect_page" type="hidden" value="{$redirect_page}" />
        </form>
        <button id="signup_submit" class="btn btn-default">Inscription</button>
    </div>
</article>

