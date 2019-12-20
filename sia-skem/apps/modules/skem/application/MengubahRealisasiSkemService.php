<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\RealisasiSkemFactory;
use SiaSkem\Skem\Domain\Model\SkemRepository;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\FailedValidation;
use SiaSkem\Skem\Domain\Model\ListRealisasiSkemFactory;

class MengubahRealisasiSkemService
{
    private $realisasiSkemRepository;
    private $skemRepository;

    public function __construct(
        RealisasiSkemRepository $realisasiSkemRepository,
        SkemRepository $skemRepository)
    {
        $this->realisasiSkemRepository = $realisasiSkemRepository;
        $this->skemRepository = $skemRepository;
    }

    public function execute(MengubahRealisasiSkemRequest $request, string $id)
    {
        $_realisasi = $this->realisasiSkemRepository->byId($id);
        $skemId = new SkemId($request->skemId);
        $realisasiSkem = RealisasiSkemFactory::create(
            $id,
            $skemId,
            $request->deskripsi,
            $request->semester,
            $_realisasi->tervalidasi(),
            $request->tanggal
        );

        $realisasiSkems = $this->realisasiSkemRepository->all();
        $response = new MelihatSemuaRealisasiSkemResponse();
        
        foreach($realisasiSkems as $realisasi){
            $skem = $this->skemRepository->byId($realisasi->skemId()->id());
            $response->addRealisasiSkem(
                $realisasi->id()->id(),
                $skem->kegiatan()->nama(),
                $skem->kegiatan()->jenis(),
                $skem->lingkup(),
                $skem->poin(),
                $realisasi->deskripsi(),
                $realisasi->semester(),
                $realisasi->tervalidasi(),
                $realisasi->tanggal()
            );
        }

        $listSkems = ListRealisasiSkemFactory::create($response, $request->semester);
        try{
            $listSkems->cekJumlahSkemMelebihiBatas();
            $this->realisasiSkemRepository->save($realisasiSkem);
        } catch (FailedValidation $e){
            $errors = $e->getFailedRequierments();
            $errorMessage = "";
            foreach ($errors as $error){
                $errorMessage .= $error . ', ';
            }
            throw new FailedToValidateRealisasiSkem($errorMessage);
        }
        
    }
}