<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RencanaSkemFactory;
use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\RencanaSkemLimitException;

class MembuatRencanaSkemService
{
    private $rencanaSkemRepository;

    public function __construct(RencanaSkemRepository $rencanaSkemRepository)
    {
        $this->rencanaSkemRepository = $rencanaSkemRepository;
    }

    public function execute(MembuatRencanaSkemRequest $request)
    {
        try 
        {
            $rencanaSkem = RencanaSkemFactory::create(
                null,
                new SkemId($request->skemId),
                $request->deskripsi,
                $request->semester,
                $this->rencanaSkemRepository->count()
            );
            $rencanaSkem->tambahSkem();
    
            $this->rencanaSkemRepository->save($rencanaSkem);

        }
        catch (RencanaSkemLimitException $e) 
        {
            throw new FailedToAddRencanaSkemException($e->getMessage());
        }

    }
}