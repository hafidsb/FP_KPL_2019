<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;
use SiaSkem\Skem\Domain\Model\RencanaSkem;

class MenghapusRencanaSkemService
{
    private $rencanaSkemRepository;

    public function __construct(RencanaSkemRepository $rencanaSkemRepository)
    {
        $this->rencanaSkemRepository = $rencanaSkemRepository;
    }

    public function execute(MenghapusRencanaSkemRequest $request)
    {
        $rencanaSkem = $this->rencanaSkemRepository->byId($request->rencanaSkemId);
        $rencanaSkem->kurangiSkem();
        $this->rencanaSkemRepository->deleteById($request->rencanaSkemId);
    }
}