<?php

namespace SiaSkem\Skem\Controllers\Web;

use Phalcon\Mvc\Controller;
use SiaSkem\Skem\Application\MembuatRealisasiSkemBaruRequest;
use SiaSkem\Skem\Application\MembuatRealisasiSkemBaruService;
use SiaSkem\Skem\Application\MelihatSemuaRealisasiSkemService;
use SiaSkem\Skem\Application\MenghapusRealisasiSkemService;
use SiaSkem\Skem\Application\MelihatRealisasiSkemDenganIdService;
use SiaSkem\Skem\Application\MengubahRealisasiSkemRequest;
use SiaSkem\Skem\Application\MengubahRealisasiSkemService;

class RealisasiSkemController extends Controller
{
    /**
     * @var MembuatRealisasiSkemBaruService $membuatRealisasiSkemBaruService
     */
     private $membuatRealisasiSkemBaruService;

     /**
     * @var MelihatSemuaRealisasiSkemService $melihatSemuaRealisasiSkemService
     */
    private $melihatSemuaRealisasiSkemService;

    /**
     * @var MenghapusRealisasiSkemService $menghapusRealisasiSkemService
     */
    private $menghapusRealisasiSkemService;

    /**
     * @var MelihatRealisasiSkemDenganIdService $melihatRealisasiSkemDenganIdService
     */
    private $melihatRealisasiSkemDenganIdService;

    /**
     * @var MengubahRealisasiSkemService $mengubahRealisasiSkemService
     */
    private $mengubahRealisasiSkemService;

    public function onConstruct()
    {
        $skemRepository = $this->di->getShared('mysql_skem_repository');
        $realisasiSkemRepository = $this->di->getShared('mysql_realisasi_skem_repository');
         
        $this->membuatRealisasiSkemBaruService = 
            new MembuatRealisasiSkemBaruService(
                $realisasiSkemRepository, $skemRepository
            );
        $this->melihatSemuaRealisasiSkemService = 
            new MelihatSemuaRealisasiSkemService(
                $realisasiSkemRepository, $skemRepository
            );
        $this->menghapusRealisasiSkemService = 
            new MenghapusRealisasiSkemService(
                $realisasiSkemRepository, $skemRepository
            );
        $this->melihatRealisasiSkemDenganIdService = 
            new MelihatRealisasiSkemDenganIdService(
                $realisasiSkemRepository, $skemRepository
            );
        $this->mengubahRealisasiSkemService = 
            new MengubahRealisasiSkemService(
                $realisasiSkemRepository, $skemRepository
            );
    }

    public function indexAction()
    {
        $realisasiResponse = $this->melihatSemuaRealisasiSkemService->execute();
        $realisasi = $realisasiResponse->realisasiSkems;
        $this->view->setVars([
            'realisasi' => $realisasi
        ]);
        $this->view->pick('realisasi_skem/skem');
    }

     public function createAction()
     {
         if ($this->request->isPost()){
            $namaKegiatan = $this->request->getPost('nama_kegiatan');
            $jenisKegiatan = $this->request->getPost('jenis_kegiatan');
            $lingkup = $this->request->getPost('lingkup');
            $poin = $this->request->getPost('poin');
            $deskripsi = $this->request->getPost('deskripsi');
            $semester = $this->request->getPost('semester');
            $tanggal = $this->request->getPost('tanggal');

            $request = new MembuatRealisasiSkemBaruRequest(
                $namaKegiatan,
                $jenisKegiatan,
                $lingkup,
                $poin,
                $deskripsi,
                $semester,
                $tanggal
            );

            $this->membuatRealisasiSkemBaruService->execute($request);
            $this->flashSession->success("Realisasi Skem Berhasil Ditambahkan");
            $this->response->redirect('realisasi_skem');
         }
         $this->view->pick('realisasi_skem/create');
     }

     public function deleteAction()
     {
        $id = $this->dispatcher->getParam("id");
        $this->menghapusRealisasiSkemService->execute($id);
        $this->flashSession->success("Realisasi Skem Berhasil Dihapus");
        $this->response->redirect('realisasi_skem');
     }

     public function editAction()
     {     
        $id = $this->dispatcher->getParam("id");

        if ($this->request->isPost()){
            $namaKegiatan = $this->request->getPost('nama_kegiatan');
            $jenisKegiatan = $this->request->getPost('jenis_kegiatan');
            $lingkup = $this->request->getPost('lingkup');
            $poin = $this->request->getPost('poin');
            $deskripsi = $this->request->getPost('deskripsi');
            $semester = $this->request->getPost('semester');
            $tanggal = $this->request->getPost('tanggal');

            $request = new MengubahRealisasiSkemRequest(
                $namaKegiatan,
                $jenisKegiatan,
                $lingkup,
                $poin,
                $deskripsi,
                $semester,
                $tanggal
            );

            $this->mengubahRealisasiSkemService->execute($request, $id);
            $this->flashSession->success("Realisasi Skem Berhasil Diubah");
            $this->response->redirect('realisasi_skem');
        }
        
        $realisasiResponse = $this->melihatRealisasiSkemDenganIdService->execute($id);
        $this->view->setVars([
            'realisasi' => $realisasiResponse->realisasi
        ]);

        $this->view->pick('realisasi_skem/edit');
     }

}