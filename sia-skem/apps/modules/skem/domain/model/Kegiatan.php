<?php

namespace Idy\Skem\Domain\Model;

class Kegiatan
{
    private $nama;
    private $jenis;

    public function __construct($nama, $jenis)
    {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }

    public function nama()
    {
        return $this->nama;
    }

    public function jenis()
    {
        return $this->jenis;
    }
}