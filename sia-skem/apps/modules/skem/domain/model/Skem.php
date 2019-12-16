<?php

namespace SiaSkem\Skem\Domain\Model;

class Skem
{

    private $id;
    private $kegiatan;
    private $lingkup;
    private $poin;

    public function __construct($id,Kegiatan $kegiatan, $lingkup, $poin)
    {
        $this->id = $id;
        $this->kegiatan = $kegiatan;
        $this->lingkup = $lingkup;
        $this->poin = $poin;
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

    public function poin()
    {
        return $this->poin;
    }

    public function ubahPoin($poinBaru)
    {
        $this->poin = $poinBaru;
    }
}