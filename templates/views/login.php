<?php
    namespace Templates\Views;

    use Service\Interfaces\Template;
    use Components;

    class Login extends Template {
        public function render ()
        {
            ?>
                <!DOCTYPE html>
                <html lang="fr">
                <head>
                    <link rel="stylesheet" href="public/css/pages/login.css">
                    <?php $this->component(Components\Head::class) ?>
                    <script src="public/js/pages/login.js" defer></script>
                </head>
                <body>
                    <main>
                        <form action="/login" method="POST">
                            <h1>Se connecter</h1>
                            <div class="form_container">
                                <div class="input_container">
                                    <input required type="text" id="loginEmail" name="email" value="<?php echo $this->email ?>"/>
                                    <label for="loginEmail">Adresse électronique</label>
                                </div>
                                <?php if($this->error == "email") echo '<span class="input_error">Utilisateur introuvable</span>'; ?>
                                <div class="input_container">
                                    <input class="password_havetoggle" required type="password" id="loginPassword" name="password"/>
                                    <label for="loginPassword">Mot de passe</label>
                                    <button class="password_visibility" type="button" aria-roledescription="switch">
                                        <svg class="hidden" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.606 6.08a1 1 0 011.313.526L2 7l.92-.394v-.001c0-.001 0 0 0 0l.003.009.021.045c.02.042.051.108.094.194.086.172.219.424.4.729.364.612.917 1.426 1.67 2.237a11.966 11.966 0 00.59.592C7.18 11.8 9.251 13 12 13c1.209 0 2.278-.231 3.22-.602 1.227-.483 2.254-1.21 3.096-1.998a13.053 13.053 0 002.733-3.725l.027-.058.005-.011a1 1 0 011.838.788L22 7l.92.394-.003.005-.004.008-.011.026-.04.087a14.045 14.045 0 01-.741 1.348 15.368 15.368 0 01-1.711 2.256l.797.797a1 1 0 01-1.414 1.415l-.84-.84a11.81 11.81 0 01-1.897 1.256l.782 1.202a1 1 0 11-1.676 1.091l-.986-1.514c-.679.208-1.404.355-2.176.424V16.5a1 1 0 01-2 0v-1.544c-.775-.07-1.5-.217-2.177-.425l-.985 1.514a1 1 0 01-1.676-1.09l.782-1.203c-.7-.37-1.332-.8-1.897-1.257l-.84.84a1 1 0 01-1.414-1.414l.797-.797A15.406 15.406 0 011.72 8.605a13.457 13.457 0 01-.591-1.107 5.418 5.418 0 01-.033-.072l-.01-.021-.002-.007-.001-.002v-.001C1.08 7.395 1.08 7.394 2 7l-.919.395a1 1 0 01.525-1.314z" fill="currentColor"/></svg>
                                        <svg class="visible" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M12.001 5C7.524 5 3.733 7.943 2.46 12c1.274 4.057 5.065 7 9.542 7 4.478 0 8.268-2.943 9.542-7-1.274-4.057-5.064-7-9.542-7z"/></g></svg>
                                    </button>
                                </div>
                                <?php if($this->error == "password") echo '<span class="input_error">Mot de passe éroné</span>'; ?>
                                <input type="submit" class="form_submit btn" value="Connexion">
                            </div>
                        </form>
                    </main>
                </body>
                </html>
            <?php
        }
    }
?>