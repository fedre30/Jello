<?php
/**
 * Created by PhpStorm.
 * User: verfailliemehdi
 * Date: 12/02/2018
 * Time: 11:45
 */
include ('loginPage.php');
// LOGIN INTERFACE

/*echo "username : ";
echo $_POST["username"];
echo "<br>";
echo "password : ";
echo $_POST["password"];
echo "<br>";
// REGISTER INTERFACE
echo "name : ";
echo $_POST["name"];
echo "<br>";
echo "firstname : ";
echo $_POST["firstName"];
echo "<br>";
echo "email : ";
echo $_POST["email"];
echo "<br>";
echo "username : ";
echo $_POST["usernameRegistration"];
echo "<br>";
echo "password : ";
echo $_POST["passwordRegistration"];
echo "<br>";*/

/*if (empty ($_POST["username"] and !empty ($_POST["password"])))
{
    $msg_error = "NO_ID ";
    $messageID = $msg_error;
    echo $messageID;

}
elseif (!empty ($_POST["username"]) and empty ($_POST["password"]))
{
    $msg_error = " NO_PASSWORD";
    $messagePWD = $msg_error;
    echo $messagePWD;
}
elseif (!empty ($_POST["username"]) and !empty ($_POST["password"]))
{
    echo "ok";
}*/
//---------------------------
// define variable and set it to empty
$nameErr = $firstNameErr = $emailErr = $usernameRegistrationErr = $passwordRegistrationErr = "";
$name = $firstName = $email = $usernameRegistration = $passwordRegistration = "";

//---------------------------
//Test for input name


if (empty ($_POST["name"]))
{
 $nameErr = "Entrez votre nom";
 echo $nameErr;
} else {
    $name = input_test($_POST["name"]);
}


//---------------------------
//Test for input firstName


if (empty ($_POST["firstName"]))
{
    $firstNameErr = "Entrez votre prénom";
    echo $firstNameErr;
} else {
    $firstName = input_test($_POST["firstName"]);
}


//---------------------------
//Test for input email


if (empty ($_POST["email"]))
{
    $emailErr = "Entrez un email";
    echo $emailErr;
} else {
    $email = input_test($_POST["email"]);
}


//---------------------------
//Test for input usernameRegistration


if (empty ($_POST["usernameRegistration"]))
{
    $usernameRegistrationErr = "Entrez un nom de compte";
    echo $usernameRegistrationErr;
} else {
    $usernameRegistration = input_test($_POST["usernameRegistration"]);
}


//---------------------------
//Test for input passwordRegistration


if (empty ($_POST["passwordRegistration"]))
{
    $passwordRegistrationErr = "Entrez un mot de passe";
    echo $passwordRegistrationErr;
} else {
    $passwordRegistration = input_test($_POST["passwordRegistration"]);
}

// TO CREATE USER:
// new Database().createUser($firstName, $lastName, $email, $passwordRegistration);


//---------------------------
// input_test function

function input_test($data) {

    return $data;
}
