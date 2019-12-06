<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\SkemFactory;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MembuatSkemBaruService
{
    private $skemRepository;

    public function __construct(SkemRepository $skemRepository)
    {
        $this->skemRepository = $skemRepository;
    }

    public function execute(MembuatSkemBaruRequest $request)
    {
        $skem = SkemFactory::create(
            null,
            $request->namaKegiatan,
            $request->jenisKegiatan,
            $request->lingkup,
            $request->poin
        );

        $this->skemRepository->save($skem);
    }
}