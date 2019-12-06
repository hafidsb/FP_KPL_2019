<?php

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

    }
}