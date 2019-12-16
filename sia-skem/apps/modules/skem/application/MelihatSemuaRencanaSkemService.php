<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Application\MelihatSemuaRencanaSkemResponse;
use SiaSkem\Skem\Domain\Model\SkemRepository;
use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;

class MelihatSemuaRencanaSkemService
{
    private $rencanaSkemRepository;
    private $skemRepository;

    public function __construct(RencanaSkemRepository $rencanaSkemRepository, SkemRepository $skemRepository)
    {
        $this->rencanaSkemRepository = $rencanaSkemRepository;
        $this->skemRepository = $skemRepository;    
    }

    public function execute()
    {
        $rencanaSkems = $this->rencanaSkemRepository->all();

        $response = new MelihatSemuaRencanaSkemResponse();
        foreach($rencanaSkems as $rencanaSkem)
        {
            $skem = $this->skemRepository->byId($rencanaSkem->skemId()->id());
            $response->addRencanaSkem(
                $rencanaSkem->id()->id(),
                $skem->kegiatan()->nama(),
                $skem->kegiatan()->jenis(),
                $skem->lingkup(),
                $rencanaSkem->deskripsi(),
                $skem->poin(),
                $rencanaSkem->semester()
            );
        }

        return $response;
    }


}