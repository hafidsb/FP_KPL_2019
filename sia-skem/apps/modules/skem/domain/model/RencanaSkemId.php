<?php

namespace SiaSkem\Skem\Domain\Model;

use Tuupola\KsuidFactory;

class RencanaSkemId
{
    private $id;

    public function __construct($id = null)
    {
        $ksuid = KsuidFactory::create();
        $this->id = $id?:$ksuid->string();
    }

    public function id()
    {
        return $this->id;
    }

    public function equals(RencanaSkemId $rencanaSkemId)
    {
        return $this->id === $rencanaSkemId->id;
    }
}