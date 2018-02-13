<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/loginPage.css">

    <link rel="stylesheet" href="css/reset.css">
    <title>loginPage</title>

  </head>
  <body>-->
    <div class="slidColorTop"></div>
    <div class="login_register">
      <!-- OPTION INTERFACE-->
      <div class="logAndRegisterScreenContainer">
        <div id="connexion" class="loginScreen"><a href="#" class="loginScreenText">CONNECTION</a></div>
        <div id="inscription" class="registerScreen"><a href="#" class="registerScreenText">REGISTRATION</a></div>
      </div>
      <!-- LOGIN INTERFACE-->
      <form class="formConnexion" action="data.php" method="post">

        <div class="loginScreenContainer">
          <div class="loginTitle"><p>Login to your account</p></div>
          <span class="error"> <?= $emptyField ?></span>
          <div class="loginFields">

            <div class="loginFieldsEmailContainer">
                <div class="loginrFieldsEmail"><input type="email" class="inputEmail" placeholder="Email adress" name="email"></div>
                <div class="icon"><img src="imgs/mail.png" alt="icon"></div>
            </div>
            <div class="loginFieldsPassword"><input id="enterPassword" placeholder="Password" type="password" name="password" >
              <div class="icon"><img src="imgs/lock_icon.png" alt="icon"></div>
              <div id="validationPassword" class="validation"><img src="imgs/tick.png" alt="tick"></div>

            </div>
            <div class="loginFieldsSubmit"><input id="login" type="submit" value="Submit" name="submit"></div>
            <div class="forgotContainer">
              <div class="forgot"><a href="#">Username lost?</a></div>
              <div class="forgot"><a href="#">Password lost?</a></div>
            </div>
            <div class="disclaimerLogin"><p>Log in to your account to access Gello.</p></div>
          </div>
        </div>

      </form>
      <!-- REGISTER INTERFACE-->
      <form class="formInscription" action="data.php" method="post">

        <div class="registerScreenContainer">
          <div class="registerFields">
            <div class="loginTitle"><p>Register for free</p></div>
              <span class="error"> <?= $emptyField ?></span>
            <div class="personalInformationContainer">
              <div class="registerFieldsName">
                  <input id="enterName" placeholder="Name" type="text" name="name">
              </div>
              <div class="registerFieldsFirstName">
                  <input id="enterFirstName" placeholder="First name" type="text" name="firstName">
              </div>
            </div>
            <div class="registerFieldsEmailContainer">

              <div class="registerFieldsEmail"><input type="email" class="inputEmail" placeholder="Email adress" name="email"></div>
              <div class="icon"><img src="imgs/mail.png" alt="icon"></div>
            </div>
              <div class="registerFieldsPassword"><input id="enterPasswordRegister" placeholder="Password" type="password" name="passwordRegistration">
                <div class="icon">
                    <img src="imgs/lock_icon.png" alt="icon">
                </div>
                <div id="validationPasswordRegister" class="validation"><img src="imgs/tick.png" alt="tick"></div>

              </div>
              <div class="registerFieldsSubmit"><input id="validate" type="submit" value="Submit" name="submitRegistration"></div>
              <div class="disclaimerRegister"><p>Register to access Gello.</p></div>
            </div>

          </div>

        </form>
      </div>
      <script type="text/javascript" src="../public/JS/loginAndRegister.js"></script>
   <!-- </body>
  </html>-->