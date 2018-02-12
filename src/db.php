<?php

class Database {
    const NAME = "jello";
    const HOST = "localhost";
    const PORT = 8889;
    const USERNAME = "root";
    const PASSWORD = "root";

    function __construct()
    {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

        $this->db = new PDO('mysql:host='.HOST.':'.PORT.';dbname='.NAME, USERNAME, PASSWORD, $options);
    }

    function createUser($firstName, $lastName, $email, $password) {
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
        if($passwordHashed === false){
            return false;
        }

        $result = $this->db->exec("INSERT INTO users (lastName, firstName, email, password) VALUES ($0, $1, $2, $3)",
            [$lastName, $firstName, $email, $passwordHashed]);
        return $result === 1;
    }

    function connectUser($email, $password){
        $result = $this->db->query("SELECT * FROM users WHERE email = $0", [$email]);
        if(count($result) === 0){
            return false;
        }

        $passwordHashed = $result[0]['password'];
        $passwordVerified = password_verify($password, $passwordHashed);

        if($passwordVerified === false){
            return false;
        }
        else{
            return true;
        }
    }
}
