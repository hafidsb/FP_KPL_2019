<?php

namespace SiaSkem\Skem\Domain\Model;

interface RealisasiSkemRepository
{
    public function all(): array;
    public function byId(string $id) : ?RealisasiSkem;
    public function bySemester(int $semester) : array;
    public function save(RealisasiSkem $realisasiSkem);
    public function deleteById(string $id);

}