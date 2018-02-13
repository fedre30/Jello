<?php
/**
 * Created by PhpStorm.
 * User: yash
 * Date: 12/02/2018
 * Time: 11:33
 */

//https://www.mediaforma.com/php-mysql-connexion-objet-avec-pdo// $base = new PDO(‘mysql:host=localhost; dbname=testconsole’, ‘root’, ”);

$conn = new PDO('mysql:host=nomserveur; dbname=nombase', 'nomutilisateur', 'motdepasse');
$errors = "";

include('Edition.php');

if (isset ($_POST['Submit']) or $_POST(['AddACard'])) {
    if(empty($_POST['TitleTask'])){
        $errors = "You need to write something !";
    }

}





