<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;

class MenghapusRencanaSkemService
{
    private $rencanaSkemRepository;

    public function __construct(RencanaSkemRepository $rencanaSkemRepository)
    {
        $this->rencanaSkemRepository = $rencanaSkemRepository;
    }

    public function execute(MenghapusRencanaSkemRequest $request)
    {
        $this->rencanaSkemRepository->deleteById($request->rencanaSkemId);
    }
}