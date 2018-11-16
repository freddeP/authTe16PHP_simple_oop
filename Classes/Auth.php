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
        // Har skall $user först valideras osv

       self::add_user_to_file($user);
       return "User was added to DB";

    }
    public static function sign_in($email_input, $password)
    {
        // hämta alla användare
        $users = self::get_all_users(); 
        $emailExists = false;
        $index = "";
        foreach($users as $key => $user)
        {
            if($user->email == $email_input)
            {
                $emailExists = true;
                $index = $key;
                break;
            }
        }
        
        
        echo $emailExists. "<hr>";
       // Om email existerar 
       if($emailExists)
       {
            $hash = $users[$index]->password;
            $pwCheck = password_verify($password,$hash);
            if($pwCheck)
            {
                return true;
            }
            else{
                return "wrong password";
            }

       } 
       else
       {
           return "no such user";
       }
        

    }

    public static function sign_out()
    {

    }




}