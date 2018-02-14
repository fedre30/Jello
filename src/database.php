<?php
try {$conn = new PDO('mysql:dbname=jello;host=localhost', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}