<article class="acu_tile">
    <h1 id="acu_login_title">Connexion</h1>
    <div id="login_form">
        <form aria-labelledby="acu_login_title">
            <div class="form-group">
                <label for="login_email">Email:</label>
                <input class="form-control" id="login_email" type="text" placeholder="Email" aria-required="true"/>
            </div>
            <div class="form-group">
                <label for="login_password">Mot de passe:</label>
                <input class="form-control" id="login_password" type="password" placeholder="Mot de passe" aria-required="true"/>
            </div>
            <input id="login_redirect_page" type="hidden" value="{$redirect_page}" />
        </form>
        <button id="login_submit" class="btn btn-default">Connexion</button>
    </div>
</article>

