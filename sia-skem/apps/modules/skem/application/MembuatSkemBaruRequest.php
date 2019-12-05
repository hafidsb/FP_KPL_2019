<?php

namespace Idy\Skem\Application;

class MembuatSkemBaruRequest
{
    
    public $namaKegiatan;
    public $jenisKegiatan;
    public $lingkup;
    public $poin;

    public function __construct($namaKegiatan, $jenisKegiatan, $lingkup, $poin)
    {
        $this->namaKegiatan = $namaKegiatan;
        $this->jenisKegiatan = $jenisKegiatan;
        $this->lingkup = $lingkup;
        $this->poin = $poin;
    }
}