<?php

namespace SiaSkem\Skem\Application;

class MengubahRealisasiSkemRequest
{
    public $namaKegiatan;
    public $jenisKegiatan;
    public $lingkup;
    public $poin;
    public $deskripsi;
    public $semester;
    public $tanggal;

    public function __construct($namaKegiatan, $jenisKegiatan, $lingkup, $poin, $deskripsi, $semester, $tanggal)
    {
        $this->namaKegiatan = $namaKegiatan;
        $this->jenisKegiatan = $jenisKegiatan;
        $this->lingkup = $lingkup;
        $this->poin = $poin;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
        $this->tanggal = $tanggal;
    }
}