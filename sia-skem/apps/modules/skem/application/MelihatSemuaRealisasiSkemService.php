<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MelihatSemuaRealisasiSkemService
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

    public function execute()
    {
        $realisasiSkems = $this->realisasiSkemRepository->all();
        $response = new MelihatSemuaRealisasiSkemResponse();
        foreach($realisasiSkems as $realisasi){
            $skem = $this->skemRepository->byId($realisasi->skemId()->id());
            $response->addRealisasiSkem(
                $realisasi->id()->id(),
                $skem->kegiatan()->nama(),
                $skem->kegiatan()->jenis(),
                $skem->lingkup(),
                $skem->poin(),
                $realisasi->deskripsi(),
                $realisasi->semester(),
                $realisasi->tervalidasi(),
                $realisasi->tanggal()
            );
        }

        return $response;
    }
}