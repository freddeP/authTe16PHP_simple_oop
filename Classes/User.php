<?php

class User{

    public function __construct($email, $password){

        $this->email = $email;
        $this->password = password_hash($password,PASSWORD_DEFAULT);

    }



}