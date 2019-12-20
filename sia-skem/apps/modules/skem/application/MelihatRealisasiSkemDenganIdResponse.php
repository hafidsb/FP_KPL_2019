<?php

namespace SiaSkem\Skem\Application;


class MelihatRealisasiSkemDenganIdResponse
{
    public function __construct()
    {
        $this->realisasi = null;
    }

    public function addRealisasiSkem( 
        $id,
        $deskripsi,
        $semester,
        $tanggal
        ) {
            $realisasiSkem = (object) array();
            $realisasiSkem->id = $id;
            $realisasiSkem->deskripsi = $deskripsi;
            $realisasiSkem->semester = $semester;
            $realisasiSkem->tanggal = $tanggal;
            $this->realisasi = $realisasiSkem;
    }
}