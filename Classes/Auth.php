<?php
class Auth {

    private static function get_all_users()
    {
        $fileContent = file_get_contents("users.json");
        return json_decode($fileContent);
    }

    private static function add_user_to_file($user)
    {
        $fileContent = self::get_all_users();
        // Lägg till user på sista plats i array
        $fileContent[] = $user;  
        file_put_contents("users.json",json_encode($fileContent, JSON_PRETTY_PRINT));
    }

    public static function sign_up($user)
    {
       self::add_user_to_file($user);
       return "User was added to DB";

    }

    public function sign_in($email, $password)
    {

    }

    public static function sign_out()
    {

    }




}