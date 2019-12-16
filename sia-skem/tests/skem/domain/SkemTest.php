<?php

use PHPUnit\Framework\TestCase;
use SiaSkem\Skem\Domain\Model\Kegiatan;
use SiaSkem\Skem\Domain\Model\Skem;

class SkemTest extends TestCase
{
    public function getDummySkem()
    {
        $kegiatan = new Kegiatan("Sepak Bola", "Olaraga");
        $id = "p6UEyCc8D8ecLijAI5zVwOTP3D0";
        $skem = new Skem(
            $id,
            $kegiatan,
            "Finalis",
            500
        );
        return $skem;
    }

    public function testUbahPoinSkem()
    {
        $poin = 100;
        $skem = $this->getDummySkem();
        $skem->ubahPoin($poin);
        $this->assertEquals($poin, $skem->poin());
    }
}