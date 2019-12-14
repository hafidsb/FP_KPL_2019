<?php

namespace SiaSkem\Skem\Domain\Model;

class RencanaSkem
{
    private $id;
    private $kegiatan;
    private $lingkup;
    private $deskripsi;
    private $poin;
    private $semester;

    public function __construct($id, Kegiatan $kegiatan, $lingkup, $deskripsi, $poin, $semester)
    {
        $this->id = $id;
        $this->kegiatan = $kegiatan;
        $this->lingkup = $lingkup;
        $this->deskripsi = $deskripsi;
        $this->poin = $poin;
        $this->semester = $semester;
    }

    public function id()
    {
        return $this->id;
    }

    public function kegiatan()
    {
        return $this->kegiatan;
    }

    public function lingkup()
    {
        return $this->lingkup;
    }

    public function deskripsi()
    {
        return $this->deskripsi;
    }

    public function poin()
    {
        return $this->poin;
    }

    public function semester()
    {
        return $this->semester;
    }

    


}