<article class="acu_tile">
    <h1 id="acu_login_title">Connexion</h1>
    <div id="login_form">
        <form aria-labelledby="acu_login_title">
            <div class="form-group">
                <label for="login_email">Email:</label>
                <input class="form-control" id="login_email" type="text" placeholder="Email" aria-required="true" tabindex="5" title="Exemple: mon.email@toto.fr"/>
            </div>
            <div class="form-group">
                <label for="login_password">Mot de passe:</label>
                <input class="form-control" id="login_password" type="password" placeholder="Mot de passe" aria-required="true" tabindex="6" title="Votre mot de passe doit contenir au moins 5 caractères"/>
            </div>
            <input id="login_redirect_page" type="hidden" value="{$redirect_page}" />
        </form>
        <div id="login_error"></div>
        <button id="login_submit" class="btn btn-default" tabindex="7">Connexion</button>
    </div>
</article>

