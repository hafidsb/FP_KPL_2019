<?php

namespace Idy\Skem\Application;

class MengubahPoinSkemRequest{
    public $poinBaru;
    public $skemId;

    public function __construct($skemId, $poinBaru)
    {
        $this->skemId = $skemId;
        $this->poinBaru = $poinBaru;
    }
}