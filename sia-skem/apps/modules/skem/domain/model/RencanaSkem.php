<?php

namespace SiaSkem\Skem\Domain\Model;

class RencanaSkem
{
    private $id;
    private $skemId;
    private $deskripsi;
    private $semester;

    public function __construct($id, SkemId $skemId, $deskripsi, $semester)
    {
        $this->id = $id;
        $this->skemId = $skemId;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
    }

    public function id()
    {
        return $this->id;
    }

    public function skemId()
    {
        return $this->skemId;
    }

    public function deskripsi()
    {
        return $this->deskripsi;
    }

    public function semester()
    {
        return $this->semester;
    }

    


}