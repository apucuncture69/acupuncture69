<article class="acu_tile">

    <h1 id="acu_login_title">Connexion</h1>

    <form id="login_form" aria-labelledby="acu_login_title">
        <div class="form-group">
            <label for="login_email">Email</label>
            <input type="email" class="form-control" id="login_email" placeholder="Email" aria-required="true">
        </div>
        <div class="form-group">
            <label for="login_password">Mot de passe</label>
            <input type="password" class="form-control" id="login_password" placeholder="Mot de passe" aria-required="true">
        </div>
				<input id="login_redirect_page" type="hidden" value="{$redirect_page}" />
        <button id="login_submit" type="submit" class="btn btn-default">Connexion</button>
    </form>

</article>
