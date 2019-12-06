<?php

namespace SiaSkem\Skem\Application;

class MelihatSemuaSkemResponse{
    public $skems;

    public function __construct()
    {
        $this->skems = array();
    }

    public function addSkem($id, $namaKegiatan, $jenisKegiatan, $lingkup, $poin)
    {
        $skem = array();
        $skem->id = $id;
        $skem->namaKegiatan = $namaKegiatan;
        $skem->jenisKegiatan = $jenisKegiatan;
        $skem->lingkup = $lingkup;
        $skem->poin = $poin;
        array_push($this->skems, $skem);
    }
}