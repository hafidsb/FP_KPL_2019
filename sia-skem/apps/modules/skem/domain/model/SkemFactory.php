<?php

namespace SiaSkem\Skem\Domain\Model;

class SkemFactory
{
    public static function create($id, $namaKegiatan, $jenisKegiatan, $lingkup, $poin) : Skem
    {
        $id = new SkemId($id);
        $kegiatan = new Kegiatan($namaKegiatan, $jenisKegiatan);
        $skem = new Skem($id, $kegiatan, $lingkup, $poin);
        return $skem;
    }
}