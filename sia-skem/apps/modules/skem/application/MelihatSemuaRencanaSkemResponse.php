<?php

namespace SiaSkem\Skem\Application;

class MelihatSemuaRencanaSkemResponse
{
    public $rencanaSkems;

    public function __construct()
    {
        $this->rencanaSkems = array();
    }

    public function addRencanaSkem($id, $namaKegiatan, $jenisKegiatan, $lingkup, $deskripsi, $poin, $semester)
    {
        $rencanaSkem = (object) array();
        $rencanaSkem->id = $id;
        $rencanaSkem->namaKegiatan = $namaKegiatan;
        $rencanaSkem->jenisKegiatan = $jenisKegiatan;
        $rencanaSkem->lingkup = $lingkup;
        $rencanaSkem->deskripsi = $deskripsi;
        $rencanaSkem->semester = $semester;
        $rencanaSkem->poin = $poin;
        array_push($this->rencanaSkems, $rencanaSkem);
    }
}