<?php

namespace SiaSkem\Skem\Domain\Model;

class RealisasiSkemFactory
{
    public static function create($id, $skemId, $deskripsi, $semester, $tanggal) : RealisasiSkem
    {
        $id = new RealisasiSkemId($id);
        $realisasiSkem = new RealisasiSkem($id, $skemId, $deskripsi, $semester, false, $tanggal);
        return $realisasiSkem;
    }
}