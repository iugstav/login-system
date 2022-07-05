<?php

namespace Database;

require "../config.php";

class Connection
{
  private static \PDO $connection;

  public static function getDB()
  {
    try {
      self::$connection = new \PDO("mysql:host=localhost;port=3306;dbname=teste", "iugstav", "chao100tapete");
      self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      return self::$connection;
    } catch (\PDOException $error) {
      die("Error while trying to connect to a database:" . $error->getMessage());
    }
  }
}
