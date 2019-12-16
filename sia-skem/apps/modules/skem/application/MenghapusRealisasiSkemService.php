<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MenghapusRealisasiSkemService
{
    private $realisasiSkemRepository;
    private $skemRepository;

    public function __construct(
        RealisasiSkemRepository $realisasiSkemRepository,
        SkemRepository $skemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
        $this->skemRepository = $skemRepository;
    }

    public function execute(string $id)
    {
        $realisasi = $this->realisasiSkemRepository->byId($id);
        $skem = $this->skemRepository->byId($realisasi->skemId()->id());
        // var_dump(gettype($id));
        // exit();
        $this->realisasiSkemRepository->deleteById($id);
        $this->skemRepository->deleteById($skem->id()->id());
    }
}