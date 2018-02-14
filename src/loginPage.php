<div class="slidColorTop"></div>
<div class="login_register">
    <!-- OPTION INTERFACE-->
    <div class="logAndRegisterScreenContainer">
        <div id="connexion" class="loginScreen active"><a href="/" class="loginScreenText">CONNECTION</a></div>
        <div id="inscription" class="registerScreen"><a href="/register.php" class="registerScreenText">REGISTRATION</a></div>
    </div>
    <!-- LOGIN INTERFACE-->
    <form class="formConnexion" action="/" method="post">
        <div class="loginScreenContainer">
            <div class="loginTitle"><p>Login to your account</p></div>
            <span class="error"> <?= $error ?></span>
            <div class="loginFields">
                <div class="loginFieldsEmailContainer">
                    <div class="loginrFieldsEmail">
                        <input type="email" class="inputEmail" placeholder="Email adress" name="email" />
                    </div>
                    <div class="icon"><img src="imgs/mail.png" alt="icon" /></div>
                </div>
                <div class="loginFieldsPassword">
                    <input id="enterPassword" placeholder="Password" type="password" name="password" />
                    <div class="icon"><img src="imgs/lock_icon.png" alt="icon" /></div>
                    <div id="validationPassword" class="validation"><img src="imgs/tick.png" alt="tick"></div>
                </div>
                <div class="loginFieldsSubmit">
                    <input id="login" type="submit" value="Submit" />
                </div>
                <div class="disclaimerLogin"><p>Log in to your account to access Jello.</p></div>
            </div>
        </div>
    </form>
</div>