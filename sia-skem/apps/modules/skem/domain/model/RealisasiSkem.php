<?php

namespace SiaSkem\Skem\Domain\Model;

class RealisasiSkem
{
    private $id;
    private $skemId;
    private $deskripsi;
    private $semester;
    private $tervalidasi;
    private $tanggal;

    public function __construct($id, SkemId $skemId, $deskripsi, $semester, $tervalidasi, $tanggal)
    {
        $this->id = $id;
        $this->skemId = $skemId;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
        $this->tervalidasi = $tervalidasi;
        $this->tanggal = $tanggal;
    }

    public function id()
    {
        return $this->id;
    }

    public function skemId()
    {
        return $this->skemId;
    }

    public function deskripsi()
    {
        return $this->deskripsi;
    }

    public function semester()
    {
        return $this->semester;
    }

    public function tervalidasi()
    {
        return $this->tervalidasi;
    }

    public function tanggal()
    {
        return $this->tanggal;
    }

    public function validasiSkem()
    {
        $this->tervalidasi = true;
    }


}