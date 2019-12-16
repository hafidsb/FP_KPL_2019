<?php

use PHPUnit\Framework\TestCase;
use SiaSkem\Skem\Domain\Model\Kegiatan;
use SiaSkem\Skem\Domain\Model\Skem;
use SiaSkem\Skem\Domain\Model\SkemFactory;
use SiaSkem\Skem\Domain\Model\SkemId;

class SkemFactoryTest extends TestCase
{
    public function getDummySkem($namaKegiatan, $jenisKegiatan , $id, $lingkup, $poin)
    {
        $kegiatan = new Kegiatan($namaKegiatan, $jenisKegiatan);
        $id = new SkemId($id);
        $skem = new Skem(
            $id,
            $kegiatan,
            $lingkup,
            $poin
        );
        return $skem;
    }

    public function testFactory()
    {
        $namaKegiatan = "Sepak Bola";
        $jenisKegiatan = "Olahraga";
        $id = "p6UEyCc8D8ecLijAI5zVwOTP3D0";
        $lingkup = "finalis";
        $poin = 500;
        $skem = $this->getDummySkem($namaKegiatan, $jenisKegiatan , $id, $lingkup, $poin);
        $factorySkem = SkemFactory::create($id, $namaKegiatan, $jenisKegiatan, $lingkup, $poin);
        $this->assertEquals($skem, $factorySkem);
    }
}