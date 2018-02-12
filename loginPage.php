<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/loginPage.css">
    <link rel="stylesheet" href="public/style/reset.css">
    <title>loginPage <?php include(data.php); ?></title>
  </head>
  <body>
    <div class="slidColorTop"></div>
    <div class="login_register">
      <!-- OPTION INTERFACE-->
      <div class="logAndRegisterScreenContainer">
        <div id="connexion" class="loginScreen"><a href="#" class="loginScreenText">CONNEXION</a></div>
        <div id="inscription" class="registerScreen"><a href="#" class="registerScreenText">INSCRIPTION</a></div>
      </div>
      <!-- LOGIN INTERFACE-->
      <form class="formConnexion" action="data.php" method="post">

        <div class="loginScreenContainer">
          <div class="loginTitle"><p>Connexion à votre compte</p></div>
          <div class="loginFields">
            <div class="loginFieldsUser"><input id="enterUsername" placeholder="Nom de compte" type="text" name="username" value="<?= $messageID ?>">
              <div class="icon"><img src="imgs/user_icon.png" alt="icon"></div>
              <div id="validationUsername" class="validation"><img src="imgs/tick.png" alt="tick"></div>
            </div>
            <div class="loginFieldsPassword"><input id="enterPassword" placeholder="Mot de passe" type="password" name="password" value="<?= $messageID ?>">
              <div class="icon"><img src="imgs/lock_icon.png" alt="icon"></div>
              <div id="validationPassword" class="validation"><img src="imgs/tick.png" alt="tick"></div>
            </div>
            <div class="loginFieldsSubmit"><input id="login" type="submit" value="Valider" name="submit"></div>
            <div class="forgotContainer">
              <div class="forgot"><a href="#">Identifiant oublié?</a></div>
              <div class="forgot"><a href="#">Mot de passe oublié?</a></div>
            </div>
            <div class="disclaimerLogin"><p>Connectez-vous à votre compte pour accéder à vos formations en ligne.</p></div>
          </div>
        </div>

      </form>
      <!-- REGISTER INTERFACE-->
      <form class="formInscription" action="data.php" method="post">

        <div class="registerScreenContainer">
          <div class="registerFields">
            <div class="loginTitle"><p>M'inscrire gratuitement</p></div>
            <div class="personalInformationContainer">
              <div class="registerFieldsName">
                  <input id="enterName" placeholder="Nom" type="text" name="name">
                  <p><?= $nameErr ?></p>
              </div>
              <div class="registerFieldsFirstName">
                  <input id="enterFirstName" placeholder="Prénom" type="text" name="firstName">
                  <p><?= $firstNameErr ?></p>
              </div>
            </div>
            <div class="registerFieldsEmailContainer">
              <div class="registerFieldsEmail"><input type="email" class="inputEmail" placeholder="Adresse E-mail" name="email"></div>
              <div class="icon"><img src="imgs/mail.png" alt="icon"></div>
            </div>
            <div class="registerFieldsUser"><input id="enterUsernameRegister" placeholder="Nom de compte" type="text" name="usernameRegistration">
              <div class="icon"><img src="imgs/user_icon.png" alt="icon"></div>
              <div id="validationUsernameRegister" class="validation">
                  <img src="imgs/tick.png" alt="tick">
                  <p><?= $usernameRegistrationErr ?></p>
              </div>
            </div>
            <div class="registerFieldsPassword"><input id="enterPasswordRegister" placeholder="Mot de passe" type="password" name="passwordRegistration">
              <div class="icon">
                  <img src="imgs/lock_icon.png" alt="icon">
                  <p></p>
              </div>
              <div id="validationPasswordRegister" class="validation"><img src="imgs/tick.png" alt="tick"></div>
            </div>
            <div class="registerFieldsSubmit"><input id="validate" type="submit" value="Valider" name="submitRegistration"></div>
            <div class="disclaimerRegister"><p>Inscrivez-vous pour accéder à toutes nos formations.</p></div>
          </div>
        </div>

      </form>
    </div>
    <script type="text/javascript" src="JS/loginAndRegister.js"></script>
  </body>
</html>