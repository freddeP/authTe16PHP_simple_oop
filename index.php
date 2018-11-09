<?php

require("./Classes/Auth.php");
require("./Classes/User.php");

// Skapa ny user
$user = new User("test@home.se", "Hej");
// Skicka nu denna user till sign_up
Auth::sign_up($user);
