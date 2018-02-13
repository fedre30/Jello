<?php
/**
 * Created by PhpStorm.
 * User: verfailliemehdi
 * Date: 12/02/2018
 * Time: 11:45
 */

/*session_start();*/
include ('src/init.php');
// LOGIN INTERFACE

/*echo "email : ";
echo $_POST["email"];
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
$lastName = $firstName = $email =  $passwordHashed = "";


//---------------------------
//Test for input account email - Login


if (empty ($_POST["email"]))
{
    $emptyField = "*Empty Field";
} else {
    $email = input_test($_POST["email"]);
}


//---------------------------
//Test for input password - login


if (empty ($_POST["password"]))
{
    $emptyField = "*Empty Field";
} else {
    $passwordHashed = input_test($_POST["password"]);
}


//---------------------------
//Test for input name

if (empty ($_POST["lastName"]))
{
    $emptyField = "*Empty Field";
    //echo $nameErr;
} else {
    $lastName = input_test($_POST["lastName"]);
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
//Test for input passwordRegistration


if (empty ($_POST["passwordRegistration"]))
{
    $emptyField = "*Empty Field";
    //echo $passwordRegistrationErr;
} else {
    $passwordHashed = input_test($_POST["passwordRegistration"]);
}


//---------------------------
// input_test function

function input_test($data)
{

    return $data;
}

//---------------------------/////////////////////////////////////////////////
// ?????????????

/*if (isset($name,))*/

//---------------------------
// communication between 'loginPage.php' & 'data.php'
