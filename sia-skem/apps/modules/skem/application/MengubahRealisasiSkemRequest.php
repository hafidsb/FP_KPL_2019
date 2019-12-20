<?php

namespace SiaSkem\Skem\Application;

class MengubahRealisasiSkemRequest
{
    public $skemId;
    public $deskripsi;
    public $semester;
    public $tanggal;

    public function __construct($skemId, $deskripsi, $semester, $tanggal)
    {
        $this->skemId = $skemId;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
        $this->tanggal = $tanggal;
    }
}