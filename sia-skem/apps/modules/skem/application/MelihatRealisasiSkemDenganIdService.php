<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;

class MelihatRealisasiSkemDenganIdService
{
    private $realisasiSkemRepository;

    public function __construct(RealisasiSkemRepository $realisasiSkemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
    }

    public function execute($id)
    {
        $realisasi = $this->realisasiSkemRepository->byId($id);        
        $response = new MelihatRealisasiSkemDenganIdResponse();
        
        $response->addRealisasiSkem(
            $realisasi->id()->id(),
            $realisasi->deskripsi(),
            $realisasi->semester(),
            $realisasi->tanggal()
        );
        
        return $response;
    }
}