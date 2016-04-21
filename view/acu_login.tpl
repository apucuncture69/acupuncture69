<article class="acu_tile">
	<h1 id="acu_login_title">Connexion</h1>
	<form id="login_form" aria-labelledby="acu_login_title">
		<div class="form-group">
			<label class="elt_form" for="login_email">Email:</label>
			<input class="form-control elt_form" id="login_email" type="text" placeholder="Email" aria-required="true"/>
		</div>
		<div class="form-group">
			<label class="elt_form" for="login_password">Mot de passe:</label>
			<input class="form-control elt_form" id="login_password" type="password" placeholder="Mot de passe" aria-required="true"/>
		</div>
		<input class="elt_form" id="login_redirect_page" type="hidden" value="{$redirect_page}" />
		<button id="login_submit" class="elt_form btn btn-default">Connexion</button>
	</form>
</article>
