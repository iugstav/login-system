<?php

namespace Models;

require_once "../auth/Uuid.php";
require_once "../database/Model.php";

use Auth\UUID;
use Database\Model;
use Exception;

class User extends Model
{
  private $db;

  private array $user;

  private function __construct(array $data = null)
  {
    $this->db = self::createInstance();

    if (isset($data))
      $this->user = $data;
  }

  public static function create(array $data = null)
  {
    return new User($data);
  }

  public function addToDatabase()
  {
    $statement = $this->db->insert(
      "INSERT INTO users(id, name, password, email) VALUES(?, ?, ?, ?)",
      [$this->user['id'], $this->user['name'], $this->user['password'], $this->user['email']]
    );

    if (!$statement) {
      return new Exception("Error while creating a account");
    }
  }

  public function findById()
  {
    $statement = $this->db->query("SELECT * FROM users WHERE id=?", [$this->user['id']]);

    return $statement;
  }

  public function findByEmail(string $email = null)
  {
    $emailToUse = isset($email) ? $email : $this->user['email'];

    $statement = $this->db->query("SELECT * FROM users WHERE email=?", [$emailToUse]);

    return $statement;
  }

  public function exists(): bool
  {
    $statement = $this->findByEmail();

    return count($statement) !== 0 ? true : false;
  }
}
