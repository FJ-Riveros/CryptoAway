<?php

require_once "Usuario.php";
require_once "globalSettings/Variables.php";

class Session
{
    private static ?Session $instance = null;
    private function __construct()
    {
    }
    private function __clone()
    {
    }

    //Creation of the session instance
    public static function createSession(): Session
    {
        if (is_null(self::$instance)) self::$instance = new Session;
        return self::$instance;
    }

    public function tryToLogin(string $email, string $password): bool
    {
        //Try to authenticate a user with the credentials from the form
        $userId = Usuario::checkIfCorrectCredentials($email, $password);
        //If the user is in the DB create the session
        if (!is_null($userId)) {
            session_start();
            $_SESSION["userId"] = $userId;
            $_SESSION["timeOutMoment"] = TIMETILLTIMEOUT + time();
            header("Location: Modules/Timeline.php");
            die();
        }
        return false;
    }
}
