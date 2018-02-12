var login = document.getElementById("login");
var validate = document.getElementById("validate");
var loginScreenContainer = document.querySelector(".loginScreenContainer");
var registerScreenContainer = document.querySelector(".registerScreenContainer");
var loginTitle = document.querySelector(".loginTitle");
var enterPassword = document.getElementById("enterPassword");
var enterPasswordRegister = document.getElementById("enterPasswordRegister");
var enterUsername = document.getElementById("enterUsername");
var enterUsernameRegister = document.getElementById("enterUsernameRegister");
var validationPassword = document.getElementById("validationPassword");
var validationPasswordRegister = document.getElementById("validationPasswordRegister");
var validationUsername = document.getElementById("validationUsername");
var validationUsernameRegister = document.getElementById("validationUsernameRegister");

var registerScreen = document.querySelector(".registerScreen");
var loginScreen = document.querySelector(".loginScreen");

var connexion = document.getElementById("connexion");
var inscription = document.getElementById("inscription");
// MOUSSE LOGIN EFFECT - ON LOGIN SCREEN
login.addEventListener('mouseover', function() {
  login.style.backgroundColor = '#DC6180';
  login.style.color = '#fff';
  login.style.cursor = 'pointer';
});
login.addEventListener('mouseout', function() {
  login.style.backgroundColor = '';
  login.style.color = '';
});
// MOUSSE LOGIN EFFECT - ON REGISTER SCREEN
validate.addEventListener('mouseover', function() {
  validate.style.backgroundColor = '#DC6180';
  validate.style.color = '#fff';
  validate.style.cursor = 'pointer';
});
validate.addEventListener('mouseout', function() {
  validate.style.backgroundColor = '';
  validate.style.color = '';
});
// USER & PASSWORD VALIDATION
var nb_username = 0;
enterUsername.addEventListener('input', function() {
  if (nb_username >= 6) {
    validationUsername.style.right = '30px';
    validationUsername.style.opacity = '1';
  }
  nb_username = nb_username + 1;
  return console.log(nb_username);
});

var nb_password = 0;
enterPassword.addEventListener('input', function() {

  if (nb_password >= 6) {
    validationPassword.style.right = '30px';
    validationPassword.style.opacity = '1';
  }
  nb_password = nb_password + 1;
  return console.log(nb_password);
});
// USER & PASSWORD VALIDATION ANIMATION --REGISTER-- !Attention faille ultra badasse + méga bug du cosmos xD!
var nb_usernameRegister = 0;
enterUsernameRegister.addEventListener('input', function() {
  if (nb_usernameRegister >= 6) {
    validationUsernameRegister.style.right = '30px';
    validationUsernameRegister.style.opacity = '1';
  }
  nb_usernameRegister = nb_usernameRegister + 1;
  return console.log(nb_usernameRegister);
});

var nb_passwordRegister = 0;
enterPasswordRegister.addEventListener('input', function() {

  if (nb_passwordRegister >= 6) {
    validationPasswordRegister.style.right = '30px';
    validationPasswordRegister.style.opacity = '1';
  }
  nb_passwordRegister = nb_passwordRegister + 1;
  return console.log(nb_passwordRegister);
});
//Bouton d'inscription
inscription.addEventListener('click', function() {
  loginScreenContainer.style.display = 'none';
  registerScreenContainer.style.display = 'inherit';
  registerScreen.style.backgroundColor = '#35394a';
  loginScreen.style.backgroundColor = 'transparent';
});
//Bouton de connexion
connexion.addEventListener('click', function() {
  registerScreenContainer.style.display = 'none';
  loginScreenContainer.style.display = 'inherit';
  loginScreen.style.backgroundColor = '#35394a';
  registerScreen.style.backgroundColor = 'transparent';
});