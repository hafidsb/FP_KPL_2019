<?php

namespace SiaSkem\Skem\Infrastructure;

use Phalcon\Db\Column;
use SiaSkem\Skem\Domain\Model\User;
use SiaSkem\Skem\Domain\Model\UserFactory;
use SiaSkem\Skem\Domain\Model\UserRepository;

class MySqlUserRepository implements UserRepository{
    
    private $db;

    public function __construct($di)
    {
        $this->db = $di->get('db');
    }
    public function login($username, $password) : bool
    {
        $placeholders = [
            "username" => $username,
            "password" => $password,
        ];
        $dataTypes = [
            "username" => Column::BIND_PARAM_STR,
            "password" => Column::BIND_PARAM_STR,
        ];
        $query = $this->db->prepare("SELECT 1 from users where username = :username and password = :password");
        $result = $this->db->executePrepared($query, $placeholders, $dataTypes);
        $row = $result->fetch();
        return !($row == false);
    }

    public function getByName(string $username): ?User
    {
        $placeholders = [
            "username" => $username,
        ];
        $dataTypes = [
            "username" => Column::BIND_PARAM_STR,
        ];
        $query = $this->db->prepare("SELECT id, username, role from users where username = :username limit 1");
        $result = $this->db->executePrepared($query, $placeholders, $dataTypes);
        $row = $result->fetch();
        if ($row == false) {
            return null;
        }
        $user = UserFactory::create(
            $row["id"],
            $row["username"], 
            $row["role"]
        );
        return $user;
    }
}