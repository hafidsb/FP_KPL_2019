<?php

namespace SiaSkem\Skem\Domain\Model;

use Tuupola\KsuidFactory;

class UserFactory
{
    public static function create($id, $name, $role)
    {
        $id = $id?:KsuidFactory::create()->string();
        $user = new User($id, $name, $role);
        return $user;
    }
}