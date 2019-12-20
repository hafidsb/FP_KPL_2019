<?php

namespace SiaSkem\Skem\Domain\Model;

class RencanaSkemFactory
{
    public static function create($id, SkemId $skemId, $deskripsi, $semester, $count=0): RencanaSkem
    {
        $id = new RencanaSkemId($id);
        $rencanaSkem = new RencanaSkem($id, $skemId, $deskripsi, $semester, $count);
        return $rencanaSkem;
    }
}