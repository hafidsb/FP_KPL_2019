<?php

namespace SiaSkem\Skem\Domain\Model;

class RencanaSkem
{
    private $id;
    private $skemId;
    private $deskripsi;
    private $semester;
    private $totalSkem;

    public function __construct(RencanaSkemId $id, SkemId $skemId, $deskripsi, $semester, $count)
    {
        $this->id = $id;
        $this->skemId = $skemId;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
        $this->totalSkem = $count;
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

    public function totalSkem()
    {
        return $this->totalSkem;
    }

    public function tambahSkem()
    {
        if($this->totalSkem >= 5) {
            throw new RencanaSkemLimitException("Rencana Skem Melebihi Batas!!");
        }
        $this->totalSkem += 1;
    }

    public function kurangiSkem()
    {
        $this->totalSkem -= 1;
    }

    


}