<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\RealisasiSkemFactory;
use SiaSkem\Skem\Domain\Model\SkemRepository;
use SiaSkem\Skem\Domain\Model\SkemFactory;

class MengubahRealisasiSkemService
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

    public function execute(MengubahRealisasiSkemRequest $request, string $id)
    {
        $_realisasi = $this->realisasiSkemRepository->byId($id);
        $_skem = $this->skemRepository->byId($_realisasi->skemId()->id());
       
        $skem = SkemFactory::create(
            $_skem->id()->id(),
            $request->namaKegiatan,
            $request->jenisKegiatan,
            $request->lingkup,
            $request->poin
        );

        $realisasiSkem = RealisasiSkemFactory::create(
            $id,
            $skem->id(),
            $request->deskripsi,
            $request->semester,
            $request->tanggal
        );

        $this->skemRepository->save($skem);
        $this->realisasiSkemRepository->save($realisasiSkem);
    }
}