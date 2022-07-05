<?php

namespace Database;

require_once "Connection.php";

use Database\Connection;

class Model extends Connection
{
  private $conn;

  private function __construct()
  {
    $this->conn = self::getDB();
  }

  protected static function createInstance()
  {
    return new Model();
  }

  public function query($sql, array $params = [])
  {
    if (count($params) !== 0) {
      $statement = $this->conn->prepare($sql);
      $x = 1;

      foreach ($params as $param) {
        $statement->bindParam($x, $param);
        $x++;
      }

      $statement->execute();

      $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

      return $result;
    }

    $statement = $this->conn->query($sql, \PDO::FETCH_ASSOC);

    return $statement->fetchAll();
  }

  public function insert($sql, array $params = [])
  {
    if (count($params) !== 0) {
      $statement = $this->conn->prepare($sql);

      $statement->execute($params);

      return;
    } else {
      return false;
    }
  }
}
