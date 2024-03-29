<?php

namespace SiaSkem\Skem\Application;

class MelihatSemuaRealisasiSkemResponse
{
    public $realisasiSkems;

    public function __construct()
    {
        $this->realisasiSkems = array();
    }

    public function addRealisasiSkem(
        $id, 
        $namaKegiatan, 
        $jenisKegiatan, 
        $lingkup, 
        $poin, 
        $deskripsi,
        $semester,
        $tervalidasi,
        $tanggal
        ) {
            $realisasiSkem = (object) array();
            $realisasiSkem->id = $id;
            $realisasiSkem->namaKegiatan = $namaKegiatan;
            $realisasiSkem->jenisKegiatan = $jenisKegiatan;
            $realisasiSkem->lingkup = $lingkup;
            $realisasiSkem->poin = $poin;
            $realisasiSkem->deskripsi = $deskripsi;
            $realisasiSkem->semester = $semester;
            $realisasiSkem->tervalidasi = $tervalidasi;
            $realisasiSkem->tanggal = $tanggal;
            array_push($this->realisasiSkems, $realisasiSkem);
    }
}