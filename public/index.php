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
                $email = $_POST['email'];
            } else {
                $error = '* Empty email';
                require_once('../src/loginPage.php');
                die();
            }

            if (isset($_POST['password']) && $_POST['password'] !== '') {
                $password = $_POST['password'];
            } else {
                $error = '* Empty password';
                require_once('../src/loginPage.php');
                die();
            }

            if ($db->connectUser($email, $password)) {
                redirectToIndex();
            } else {
                $error = '* Invalid credentials';
                require_once('../src/loginPage.php');
                die();
            }
        } else {
            require_once('../src/loginPage.php');
        }
    }
?>
</body>
</html>