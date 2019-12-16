<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RencanaSkem;
use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MembuatRencanaSkemService
{
    private $rencanaSkemRepository;
    private $skemRepository;

    public function __construct(RencanaSkemRepository $rencanaSkemRepository)
    {
        $this->rencanaSkemRepository = $rencanaSkemRepository;
    }

    public function execute(MembuatRencanaSkemRequest $request)
    {
        $rencanaSkem = RencanaSkem::addRencanaSkem(
            $request->skemId,
            $request->deskripsi,
            $request->semester
        );
        $this->rencanaSkemRepository->save($rencanaSkem);

    }
}