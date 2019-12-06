<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\SkemRepository;

class MengubahPoinSkemService{
    private $skemRepository;

    public function __construct(SkemRepository $skemRepository)
    {
        $this->skemRepository = $skemRepository;   
    }

    public function execute(MengubahPoinSkemRequest $request)
    {
        $skem = $this->skemRepository->byId($request->skemId);
        if (empty($skem)){
            throw new SkemNotFoundException("Skem dengan {$request->skemId} tidak ditemukan");
        }
        $skem->ubahPoin($request->poinBaru);
        $this->skemRepository->save($skem);
    }
}