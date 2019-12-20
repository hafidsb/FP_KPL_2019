<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\RealisasiSkemFactory;
use SiaSkem\Skem\Domain\Model\SkemId;

class MembuatRealisasiSkemBaruService
{
    private $realisasiSkemRepository;

    public function __construct(RealisasiSkemRepository $realisasiSkemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
    }

    public function execute(MembuatRealisasiSkemBaruRequest $request)
    {
        $skemId = new SkemId($request->skemId);
        $realisasiSkem = RealisasiSkemFactory::create(
            null,
            $skemId,
            $request->deskripsi,
            $request->semester,
            false,
            $request->tanggal
        );
        $this->realisasiSkemRepository->save($realisasiSkem);
    }

}