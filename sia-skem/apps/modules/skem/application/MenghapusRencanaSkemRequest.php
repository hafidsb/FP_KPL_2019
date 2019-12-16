<?php

namespace SiaSkem\Skem\Application;

class MenghapusRencanaSkemRequest
{
    public $rencanaSkemId;

    public function __construct($rencanaSkemId)
    {
        $this->rencanaSkemId = $rencanaSkemId;
    }

}