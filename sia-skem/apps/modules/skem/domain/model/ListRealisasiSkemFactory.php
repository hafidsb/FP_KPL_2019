<?php

namespace SiaSkem\Skem\Domain\Model;

class ListRealisasiSkemFactory
{
    public static function create($realisasiSkems, $inputSemester)
    {
        $listRealisasiSkem = new ListRealisasiSkem($realisasiSkems, $inputSemester);

        return $listRealisasiSkem;
    }
}