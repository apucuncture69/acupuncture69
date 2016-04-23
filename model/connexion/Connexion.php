<?php

class Connexion
{
  private static $_connexion;

  /* @throws PDOException */
  public static function getConnexion()
  {
    if (!isset(self::$_connexion))
    {
      self::$_connexion = self::getPDOObject();
    }
    return self::$_connexion;
  }

  private static function getPDOObject()
  {
    $host = 'localhost';
    $base = 'acu';
    $user = 'root';
    $pass = 'root';

    return new PDO("mysql:host=$host;dbname=$base", $user, $pass);
  }
}
?>
