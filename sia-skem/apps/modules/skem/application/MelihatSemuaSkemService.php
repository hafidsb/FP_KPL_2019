<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Application\MelihatSemuaSkemResponse;
use SiaSkem\Skem\Domain\Model\Skem;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MelihatSemuaSkemService{

    private $skemRepository;

    public function __construct(SkemRepository $skemRepository)
    {
        $this->skemRepository = $skemRepository;    
    }

    public function execute()
    {
        $skems = $this->skemRepository->all();

        $response = new MelihatSemuaSkemResponse();
        foreach($skems as $skem){
            $response->addSkem(
                $skem->id(),
                $skem->kegiatan()->nama(),
                $skem->kegiatan()->jenis(),
                $skem->lingkup(),
                $skem->poin()
            );
        }

        return $response;
    }
}