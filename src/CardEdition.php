<?php
/**
 * Created by PhpStorm.
 * User: yash
 * Date: 12/02/2018
 * Time: 11:33
 */

//https://www.mediaforma.com/php-mysql-connexion-objet-avec-pdo// $base = new PDO(‘mysql:host=localhost; dbname=testconsole’, ‘root’, ”);


$errors = "";
include('addCard.php');


//-----------
// Empty errors and task
if (isset($_POST['Submit']) or isset($_POST(['AddACard']))) {
    if(empty($_POST['TitleTask']) or empty($_POST(['AddACard']))){
        $errors = "You need to write something !";
    }
}

//-----------
// Add a Task
function AddTask ()
{
    $task = $_POST['TitleTask'];
    $ = "INSERT INTO title (task) VALUES ('$task')";
}

//-----------
// Delete the Task
function DelTask ()
{
if (isset ($_POST['DeleteTask'])){
    $sql = "DELETE FROM cards WHERE  id=2";

}
}








