<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\RealisasiSkemFactory;
use SiaSkem\Skem\Domain\Model\SkemId;

class MengubahRealisasiSkemService
{
    private $realisasiSkemRepository;

    public function __construct(RealisasiSkemRepository $realisasiSkemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
    }

    public function execute(MengubahRealisasiSkemRequest $request, string $id)
    {
        $_realisasi = $this->realisasiSkemRepository->byId($id);
        $skemId = new SkemId($request->skemId);
        $realisasiSkem = RealisasiSkemFactory::create(
            $id,
            $skemId,
            $request->deskripsi,
            $request->semester,
            $_realisasi->tervalidasi(),
            $request->tanggal
        );

        $this->realisasiSkemRepository->save($realisasiSkem);
    }
}