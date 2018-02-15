<?php require_once ('../src/init.php'); ?>
<!doctype html>
<html lang="en">
<?php require('../src/head.php'); ?>
<body>
<?php
$error = '';
if (isAuthenticated()) {
    redirectToBoard($db);
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['email']) && $_POST['email'] !== '') {
            $email = htmlentities($_POST['email']);
        } else {
            $error = '* Empty email';
            require_once('../src/registerPage.php');
            die();
        }

        if (isset($_POST['password']) && $_POST['password'] !== '') {
            $password = htmlentities($_POST['password']);
        } else {
            $error = '* Empty password';
            require_once('../src/registerPage.php');
            die();
        }

        if (isset($_POST['firstName']) && $_POST['firstName'] !== '') {
            $firstName = htmlentities($_POST['firstName']);
        } else {
            $error = '* Empty first name';
            require_once('../src/registerPage.php');
            die();
        }

        if (isset($_POST['lastName']) && $_POST['lastName'] !== '') {
            $lastName = htmlentities($_POST['lastName']);
        } else {
            $error = '* Empty last name';
            require_once('../src/registerPage.php');
            die();
        }

        if ($db->createUser($firstName, $lastName, $email, $password)) {
            $db->connectUser($email, $password);
            redirectToIndex();
        } else {
            $error = '* Unable to create user';
            require_once('../src/registerPage.php');
            die();
        }
    } else {
        require_once('../src/registerPage.php');
    }
}
?>
</body>
</html>