<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\FailedValidation;
use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;

class MemvalidasiRealisasiSkemService
{
    private $realisasiSkemRepository;

    public function __construct(RealisasiSkemRepository $realisasiSkemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
    }

    public function execute(MemvalidasiRealisasiSkemRequest $request)
    {
        $realisasiSkem = $this->realisasiSkemRepository->byId($request->realisasiSkemId);
        try {
            $realisasiSkem->validasiSkem();
            $this->realisasiSkemRepository->save($realisasiSkem);
        } catch (FailedValidation $e) {
            $errors = $e->getFailedRequierments();
            $errorMessage = "";
            foreach ($errors as $error){
                $errorMessage .= $error . ', ';
            }
            throw new FailedToValidateRealisasiSkem($errorMessage);
        }
    }
}