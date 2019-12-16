<?php

namespace SiaSkem\Skem\Domain\Model;

interface UserRepository{
    public function login(string $username,string $password) : bool;
    public function getByName(string $username) : ?User;
}