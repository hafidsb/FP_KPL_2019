<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\RealisasiSkemFactory;
use SiaSkem\Skem\Domain\Model\SkemRepository;
use SiaSkem\Skem\Domain\Model\SkemFactory;

class MembuatRealisasiSkemBaruService
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

    public function execute(MembuatRealisasiSkemBaruRequest $request)
    {
        $skem = SkemFactory::create(
            null,
            $request->namaKegiatan,
            $request->jenisKegiatan,
            $request->lingkup,
            $request->poin
        );

        $realisasiSkem = RealisasiSkemFactory::create(
            null,
            $skem->id(),
            $request->deskripsi,
            $request->semester,
            $request->tanggal
        );

        $this->skemRepository->save($skem);
        $this->realisasiSkemRepository->save($realisasiSkem);
    }

}