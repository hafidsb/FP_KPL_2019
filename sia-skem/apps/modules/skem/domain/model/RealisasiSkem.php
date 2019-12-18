<?php

namespace SiaSkem\Skem\Domain\Model;

class RealisasiSkem
{
    private $id;
    private $skemId;
    private $deskripsi;
    private $semester;
    private $tervalidasi;
    private $tanggal;

    public function __construct($id, SkemId $skemId, $deskripsi, $semester, $tervalidasi, $tanggal)
    {
        $this->id = $id;
        $this->skemId = $skemId;
        $this->deskripsi = $deskripsi;
        $this->semester = $semester;
        $this->tervalidasi = $tervalidasi;
        $this->tanggal = $tanggal;
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

    public function tervalidasi()
    {
        return $this->tervalidasi;
    }

    public function tanggal()
    {
        return $this->tanggal;
    }

    public function validasiSkem()
    {
        $errors = array();
        
        if ($this->checkIfCurrentDateAlreadyPassed()){
            array_push($errors, "Tanggal sekarang lebih kecil dari pada tanggal realisasi");
        }

        if(empty($this->deskripsi)){
            array_push($errors, "Deskripsi tidak boleh kosong");
        }

        if(empty($this->semester)){
            array_push($errors, "Semester tidak boleh kosong");
        }

        if (!empty($errors)) {
            throw new FailedValidation("Validation Failed", $errors);
        }
        $this->tervalidasi = true;
    }

    public function checkIfCurrentDateAlreadyPassed()
    {
        $skemDate = date_create_from_format("Y-m-d", $this->tanggal)->format("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('Y-m-d', time());
        return $currentDate < $skemDate;
    }
}