<?php

class Connexion
{
    private static $_connexion;

    private function __construct(){
        $host = 'http://mysql-terminatwin.alwaysdata.net';
        $base = 'terminatwin_acupuncture';
        $user = '103394_tli';
        $pass = 'Admin2016$*';

        self::$_connexion = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
    }

    /* @throws Exception */
    public static function getConnexion()
    {
        if (!isset(self::$_connexion)) // Si on n'a pas encore instancié notre classe.
        {
            self::$_connexion = new self; // On s'instancie nous-mêmes. :)
        }

        return self::$_connexion;
    }

}
