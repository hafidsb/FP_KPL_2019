<?php

namespace SiaSkem\Skem\Application;

class MasukSebagaiBiroKemahasiswaanResponse {
    public $username;
    public $role;

    public function __construct($username, $role)
    {
        $this->username = $username;
        $this->role = $role;
    }
}