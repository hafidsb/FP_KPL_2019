<?php

namespace Idy\Skem\Domain\Model;

use Tuupola\KsuidFactory;

class SkemFactory
{
    public static function create($id = null, $namaKegiatan, $jenisKegiatan, $lingkup, $poin) : Skem
    {
        $ksuid = KsuidFactory::create();
        $newId = $id?:$ksuid->string();
        $kegiatan = new Kegiatan($namaKegiatan, $jenisKegiatan);
        $skem = new Skem($newId, $kegiatan, $lingkup, $poin);
        return $skem;
    }
}