<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;

class MenghapusRealisasiSkemService
{
    private $realisasiSkemRepository;

    public function __construct(RealisasiSkemRepository $realisasiSkemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
    }

    public function execute(string $id)
    {
        $realisasi = $this->realisasiSkemRepository->byId($id);
        // var_dump(gettype($id));
        // exit();
        $this->realisasiSkemRepository->deleteById($id);
    }
}