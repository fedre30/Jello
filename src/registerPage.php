<div class="slidColorTop"></div>
<div class="login_register">
    <!-- OPTION INTERFACE-->
    <div class="logAndRegisterScreenContainer">
        <div id="connexion" class="loginScreen"><a href="/" class="loginScreenText">CONNECTION</a></div>
        <div id="inscription" class="registerScreen active"><a href="/register.php" class="registerScreenText">REGISTRATION</a></div>
    </div>
    <!-- REGISTER INTERFACE-->
    <form class="formInscription" action="/register.php" method="post">
        <div class="registerScreenContainer">
            <div class="registerFields">
                <div class="loginTitle"><p>Register for free</p></div>
                <span class="error"> <?= $error ?></span>
                <div class="personalInformationContainer">
                    <div class="registerFieldsName">
                        <input id="enterName" placeholder="Last Name" type="text" name="lastName">
                    </div>
                    <div class="registerFieldsFirstName">
                        <input id="enterFirstName" placeholder="First name" type="text" name="firstName">
                    </div>
                </div>
                <div class="registerFieldsEmailContainer">
                    <div class="registerFieldsEmail"><input type="email" class="inputEmail" placeholder="Email adress" name="email"></div>
                    <div class="icon"><img src="imgs/mail.png" alt="icon"></div>
                </div>
                <div class="registerFieldsPassword"><input id="enterPasswordRegister" placeholder="Password" type="password" name="password">
                    <div class="icon">
                        <img src="imgs/lock_icon.png" alt="icon">
                    </div>
                    <div id="validationPasswordRegister" class="validation"><img src="imgs/tick.png" alt="tick"></div>
                </div>
                <div class="registerFieldsSubmit"><input id="validate" type="submit" value="Submit" name="submit"></div>
                <div class="disclaimerRegister"><p>Register to access Jello.</p></div>
            </div>
        </div>

    </form>
</div>