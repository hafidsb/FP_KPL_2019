<?php

namespace SiaSkem\Skem\Application;

class MembuatRencanaSkemRequest
{
    public $skemId;
    public $deskripsi;
    public $semester;

    public function __construct($skemId, $deskripsi, $semester)
    {
        $this->skemId = $skemId;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
    }

}