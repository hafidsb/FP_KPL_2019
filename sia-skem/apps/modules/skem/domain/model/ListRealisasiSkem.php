<?php

namespace SiaSkem\Skem\Domain\Model;

class ListRealisasiSkem
{
    private $realisasiSkems = array();
    private $inputSemester;
    private $MAX_SKEM;    

    public function __construct($realisasiSkems, $inputSemester)
    {
        $this->realisasiSkems = $realisasiSkems;
        $this->inputSemester = (int) $inputSemester;
        $this->MAX_SKEM = 5;
    }

    public function listRealisasiSkem()
    {
        return $this->realisasiSkems;
    }

    public function cekJumlahSkemMelebihiBatas()
    {
        $errors = array();
        $_arr = array();
        $_semesters = array();
        $_jumlahPerSemester = array();
        $max = $this->MAX_SKEM;
        $semesterOver = "";
        
        foreach ($this->listRealisasiSkem()->realisasiSkems as $x) {         
            array_push($_semesters, $x->semester);
        }
        $_jumlahPerSemester = array_count_values($_semesters);
        $_semesterTerbanyak = array_filter($_jumlahPerSemester, function ($value) use($max) {
            return ($value >= $max);
        });
        
        if($_semesterTerbanyak && array_key_exists($this->inputSemester, $_semesterTerbanyak)){
            foreach ($_semesterTerbanyak as $key => $item) {
                $semesterOver .= $key.", ";
            }
            $semesterOver = substr($semesterOver, 0, -2);
            array_push($errors, "Realisasi SKEM pada semester ".$semesterOver." melebihi batas(5 per semester). Ubah semester pada realisasi atau hapus realisasi pada semester yang bersangkutan.");
        }

        if (!empty($errors)) {
            throw new FailedValidation("Validation Failed", $errors);
        }
    }
}