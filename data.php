<?php
/**
 * Created by PhpStorm.
 * User: verfailliemehdi
 * Date: 12/02/2018
 * Time: 11:45
 */

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

//---------------------------
// define variable and set it to empty
$emptyField = "";
$name = $firstName = $email = /*$usernameRegistration =*/ $passwordRegistration = "";


//---------------------------
//Test for input account name - Login


if (empty ($_POST["username"]))
{
    $emptyField = "*Empty Field";
} else {
    $name = input_test($_POST["username"]);
}


//---------------------------
//Test for input password - login


if (empty ($_POST["password"]))
{
    $emptyField = "*Empty Field";
} else {
    $name = input_test($_POST["password"]);
}


//---------------------------
//Test for input name

if (empty ($_POST["name"]))
{
    $emptyField = "*Empty Field";
    //echo $nameErr;
} else {
    $name = input_test($_POST["name"]);
}


//---------------------------
//Test for input firstName


if (empty ($_POST["firstName"]))
{
    $emptyField = "*Empty Field";
    //echo $firstNameErr;
} else {
    $firstName = input_test($_POST["firstName"]);
}


//---------------------------
//Test for input email


if (empty ($_POST["email"]))
{
    $emptyField = "*Empty Field";
    //echo $emailErr;
} else {
    $email = input_test($_POST["email"]);
}


//---------------------------
//Test for input usernameRegistration


/*if (empty ($_POST["usernameRegistration"]))
{
    $emptyField = "*Empty Field";
    //echo $usernameRegistrationErr;
} else {
    $usernameRegistration = input_test($_POST["usernameRegistration"]);
}*/


//---------------------------
//Test for input passwordRegistration


if (empty ($_POST["passwordRegistration"]))
{
    $emptyField = "*Empty Field";
    //echo $passwordRegistrationErr;
} else {
    $passwordRegistration = input_test($_POST["passwordRegistration"]);
}

// TO CREATE USER:
// new Database().createUser($firstName, $lastName, $email, $passwordRegistration);


//---------------------------
// input_test function

function input_test($data)
{

    return $data;
}

//---------------------------/////////////////////////////////////////////////
// checkPassword function



//---------------------------
// communication between 'loginPage.php' & 'data.php'
include ('loginPage.php');