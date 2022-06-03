<?php
class User
{
    function __construct($userID, $login ,$password,$role)
    {
        $this->userID = $userID;
        $this->login = $login;    ;
        $this->password = $password;
        $this->role = $role;
    }
}