<?php

namespace SiaSkem\Skem\Application;

class MemvalidasiRealisasiSkemRequest
{
    public $realisasiSkemId;

    public function __construct($realisasiSkemId)
    {
        $this->realisasiSkemId = $realisasiSkemId;
    }
}