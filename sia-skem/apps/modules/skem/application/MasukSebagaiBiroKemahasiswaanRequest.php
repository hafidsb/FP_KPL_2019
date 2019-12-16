<?php

namespace SiaSkem\Skem\Application;

class MasukSebagaiBiroKemahasiswaanRequest {
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}